<?php namespace DiabloDB\Commands;

use DiabloDB\Commands\Command;
use DiabloDB\Battlenet\Api;
use DiabloDB\Member;
use DiabloDB\Character;
use DiabloDB\Diablo\CharacterClass;
use Illuminate\Contracts\Bus\SelfHandling;

class MemberUpdate extends Command implements SelfHandling
{
    private $member;

    /**
     * Create a new command instance.
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $api = new Api();
        $member = $this->member;
        $data = $api->getProfileInfo($member->battletag);

        /* Update member paragon levels */
        $member->paragon = $data['paragonLevel'];
        $member->paragon_hc = $data['paragonLevelHardcore'];
        $member->paragon_curr_season = $data['paragonLevelSeason'];
        $member->paragon_curr_season_hc = $data['paragonLevelSeasonHardcore'];
        $member->save();

        /* Update members characters */
        $characters = $data['heroes'];
        $charClass = new CharacterClass();
        foreach($characters as $char) {
            $char['class'] = $charClass->getClassId($char['class']);
            $char['owner_id'] = $member->id;
            Character::CreateOrUpdate($char);
        }
    }
}

<?php namespace DiabloDB\Commands;

use DiabloDB\Character;
use DiabloDB\Battlenet\Api;
use DiabloDB\CharacterStats;
use DiabloDB\Commands\Command;

use DiabloDB\Member;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CharacterUpdate
 * @package DiabloDB\Commands
 */
class CharacterUpdate extends Command implements SelfHandling
{
    public $character;
    public $member;

    /**
     * Create a new command instance.
     * @param Character $character Character to update.
     * @param Member    $member    Member to which the character belongs.
     */
    public function __construct(Character $character, Member $member)
    {
        $this->character = $character;
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
        $char = $this->character;
        $member = $this->member;
        $data = $api->getCharacterInfo($member->battletag, $char->diablo_id);
        /* Unset keys that aren't required for easier debugging */
        unset($data['skills']);
        unset($data['items']);
        unset($data['followers']);
        unset($data['progression']);
        $this->updateStats($data);
    }

    /**
     * Update Stats.
     * @param array $data Array returned by diablo api.
     */
    public function updateStats($data)
    {
        $stats = [];
        $stats['character_id'] = $this->character->id;
        $stats['elite_kills'] = $data['kills']['elites'];
        $stats['life'] = $data['stats']['life'];
        $stats['damage'] = $data['stats']['damage'];
        $stats['toughness'] = $data['stats']['toughness'];
        $stats['healing'] = $data['stats']['healing'];
        $stats['attack_speed'] = $data['stats']['attackSpeed'];
        $stats['armor'] = $data['stats']['armor'];
        $stats['strength'] = $data['stats']['strength'];
        $stats['dexterity'] = $data['stats']['dexterity'];
        $stats['vitality'] = $data['stats']['vitality'];
        $stats['intelligence'] = $data['stats']['intelligence'];
        $stats['resist_physical'] = $data['stats']['physicalResist'];
        $stats['resist_fire'] = $data['stats']['fireResist'];
        $stats['resist_cold'] = $data['stats']['coldResist'];
        $stats['resist_lightning'] = $data['stats']['lightningResist'];
        $stats['resist_poison'] = $data['stats']['poisonResist'];
        $stats['resist_arcane'] = $data['stats']['arcaneResist'];
        $stats['crit_damage'] = $data['stats']['critDamage'];
        $stats['block_chance'] = $data['stats']['blockChance'];
        $stats['block_min'] = $data['stats']['blockAmountMin'];
        $stats['block_max'] = $data['stats']['blockAmountMax'];
        $stats['damage_increase'] = $data['stats']['damageIncrease'];
        $stats['crit_chance'] = $data['stats']['critChance'];
        $stats['damage_reduction'] = $data['stats']['damageReduction'];
        $stats['thorns'] = $data['stats']['thorns'];
        $stats['life_steal'] = $data['stats']['lifeSteal'];
        $stats['life_per_kill'] = $data['stats']['lifePerKill'];
        $stats['gold_find'] = $data['stats']['goldFind'];
        $stats['magic_find'] = $data['stats']['magicFind'];
        $stats['life_on_hit'] = $data['stats']['lifeOnHit'];
        $stats['primary_resource'] = $data['stats']['primaryResource'];
        $stats['secondary_resource'] = $data['stats']['secondaryResource'];
        CharacterStats::CreateOrUpdate($stats);
    }
}

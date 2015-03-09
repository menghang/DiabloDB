<?php

namespace DiabloDB;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CharacterStats extends Model
{
    protected $table = 'character_stats';

    protected $fillable = ['character_id', 'elite_kills', 'life', 'damage', 'toughness', 'healing', 'attack_speed', 'armor', 'strength', 'dexterity', 'vitality', 'intelligence', 'resist_physical', 'resist_fire', 'resist_cold', 'resist_lightning', 'resist_poison', 'resist_arcane', 'crit_damage', 'block_chance', 'block_min', 'block_max', 'damage_increase', 'crit_chance', 'damage_reduction', 'thorns', 'life_steal', 'life_per_kill', 'gold_find', 'magic_find', 'life_on_hit', 'primary_resource', 'secondary_resource'];

    public function character()
    {
        return $this->belongsTo('DiabloDB\Character');
    }

    public static function CreateOrUpdate($data)
    {
        /* Check if characters stats already exist */
        try {
            $key = 'character_id';
            $stats = CharacterStats::where($key, $data[$key])->firstOrFail();
            /* Character Exists - Update */
            foreach ($data as $key => $val) {
                $stats->$key = $val;
            }
            $stats->save();
        } catch (ModelNotFoundException $e) {
            /* Does not exist - Add */
            CharacterStats::create($data);
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}

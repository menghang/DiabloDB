<?php

namespace DiabloDB;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class Character
 * @package DiabloDB
 */
class Character extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'characters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'level', 'class', 'owner_id', 'diablo_id', 'hardcore', 'season'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function member()
    {
        return $this->belongsTo('DiabloDB\Member', 'owner_id');
    }

    public function stats()
    {
        return $this->hasOne('DiabloDB\CharacterStats', 'character_id');
    }

    /**
     * Creates or updates a character
     * @param array $data Array of fields.
     * @return null|integer Returns the character id on success or null.
     */
    public static function CreateOrUpdate($data)
    {
        $char = [
            'name' => $data['name'],
            'class' => $data['class'],
            'diablo_id' => $data['id'],
            'level' => $data['level'],
            'hardcore' => ($data['hardcore'] == "true"),
            'season' => ($data['seasonal'] == "true"),
            'owner_id' => $data['owner_id']
        ];

        /* Check if character already exists */
        try {
            $character = Character::where('diablo_id', $char['diablo_id'])->firstOrFail();
            /* Character Exists - Update */
            foreach ($char as $key => $val) {
                $character->$key = $val;
            }
            $character->save();
            return $character->id;
        } catch (ModelNotFoundException $e) {
            /* Does not exist - Add */
            Character::create($char);

            /* Return the created characters id */
            try {
                $character = Character::where('diablo_id', $char['diablo_id'])->firstOrFail();
                return $character->id;
            } catch (Exception $e) {
                return null;
            }
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}

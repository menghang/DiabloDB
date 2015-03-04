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

    public static function CreateOrUpdate($data)
    {
        $char = [
            'name' => $data['name'],
            'diablo_id' => $data['id'],
            'level' => $data['level'],
            'hardcore' => ($data['hardcore'] == "true"),
        ];

        /* Check if character already exists */
        try {
            $character = Character::where('name', $data['name'])->firstOrFail();
            /* Character Exists - Update */
            foreach($char as $key => $val) {
                $character->$key = $val;
            }
            $character->save();
        } catch (ModelNotFoundException $e) {
            /* Does not exist - Add */
            Character::create($char);
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}

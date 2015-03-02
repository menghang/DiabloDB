<?php

namespace DiabloDB\Diablo;

class CharacterClass
{
    public $classes = [
        1 => ['api_name' => 'barbarian', 'display' => 'Barbarian'],
        2 => ['api_name' => 'demon-hunter', 'display' => 'Demon Hunter'],
        3 => ['api_name' => 'wizard', 'display' => 'Wizard'],
        4 => ['api_name' => 'monk', 'display' => 'Monk'],
        5 => ['api_name' => 'crusader', 'display' => 'Crusader'],
    ];

    public function getClassId($class)
    {
        foreach ($this->classes as $id => $data) {
            $api = $data['api_name'];
            $display = $data['display'];

            if ($api == $class || $api == $display) {
                return $id;
            }
        }
    }

    public function getClassName($class_id, $display = true)
    {
        $class = $this->classes[$class_id];
        if ($display) {
            return $class['display'];
        }

        return $class['api_name'];
    }
}
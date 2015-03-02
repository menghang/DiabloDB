<?php

use DiabloDB\Diablo\CharacterClass;

class CharacterClassTest extends TestCase
{
    public $ids;
    public $class;

    public function setUp()
    {
        parent::setUp();
        $this->ids = [
            1 => 'barbarian',
            2 => 'demon-hunter',
            3 => 'wizard',
            4 => 'monk',
            5 => 'crusader'
        ];
        $this->class = new CharacterClass();
    }

    public function test_character_class_returns_correct_ids()
    {
        foreach ($this->ids as $id => $name) {
            $class = $this->class->getClassName($id, false);
            $this->assertEquals($name, $class);
        }
    }

    public function testGetCharacterClassId()
    {
        foreach ($this->ids as $id => $name) {
            $class_id = $this->class->getClassId($name);
            $this->assertEquals($id, $class_id);
        }
    }
}
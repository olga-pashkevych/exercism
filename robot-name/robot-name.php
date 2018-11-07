<?php

class Robot
{
    private static $names = [];

    private $name;

    public function __construct()
    {
        $this->name = $this->createName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function reset()
    {
        $this->name = $this->createName();
    }

    private function generateName()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $string = '';

        // 2 chars
        for ($i = 0; $i < 2; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        // 3 numbers
        for ($i = 0; $i < 3; $i++) {
            $string .= $numbers[mt_rand(0, strlen($numbers) - 1)];
        }

        return $string;
    }

    private function createName(): string
    {
        while (true) {
            $newName = $this->generateName();
            if (!in_array($newName, self::$names)) {
                self::$names[] = $newName;

                return $newName;
            }
        }
    }

}

//$robot = new Robot;
//echo $robot->getName();

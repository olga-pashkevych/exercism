<?php
/**
 * Write a robot simulator.
 */

class Robot
{
    const DIRECTION_NORTH = 0;
    const DIRECTION_EAST = 90;
    const DIRECTION_SOUTH = 180;
    const DIRECTION_WEST = 270;

    /**
     * @var string
     */
    public $direction = '';

    /**
     * @var array
     */
    public $position = [];

    public function __construct(array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function turnRight(): self
    {
        $this->direction = ($this->direction + 90) % 360;

        return $this;
    }

    public function turnLeft(): self
    {
        $this->direction = ($this->direction + 270) % 360;

        return $this;
    }

    public function advance(): self
    {
        switch ($this->direction) {
            case self::DIRECTION_NORTH:
                $this->position[1]++;
                break;
            case self::DIRECTION_EAST:
                $this->position[0]++;
                break;
            case self::DIRECTION_SOUTH:
                $this->position[1]--;
                break;
            case self::DIRECTION_WEST:
                $this->position[0]--;
                break;
        }

        return $this;
    }

    public function instructions(string $instructions)
    {
        if (preg_match('/[^RLA]/', $instructions)) {
            throw new InvalidArgumentException('Invalid argument');
        }

        foreach (str_split($instructions) as $act) {
            switch ($act) {
                case 'R':
                    $this->turnRight();
                    break;
                case 'L':
                    $this->turnLeft();
                    break;
                case 'A':
                    $this->advance();
                    break;
            }
        }
    }
}

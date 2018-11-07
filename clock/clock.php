<?php
/** Implement a clock that handles times without dates.
* You should be able to add and subtract minutes to it.
* Two clocks that represent the same time should be equal to each other.
*/

class Clock
{
    public $hours;
    public $minutes;

    public function __construct(int $hours, int $minutes = 0)
    {
        $seconds = ($hours * 60 + $minutes) * 60;
        $this->hours = date('H', $seconds);
        $this->minutes = date('i', $seconds);
    }

    private function formatTime(int $hours, int $minutes = 0):string
    {
        $seconds = ($hours * 60 + $minutes) * 60;
        $formatTime = date('H:i', $seconds);

        return $formatTime;
    }

    public function __toString():string
    {
        return $this->formatTime($this->hours, $this->minutes);
    }

    public function add(int $minutes): self
    {
        $this->minutes = $this->minutes + $minutes;

        return $this;
    }

    public function sub(int $minutes): self
    {
        $this->minutes = $this->minutes - $minutes;

        return $this;
    }
}

//$clock = new Clock(3, -20);
//$clock = $clock->add(3);
//echo $clock;
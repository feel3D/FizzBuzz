<?php

namespace App;
use InvalidArgumentException;
use RangeException;


class FizzBuzz
{
    const MAX = 1000;

    private $start;
    private $finish;
    private $content;


    public function getStart()
    {
        return $this->start;
    }


    public function getFinish()
    {
        return $this->finish;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function setStart($integer)
    {
        if (empty($integer) || $integer < 0) {
            throw new InvalidArgumentException('Начальное значение не может быть пустым или отрицательным');
        }

        if (!is_int($integer)) {
            throw new InvalidArgumentException('Начальное значение должно быть положительным и целочисленным');
        }

        if ($integer > self::MAX) {
            throw new InvalidArgumentException('Начальное значение не может быть больше максимального');
        }

        $this->start = $integer;
    }


    public function setFinish($integer)
    {
        if (empty($integer) || $integer < 0) {
            throw new InvalidArgumentException('Конечное значение не может быть пустым или отрицательным');
        }

        if (!is_int($integer)) {
            throw new InvalidArgumentException('Конечное значение должно быть положительным и целочисленным');
        }

        if ($integer > self::MAX) {
            throw new InvalidArgumentException('Конечное значение не может быть больше максимального');
        }

        $this->finish = $integer;
    }


    public function populateContent()
    {
        if ($this->finish < $this->start) {
            throw new RangeException('Конечное значение не может быть меньше начального');
        }

        $string = "";

        for ($i = $this->start; $i <= $this->finish; $i++) {
            if($i % 15 === 0) {
                $string .= " FizzBuzz";
            }
            elseif($i % 3 === 0) {
                $string .= " Fizz";
            }
            elseif($i % 5 === 0) {
                $string .= " Buzz";
            }
            else {
                $string .= " ".$i;
            }
        }
        $this->content = trim($string);
    }
}

<?php


namespace App;


class SomeClass
{

    private $producer;

    function __construct(ProducerInterface $producer)
    {
        $this->producer = $producer;
    }

    public function processSomething(int $something): void 
    {
        if ($something > 30) {
            throw new \InvalidArgumentException('Invalid argument');
        }
         $this->producer->produce("Something: " . $something);
    }
}

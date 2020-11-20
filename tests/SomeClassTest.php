<?php

namespace Tests;

use App\ProducerInterface;
use App\SomeClass;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;


class SomeClassTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testSomeClass($value, $exception)
    {
        if ($exception) {
            $this->expectException($exception);
        }

        $mock = $this->createMock(ProducerInterface::class);
        $mock->method('produce');
        
        $obj = new SomeClass($mock);
        
        $this->assertNull($obj->processSomething($value));
    }
    

    public function provider()
    {
        return [
            'exception' => [50, InvalidArgumentException::class],
            'correct' => [25, null],
        ];
    }
}
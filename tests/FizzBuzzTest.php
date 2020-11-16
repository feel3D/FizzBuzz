<?php

namespace App;


use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use RangeException;


class FizzBuzzTest extends TestCase
{

    protected $fixture;


    protected function setUp(): void
    {
        $this->fixture = new FizzBuzz;
    }


    public function testObjectNotNull()
    {
        $this->assertNotNull($this->fixture);
    }


    /**
     * @depends testObjectNotNull
     */
    public function testObjectAttributes()
    {
        $this->assertObjectHasAttribute('start', $this->fixture);
        $this->assertObjectHasAttribute('finish', $this->fixture);
        $this->assertObjectHasAttribute('content', $this->fixture);

    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetStartNull()
    {
        $this->fixture->setStart(null);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetStartZero()
    {
        $this->fixture->setStart(0);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetStartString()
    {
        $this->fixture->setStart('START');
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetStartIntegerString()
    {
        $this->fixture->setStart('1');
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetStartNegativeInteger()
    {
        $this->fixture->setStart(-3);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetStartMoreThanMax()
    {
        $this->fixture->setStart(1500);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetFinishNull()
    {
        $this->fixture->setFinish(null);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetFinishZero()
    {
        $this->fixture->setFinish(0);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetFinishString()
    {
        $this->fixture->setFinish('FINISH');
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetFinishIntegerString()
    {
        $this->fixture->setFinish('100');
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetFinishNegativeInteger()
    {
        $this->fixture->setFinish(-1);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       InvalidArgumentException
     *
     */
    public function testExceptionSetFinishMoreThanMax()
    {
        $this->fixture->setFinish(2000);
    }


    /**
     * @depends                 testObjectAttributes
     * @expectedException       RangeException
     *
     */
    public function testExceptionPopulateContentWithFinishLessThanStart()
    {
        $this->fixture->setStart(50);
        $this->fixture->setFinish(25);
        $this->fixture->populateContent();
    }


    /**
     * @depends testObjectAttributes
     */
    public function testGetStart()
    {
        $this->fixture->setStart(5);
        $this->assertEquals(5, $this->fixture->getStart());
    }

    /**
     * @depends testObjectAttributes
     */
    public function testGetFinish()
    {
        $this->fixture->setFinish(15);
        $this->assertEquals(15, $this->fixture->getFinish());
    }

    /**
     * @depends      testObjectAttributes
     * @dataProvider provider
     *
     */
    public function testFizzBuzz($start, $finish, $expected)
    {
        $this->fixture->setStart($start);
        $this->fixture->setFinish($finish);
        $this->fixture->populateContent();
        $this->assertEquals($expected, $this->fixture->getContent());
    }

    /**
     * Data provider for testFizzBuzz
     */
    public function provider()
    {
        return [
            [1, 10, '1 2 Fizz 4 Buzz Fizz 7 8 Fizz Buzz'],
            [5, 25, 'Buzz Fizz 7 8 Fizz Buzz 11 Fizz 13 14 Fizz 16 17 Fizz 19 Buzz Fizz 22 23 Fizz Buzz'],
            [10, 40, 'Buzz 11 Fizz 13 14 FizzBuzz 16 17 Fizz 19 Buzz Fizz 22 23 Fizz Buzz 26 Fizz 28 29 FizzBuzz 31 32 Fizz 34 Buzz Fizz 37 38 Fizz Buzz'],
            [150, 150, 'Buzz'],
            [250, 300, 'Buzz 251 Fizz 253 254 FizzBuzz 256 257 Fizz 259 Buzz Fizz 262 263 Fizz Buzz 266 Fizz 268 269 FizzBuzz 271 272 Fizz 274 Buzz Fizz 277 278 Fizz Buzz 281 Fizz 283 284 FizzBuzz 286 287 Fizz 289 Buzz Fizz 292 293 Fizz Buzz 296 Fizz 298 299 FizzBuzz']
        ];

    }
}
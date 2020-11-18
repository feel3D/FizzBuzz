<?php

namespace Tests;

use App\BookRepository;
use App\BookService;
use PHPUnit\Framework\TestCase;


class BookServiceTest extends TestCase
{
    public function testIsAuthorGood()
    {
        $mock = $this->createMock(BookRepository::class);
        $mock->method('getCount')
             ->willReturnOnConsecutiveCalls(3,5,1,2);

        $obj = new BookService($mock);

        $this->assertTrue($obj->isAuthorGood(5));
        $this->assertTrue($obj->isAuthorGood(5));
        $this->assertFalse($obj->isAuthorGood(5));
        $this->assertFalse($obj->isAuthorGood(5));
    }
}

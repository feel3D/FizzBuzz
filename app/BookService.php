<?php

namespace App;



class BookService
{
    
    public $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isAuthorGood(int $authorId): bool
    {
        if ($this->repository->getCount($authorId) > 2) {
            return true;
        } else {
            return false;
        }
    }
}

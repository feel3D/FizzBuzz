<?php

namespace App;



class BookRepository
{
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getCount(int $authorId): int
    {
        $req = $this->db->connect()->prepare("SELECT COUNT(*) as CNT FROM test_db.book where author_id = ?");
        $req->execute([$authorId]);
        
        return $req->fetchColumn();
    }
}


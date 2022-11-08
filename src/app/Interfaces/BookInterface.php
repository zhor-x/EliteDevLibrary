<?php

namespace App\Interfaces;

interface BookInterface
{
    public function index();

    public function search(string $query);

    public function find(int $bookID);
}

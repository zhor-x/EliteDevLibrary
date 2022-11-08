<?php

namespace App\Interfaces;

interface OrderInterface
{
    public function find(int $userID, int $bookID);

    public function get(int $userID);

}

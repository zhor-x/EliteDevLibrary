<?php

namespace App\Repositories\Api;

use App\Interfaces\OrderInterface;
use App\Models\Order;

class OrderRepository implements OrderInterface
{

    /**
     * @param  \App\Models\Order  $order
     */
    public function __construct(private Order $order)
    {
    }


    /**
     * @param  int  $userID
     * @param  int  $bookID
     *
     * @return object|null
     */
    public function find(int $userID, int $bookID): object|null
    {
        return $this->order->where(['user_id' => $userID, 'book_id' => $bookID])->first();
    }

    /**
     * @param  int  $userID
     *
     * @return mixed
     */
    public function get(int $userID): mixed
    {
        return $this->order->where(['user_id' => $userID])->withTrashed()->get();
    }
}

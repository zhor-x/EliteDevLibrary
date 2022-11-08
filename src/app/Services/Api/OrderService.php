<?php

namespace App\Services\Api;

use App\Enums\GlobalEnum;
use App\Enums\OrderEnum;
use App\Interfaces\OrderInterface;
use App\Models\Order;
use JetBrains\PhpStorm\ArrayShape;


class OrderService
{

    /**
     * @param  \App\Interfaces\OrderInterface  $order
     * @param  \App\Services\Api\BookService  $bookService
     * @param  \App\Services\Api\UserService  $userService
     */
    public function __construct(
        private OrderInterface $order,
        private BookService $bookService,
        private UserService $userService
    ) {
    }


    /**
     * @return mixed
     */
    public function myOrders(): mixed
    {
        $userID = auth()->user()->id;
        return $this->order->get($userID);
    }

    /**
     * @param  int  $bookID
     *
     * @return array
     */
    public function rentBook(int $bookID): array
    {
        $order = $this->order->find(userID: auth()->user()->id, bookID: $bookID);

        if ($order) {
            $message = $order->rent == 1 ? OrderEnum::RentAlready : ($order->buy == 1 ? OrderEnum::BuyAlready : GlobalEnum::SomethingWrong);
            return [
                GlobalEnum::ErrorMessage => $message
            ];
        }
        return $this->checkAndBuy(
            bookID: $bookID,
            priceStatus: OrderEnum::PriceRent,
            status: OrderEnum::Rent
        );
    }

    /**
     * @param  int  $bookID
     *
     * @return array
     */
    public function buyBook(int $bookID): array
    {
        $order = $this->order->find(userID: auth()->user()->id, bookID: $bookID);
        if ($order && $order->buy == true) {
            return [
                GlobalEnum::ErrorMessage => OrderEnum::BuyAlready
            ];
        } elseif ($order && $order->buy == false) {
            $order->delete();
        }
        return $this->checkAndBuy(
            bookID: $bookID,
            priceStatus: OrderEnum::Price,
            status: OrderEnum::Buy,
        );
    }

    /**
     * @param  int  $bookID
     * @param  string  $priceStatus
     * @param  string  $status
     *
     * @return array
     */
    private function checkAndBuy(int $bookID, string $priceStatus, string $status): array
    {
        $amount = $this->bookService->getBookPrice(bookID: $bookID, priceStatus: $priceStatus);
        if ($amount >= auth()->user()->amount) {
            return [
                GlobalEnum::ErrorMessage => OrderEnum::NoEnoughMoney
            ];
        }
        return $this->createOrder(status: $status, bookID: $bookID, amount: $amount);
    }

    /**
     * @param  string  $status
     * @param  int  $bookID
     * @param  float  $amount
     *
     * @return array
     */
    #[ArrayShape([GlobalEnum::Success => "string"])]
    private function createOrder(string $status, int $bookID, float $amount): array
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->book_id = $bookID;
        if ($status === OrderEnum::Buy) {
            $logData = OrderEnum::Buy;
            $order->rent = false;
            $order->buy = true;
        } elseif ($status == OrderEnum::Rent) {
            $order->rent = true;
            $order->buy = false;
            $logData = OrderEnum::Rent;
        }
        $order->save();
        $this->userService->updateAmount(amount: $amount);
        \Log::info('order', ['status' => $status, 'userID' => auth()->user()->id, 'bookID' => $bookID]);
        return [GlobalEnum::Success => OrderEnum::SuccessPurchased];
    }
}

<?php

namespace App\Enums;

class OrderEnum
{
    public const RentAlready = 'You have already rented a book';
    public const BuyAlready = 'You have already bought a book';
    public const Rent = 'rent';
    public const Buy = 'buy';
    public const Price = 'price';
    public const PriceRent = 'price_rent';
    public const NoEnoughMoney = 'Not enough money to buy a book ';
    public const SuccessPurchased = 'you have successfully purchased the book';

}

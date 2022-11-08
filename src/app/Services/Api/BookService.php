<?php

namespace App\Services\Api;

use App\Interfaces\BookInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 */
class BookService
{

    /**
     * @param  \App\Interfaces\BookInterface  $book
     */
    public function __construct(private BookInterface $book)
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return $this->book->index();
    }

    /**
     * @param  string  $query
     *
     * @return LengthAwarePaginator
     */
    public function search(string $query): LengthAwarePaginator
    {
        return $this->book->search(query: $query);
    }

    /**
     * @param  int  $bookID
     * @param  string  $priceStatus
     *
     * @return float
     */
    public function getBookPrice(int $bookID, string $priceStatus): float
    {
        $book = $this->book->find(bookID: $bookID);
        return $book->{$priceStatus};
    }


}

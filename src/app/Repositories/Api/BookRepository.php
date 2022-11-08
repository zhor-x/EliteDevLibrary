<?php

namespace App\Repositories\Api;

use App\Enums\GlobalEnum;
use App\Interfaces\BookInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 */
class BookRepository implements BookInterface
{

    /**
     * @param  \App\Models\Book  $book
     */
    public function __construct(private Book $book)
    {
    }

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return $this->book->paginate(GlobalEnum::PaginationCount);
    }

    /**
     * @param  string  $query
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function search(string $query): LengthAwarePaginator
    {
        return $this->book->orWhereHas('authors', function (Builder $builder) use ($query) {
            $builder->where('firstname', 'like', "%$query%");
        })->orWhere('title', 'like', "%$query%")->paginate(GlobalEnum::PaginationCount);
    }

    /**
     * @param  int  $bookID
     *
     * @return object
     */
    public function find(int $bookID): object
    {
        return $this->book->find($bookID)->first();
    }


}

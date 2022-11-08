<?php

namespace App\Http\Controllers\Api;

use App\Enums\GlobalEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SearchBookRequest;
use App\Http\Resources\Api\BookCollection;
use App\Services\Api\BookService;
use Exception;
use Log;

class BookController extends Controller
{

    /**
     * @param  \App\Services\Api\BookService  $bookService
     */
    public function __construct(private BookService $bookService)
    {
    }


    /**
     * @return \App\Http\Resources\Api\BookCollection
     * @throws \Exception
     */
    public function index(): BookCollection
    {
        try {
            $books = $this->bookService->index();
            return new BookCollection($books);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CustomException(GlobalEnum::SomethingWrong);
        }
    }

    /**
     * @param  \App\Http\Requests\Api\SearchBookRequest  $request
     *
     * @return \App\Http\Resources\Api\BookCollection
     * @throws \Exception
     */
    public function search(SearchBookRequest $request): BookCollection
    {
        try {
            $books = $this->bookService->search(query: $request->input('query'));
            return new BookCollection($books);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CustomException(GlobalEnum::SomethingWrong);
        }
    }
}

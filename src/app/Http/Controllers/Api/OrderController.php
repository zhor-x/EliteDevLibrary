<?php

namespace App\Http\Controllers\Api;

use App\Enums\GlobalEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\OrderCollection;
use App\Services\Api\OrderService;
use Exception;
use Illuminate\Http\JsonResponse;
use Log;


class OrderController extends Controller
{
    /**
     * @param  \App\Services\Api\OrderService  $orderService
     */
    public function __construct(private OrderService $orderService)
    {
    }

    /**
     * @param  \App\Http\Requests\Api\OrderRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function buy(OrderRequest $request): JsonResponse
    {
        try {
            $order = $this->orderService->buyBook($request->book_id);
            return response()->json($order);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            throw new CustomException($e->getMessage());
        }
    }

    /**
     * @param  \App\Http\Requests\Api\OrderRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function rent(OrderRequest $request): JsonResponse
    {
        try {
            $order = $this->orderService->rentBook($request->book_id);
            return response()->json($order);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CustomException(GlobalEnum::SomethingWrong);
        }
    }

    public function orders(): OrderCollection
    {
        try {
            $order = $this->orderService->myOrders();
            return new OrderCollection($order);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CustomException(GlobalEnum::SomethingWrong);
        }
    }
}

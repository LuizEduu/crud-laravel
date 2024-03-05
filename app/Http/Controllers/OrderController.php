<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\OrdersRepositoryInterface;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    private $ordersRepository;

    public function __construct(OrdersRepositoryInterface $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    public function save(Request $request)
    {
        $productId = $request->route('product_id');
        $userId = $request->route('user_id');

        $order = $this->ordersRepository->create([
            'product_id' => $productId,
            'user_id' => $userId,
        ]);

        return response()->json([
            'id' => $order->id
        ])->setStatusCode(201);
    }


    public function findByUserId(string $id)
    {
        $orders = $this->ordersRepository->findByUserId($id);

        return response()->json($orders);
    }
}

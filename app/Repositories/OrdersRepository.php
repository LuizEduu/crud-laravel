<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use App\Repositories\Interfaces\OrdersRepositoryInterface;

class OrdersRepository implements OrdersRepositoryInterface
{
    public function create(array $order): Order
    {
        return Order::create($order);
    }

    public function findById(string $id): Order
    {
        return Order::findOrFail($id);
    }

    public function findByUserId(string $id): array
    {
        return Order::where('user_id', $id)
            ->with('user')
            ->get()->toArray();
    }
}

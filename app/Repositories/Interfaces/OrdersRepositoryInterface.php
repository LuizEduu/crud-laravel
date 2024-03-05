<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;

interface OrdersRepositoryInterface
{
    public function create(array $order): Order;
    public function findById(string $id): Order;

    /**
     * @param string $id
     * @return Order[]
     */
    public function findByUserId(string $id): array;
}

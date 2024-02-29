<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\Interfaces\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function create(array $product): Products
    {
        return Products::create($product);
    }

    public function findById(string $id): Products
    {
        return Products::findOrFail($id);
    }
}

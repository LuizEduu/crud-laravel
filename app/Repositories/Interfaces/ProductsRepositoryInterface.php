<?php

namespace App\Repositories\Interfaces;

use App\Models\Products;

interface ProductsRepositoryInterface
{
    public function create(array $product): Products;
    public function findById(string $id): Products;
}

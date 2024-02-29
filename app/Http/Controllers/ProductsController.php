<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $productsRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required'
        ]);

        $createdProduct = $this->productsRepository->create($validatedData);

        return response()->json([
            'id' => $createdProduct->id,
            'name' => $createdProduct->name,
            'category' => $createdProduct->category,
            'quantity' => $createdProduct->quantity,
            'created_at' => $createdProduct->created_at,
        ])->setStatusCode(201);
    }

    public function findById(string $id)
    {
        $product = $this->productsRepository->findById($id);

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->category,
            'quantity' => $product->quantity,
            'created_at' => $product->created_at,
        ]);
    }
}

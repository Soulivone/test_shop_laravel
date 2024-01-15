<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getList()
    {
        return $this->productModel->get();
    }

    public function add(array $data)
    {
        return $this->productModel->fill($data)->save();
    }

    public function edit(int $id)
    {
        return $this->productModel->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $product = $this->productModel->findOrFail($id);
        if(!$product) {
            return;
        }

        $product->fill($data)->update();

        return $product;
    }

    public function delete(int $id)
    {
        $product = $this->productModel->findOrFail($id);
        if(!$product) {
            return;
        }

        return $product->delete();
    }

    public function getById(int $id)
    {
        return $this->productModel->findOrFail($id);
    }

    public function getCategoryByIdInProduct(int $id)
    {
        return $this->productModel->where('category_id', $id)->get();
    }
}

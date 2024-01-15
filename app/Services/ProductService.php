<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getList()
    {
        return $this->productRepository->getList();
    }

    public function add(array $data)
    {
        if (isset($data['image'])) {
            $image = $data['image'];
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public', $filename);
            $nameImage = $filename;
        }
        $setData = [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
            'image' => $nameImage
        ];

        $this->productRepository->add($setData);
    }

    public function edit(int $id)
    {
        return $this->productRepository->edit($id);
    }

    public function update(array $data, int $id)
    {
        if (isset($data['image'])) {
            $image = $data['image'];
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public', $filename);
            $nameImage = $filename;
        }
        $setData = [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
            'image' => $nameImage
        ];

        return $this->productRepository->update($setData, $id);
    }

    public function delete(int $id)
    {
        return $this->productRepository->delete($id);
    }

    public function getById(int $id)
    {
        return $this->productRepository->getById($id);
    }

    public function getCategoryByIdInProduct(int $id)
    {
        return $this->productRepository->getCategoryByIdInProduct($id);
    }
}

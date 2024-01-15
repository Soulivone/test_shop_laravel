<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class HomeWithOutAuthController extends Controller
{
    private $productService;
    private $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function getProduct()
    {
        $products = $this->productService->getList();
        $categorys = $this->categoryService->getList();
        return view('web.components.listProduct', [
            'products' => $products,
            'categorys' => $categorys,
        ]);
    }

    public function showProduct(int $id, Request $request)
    {
        $detailProduct = $this->productService->getById($id);
        // dd($detailProduct);
        $products = $this->productService->getList();
        return view('web.components.detail', [
            'detailProduct' => $detailProduct,
            'products' => $products
        ]);
    }

    public function getCategoryById(int $id)
    {
        $products = $this->productService->getList();
        $categorys = $this->categoryService->getList();
        $productCategorys = $this->productService->getCategoryByIdInProduct($id);
        $categoryName = $this->categoryService->getById($id);
        return view('web.components.listProductById', [
            'products' => $products,
            'categorys' => $categorys,
            'productCategorys' => $productCategorys,
            'categoryName' => $categoryName
        ]);
    }

    public function cart()
    {
        return view('web.components.cart');
    }
}

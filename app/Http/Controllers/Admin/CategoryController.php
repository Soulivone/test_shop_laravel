<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Http\Requests\Admin\Cat\CategoryCraeteRequest;
use App\Http\Requests\Admin\Cat\CategoryUpdateRequest;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = $this->categoryService->getList();
        return view('admin.category.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCraeteRequest $request)
    {
        $request = $request->validated();
        $data = [
            'category_name' => $request['category_name'],
        ];

        $this->categoryService->add($data);

        return redirect()->route('admin.category.index')->with('success', 'Category create successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->categoryService->edit($id);

        return view('admin.category.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $request = $request->validated();
        $data = [
            'category_name' => $request['category_name'],
        ];

        $this->categoryService->update($data, $id);

        return redirect()->route('admin.category.index')->with('success', 'Category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryService->delete($id);

        return redirect()->route('admin.category.index')->with('success', 'Category delete successfully.');
    }
}

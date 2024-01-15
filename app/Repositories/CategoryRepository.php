<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getList()
    {
        return $this->categoryModel->get();
    }

    public function add(array $data)
    {
        return $this->categoryModel->fill($data)->save();
    }

    public function edit(int $id)
    {
        return $this->categoryModel->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $category = $this->categoryModel->findOrFail($id);
        if(!$category) {
            return;
        }

        $category->fill($data)->update();

        return $category;
    }

    public function delete(int $id)
    {
        $category = $this->categoryModel->findOrFail($id);
        if(!$category) {
            return;
        }

        return $category->delete();
    }

    public function getById(int $id)
    {
        return $this->categoryModel->findOrFail($id);
    }
}

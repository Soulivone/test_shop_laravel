<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getList()
    {
        return $this->categoryRepository->getList();
    }

    public function add(array $data)
    {
        $this->categoryRepository->add($data);
    }

    public function edit(int $id)
    {
        return $this->categoryRepository->edit($id);
    }

    public function update(array $data, int $id)
    {
        return $this->categoryRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function getById(int $id)
    {
        return $this->categoryRepository->getById($id);
    }
}

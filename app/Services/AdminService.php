<?php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getList()
    {
        return $this->adminRepository->getList();
    }

    public function add(array $data)
    {
        $this->adminRepository->add($data);
    }

    public function edit(int $id)
    {
        return $this->adminRepository->edit($id);
    }

    public function update(array $data, int $id)
    {
        return $this->adminRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->adminRepository->delete($id);
    }
}

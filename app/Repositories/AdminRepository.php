<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{
    private $adminModel;

    public function __construct(Admin $adminModel)
    {
        $this->adminModel = $adminModel;
    }

    public function getList()
    {
        return $this->adminModel->get();
    }

    public function add(array $data)
    {
        return $this->adminModel->fill($data)->save();
    }

    public function edit(int $id)
    {
        return $this->adminModel->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $admin = $this->adminModel->findOrFail($id);
        if(!$admin) {
            return;
        }

        $admin->fill($data)->update();

        return $admin;
    }

    public function delete(int $id)
    {
        $admin = $this->adminModel->findOrFail($id);
        if(!$admin) {
            return;
        }

        return $admin->delete();
    }
}

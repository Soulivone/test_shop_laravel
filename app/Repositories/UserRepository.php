<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getList()
    {
        return $this->userModel->get();
    }

    public function add(array $data)
    {
        return $this->userModel->fill($data)->save();
    }

    public function edit(int $id)
    {
        return $this->userModel->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $user = $this->userModel->findOrFail($id);
        if(!$user) {
            return;
        }

        $user->fill($data)->update();

        return $user;
    }

    public function delete(int $id)
    {
        $user = $this->userModel->findOrFail($id);
        if(!$user) {
            return;
        }

        return $user->delete();
    }
}

<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getList()
    {
        return $this->userRepository->getList();
    }

    public function add(array $data)
    {
        $this->userRepository->add($data);
    }

    public function edit(int $id)
    {
        return $this->userRepository->edit($id);
    }

    public function update(array $data, int $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }
}

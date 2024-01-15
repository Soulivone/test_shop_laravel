<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getList()
    {
        return $this->orderRepository->getList();
    }
}

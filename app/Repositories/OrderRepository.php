<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    private $orderModel;

    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function getList()
    {
        return $this->orderModel->get();
    }
}

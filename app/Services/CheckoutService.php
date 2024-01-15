<?php

namespace App\Services;

use App\Repositories\CheckoutRepository;

class CheckoutService
{
    private $checkoutRepository;

    public function __construct(CheckoutRepository $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }

    public function add($order, array $orderItem)
    {
        $this->checkoutRepository->add($order, $orderItem);
    }
}

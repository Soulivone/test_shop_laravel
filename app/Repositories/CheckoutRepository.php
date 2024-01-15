<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;

class CheckoutRepository
{
    private $orderModel;
    private $orderItemModel;

    public function __construct(Order $orderModel, OrderItem $orderItemModel)
    {
        $this->orderModel = $orderModel;
        $this->orderItemModel = $orderItemModel;
    }

    public function add(array $order, array $orderItem)
    {
        $setOrder = new $this->orderModel;
        $setOrder->user_id = $order['user_id'];
        $setOrder->status = $order['status'];
        $setOrder->total_price = $order['total_price'];

        $setOrder->save();

        $setOrderItem = [
            'order_id' => $setOrder->id,
            'product_id' => $orderItem['product_id'],
            'quantity' => $orderItem['quantity'],
            'price' => $orderItem['price']
        ];

        $this->orderItemModel->fill($setOrderItem)->save();

        session()->forget('cart');
    }
}

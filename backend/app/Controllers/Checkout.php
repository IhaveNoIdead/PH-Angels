<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\OrderItemsModel;

class Checkout extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    
    public function index()
    {
        if (!$this->session->has('user')) 
        {
            return redirect()->to('/loginPage')->with('error', 'Please log in to proceed to checkout.');
        }
        
        $cart = $this->session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Cart is empty.');
        }

        return view('user/checkout', [
            'cartItems' => $cart
        ]);
    }

    // Checkout
    public function PlaceOrder()
    {
        if (!$this->session->has('user')) 
        {
            return redirect()->to('/loginPage')->with('error', 'Please log in to place an order.');
        }

        $cart = $this->session->get('cart');
        
        if (!$cart) {
            return redirect()->to('/cart')->with('error', 'Cart is empty.');
        }

        $location = $this->request->getPost('location');
        $pickupDate = $this->request->getPost('pickup_date');
        $pickupTime = $this->request->getPost('pickup_time');

        $ordersModel = new OrdersModel();
        $orderItemsModel = new OrderItemsModel();

        // Compute total amount
        $total = 0;

        foreach ($cart as $item) {
            $total += ($item['price'] * $item['quantity']);
        }

        // Insert order
        $orderId = $ordersModel->insert([
            'user_id'           => session('user')['id'] ?? null,
            'total_amount'      => $total,
            'status'            => 'Pending',
            'pickup_location'   => $location,
            'pickup_date'       => $pickupDate,
            'pickup_time'       => $pickupTime
        ]);

        // Insert order items
        foreach ($cart as $item) {
            $orderItemsModel->insert([
                'order_id'   => $orderId,
                'product_id' => $item['id'],
                'item_name'  => $item['product_name'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
                'subtotal'   => $item['price'] * $item['quantity']
            ]);
        }

        return redirect()->to('/paymentPage')->with('success', 'Order placed successfully!');
    }
}

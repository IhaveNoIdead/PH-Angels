<?php

namespace App\Controllers;

class Payment extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    
    public function index()
    {
        if (!$this->session->has('user')) 
        {
            return redirect()->to('/loginPage')->with('error', 'Please log in to proceed to payment.');
        }
        
        $cart = $this->session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Cart is empty.');
        }

        return view('user/paymentPage', [
            'cartItems' => $cart
        ]);
    }

    // Checkout
    public function Pay()
    {
        if (!$this->session->has('user')) 
        {
            return redirect()->to('/loginPage')->with('error', 'Please log in to complete an order.');
        }

        $cart = $this->session->get('cart');
        
        if (!$cart) {
            return redirect()->to('/cart')->with('error', 'Cart is empty.');
        }

        $this->session->remove('cart');
        return redirect()->to('/')->with('success', 'Payment Completed');
    }
}

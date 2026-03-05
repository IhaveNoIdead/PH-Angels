<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Cart extends BaseController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
        $this->session = session();
    }

    // Show cart page
    public function index()
    {
        $cart = $this->session->get('cart') ?? [];

        return view('user/Cart', [
            'cartItems' => $cart
        ]);
    }

    // Add product to cart
    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $product = $this->productsModel->find($productId);

        if (!$product) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to add product: not found'
            ]);
        }

        $cart = $this->session->get('cart') ?? [];

        $productType = $product->type ?? 'regular';

        if ($productType === 'Plan') {
            foreach ($cart as $id => $item) {
                if (($item['type'] ?? '') === 'Plan') {
                    unset($cart[$id]);
                }
            }
        }

        if (isset($cart[$productId])) 
        {
            $cart[$productId]['quantity']++;
        } 
        else 
        {
            $cart[$productId] = [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'product_image' => $product->product_image,
                'price' => $product->price,
                'quantity' => 1,
                'type' => $productType
            ];
        }

        $this->session->set('cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'message' => ($productType === 'Plan' ? 'Plan added successfully! Any previous plan was replaced.' : 'Product added successfully!')
        ]);
    }

    // Remove a product completely
    public function remove($id)
    {
        $cart = $this->session->get('cart') ?? [];
        unset($cart[$id]);
        $this->session->set('cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'id' => $id,
            'quantity' =>  0,
            'cartTotalPrice' => $this->getCartTotalPrice()
        ]);
    }

    // Increase quantity
    public function increase($id)
    {
        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id]))
        {
            if (($cart[$id]['type'] ?? 'regular') === 'Plan') 
            {
                $itemSubtotal = $cart[$id]['price'] * $cart[$id]['quantity'];
            } 
            else 
            {
                $cart[$id]['quantity']++;
                $itemSubtotal = $cart[$id]['price'] * $cart[$id]['quantity'];
            }
        }
        else
        {
            $itemSubtotal = 0;
        }
        $this->session->set('cart', $cart);

        return $this->response->setJSON([
            'id' => $id,
            'quantity' => $cart[$id]['quantity'] ?? 0,
            'itemSubtotal' => $itemSubtotal,
            'cartTotalPrice' => $this->getCartTotalPrice()
        ]);
    }

    // Decrease quantity
    public function decrease($id)
    {
        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) 
        {
            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0)
            {
                unset($cart[$id]);
                $itemSubtotal = 0;
            }
            else
            {
                $itemSubtotal = $cart[$id]['price'] * $cart[$id]['quantity'];
            }
        }
        else
        {
            $itemSubtotal = 0;
        }

        $this->session->set('cart', $cart);

        return $this->response->setJSON([
            'id' => $id,
            'quantity' => $cart[$id]['quantity'] ?? 0,
            'itemSubtotal' => $itemSubtotal,
            'cartTotalPrice' => $this->getCartTotalPrice()
        ]);
    }

    // Cart Total Price
    private function getCartTotalPrice()
    {
        $cart = $this->session->get('cart') ?? [];
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

}

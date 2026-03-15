<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductsModel;

class MenuController extends Controller
{
    public function menu()
    {
        $productsModel = new ProductsModel();
        $helicoptorProducts = $productsModel->where('type', 'Helicoptor')->findAll();
        $modificationProducts = $productsModel->where('type', 'Modification')->findAll();
        $repairProducts = $productsModel->where('type', 'Repair')->findAll();

        $data = [
            'helicoptorProducts' => $helicoptorProducts,
            'modificationProducts' => $modificationProducts,
            'repairProducts' => $repairProducts,
        ];

        return view('user/productsPage',  $data); 
    }
    
    public function Plans()
    {
        $productsModel = new ProductsModel();
        $plans = $productsModel->where('type', 'Plan')->findAll();

        $planData = [
            'plans' => $plans
        ];

         return view('user/plansPage',  $planData);
    }

    public function ProductDetails($id)
    {
        $productModel = new \App\Models\ProductsModel();

        $product = $productModel->find($id);

        return view('user/productDetails', [
            'product' => $product
        ]);
    }
}

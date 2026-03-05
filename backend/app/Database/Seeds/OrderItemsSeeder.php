<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        $orderItems = [
            [
                'order_id'   => 1,
                'product_id' => 1,
                'item_name'  => 'Robinson R44 Raven II',
                'quantity'   => 2,
                'price'      => 2550000.00,
                'subtotal'   => 2 * 2550000.00,
            ],
            [
                'order_id'   => 2,
                'product_id' => 3,
                'item_name'  => 'Robinson R44 Raven II',
                'quantity'   => 1,
                'price'      => 2550000.00,
                'subtotal'   => 2550000.00,
            ],

            [
                'order_id'   => 3,
                'product_id' => 2,
                'item_name'  => 'Robinson R44 Raven II',
                'quantity'   => 3,
                'price'      => 2550000.00,
                'subtotal'   => 3 * 2550000.00,
            ],
        ];

        $this->db->table('order_items')->insertBatch($orderItems);
    }
}

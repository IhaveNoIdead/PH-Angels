<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $dateNow = date('Y-m-d H:i:s');

        $ordersData = [
            [
                'user_id'    => 1,
                'total_amount' => 2 * 75.50,
                'pickup_location' => 'Ninoy Aquino International Airport',
                'status' => 'Pending',
                'pickup_date' => date('Y-m-d', strtotime('+1 day')),
                'pickup_time' => '10:00:00',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'user_id'    => 2,
                'total_amount' => 150.21,
                'pickup_location' => 'Ninoy Aquino International Airport',
                'status' => 'Pending',
                'pickup_date' => date('Y-m-d', strtotime('+1 day')),
                'pickup_time' => '10:00:00',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'user_id'    => 3,
                'total_amount' => 3 * 100.50,
                'pickup_location' => 'Ninoy Aquino International Airport',
                'status' => 'Pending',
                'pickup_date' => date('Y-m-d', strtotime('+1 day')),
                'pickup_time' => '10:00:00',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ];

        $this->db->table('orders')->insertBatch($ordersData);
    }
}

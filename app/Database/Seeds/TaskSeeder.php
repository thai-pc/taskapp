<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'description' => 'First task'
            ],
            [
                'description' => 'Second task'
            ]
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}

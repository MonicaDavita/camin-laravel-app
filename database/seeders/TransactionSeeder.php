<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'book_date' => now(),
            'duration' => 3,
            'participants' => 50,
            'proposal' => '10101',
            'berkas' => '10101',
            'description' => 'Halal Bihalal',
            'admin_id' => 1,
            'user_id' => 1,
            'facility_id' => 1,
        ]);

        Transaction::create([
            'book_date' => now(),
            'duration' => 2,
            'participants' => 50,
            'proposal' => '10101',
            'berkas' => '10101',
            'description' => 'Halal Bihalal',
            'admin_id' => 2,
            'user_id' => 1,
            'facility_id' => 2,
        ]);

        Transaction::create([
            'book_date' => now(),
            'duration' => 4,
            'participants' => 50,
            'proposal' => '10101',
            'berkas' => '10101',
            'description' => 'Halal Bihalal',
            'admin_id' => 1,
            'user_id' => 2,
            'facility_id' => 3,
        ]);

        Transaction::create([
            'book_date' => now(),
            'duration' => 2,
            'participants' => 50,
            'proposal' => '10101',
            'berkas' => '10101',
            'description' => 'Halal Bihalal',
            'admin_id' => 2,
            'user_id' => 2,
            'facility_id' => 4,
        ]);

        Transaction::create([
            'book_date' => now(),
            'duration' => 1,
            'participants' => 50,
            'proposal' => '10101',
            'berkas' => '10101',
            'description' => 'Halal Bihalal',
            'admin_id' => 1,
            'user_id' => 3,
            'facility_id' => 5,
        ]);
    }
}

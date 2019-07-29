<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'slug' => 'BBD',
                'description' => 'Conta Corrente BB',
                'initial_balance' => 10,
                'balance' => null,
                'balance_time' => null,
                'bill_close_day' => null,
                'bill_due_day' => null,
            ], [
                'id' => 2,
                'user_id' => 1,
                'slug' => 'BBC',
                'description' => 'Cartão de crédito BB',
                'initial_balance' => 0,
                'balance' => null,
                'balance_time' => null,
                'bill_close_day' => 7,
                'bill_due_day' => 12,
            ], [
                'id' => 3,
                'user_id' => 2,
                'slug' => 'XXX',
                'description' => 'Conta corrente',
                'initial_balance' => 0,
                'balance' => null,
                'balance_time' => null,
                'bill_close_day' => null,
                'bill_due_day' => null,
            ],
        ]);
    }
}

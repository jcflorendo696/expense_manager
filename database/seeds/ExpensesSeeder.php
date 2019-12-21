<?php

use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'amount'            => '$500.00',
            'expense_category'  => 'Travel',
            'user_id'           => '2',
            'password'          => Hash::make('admin12345'),
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);
    }
}

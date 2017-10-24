<?php

use App\Bank;
use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->delete();
        Bank::create(['name' => 'Vojvodjanska Banka']);
        Bank::create(['name' => 'Raiffeisen']);
    }
}

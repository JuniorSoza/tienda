<?php

use Illuminate\Database\Seeder;
use App\Credito;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credito::truncate();
        Credito::create(['user_id'=>1,'credito_foto'=>1,'credito_codigo'=>1]);
               
    }
}

<?php

use Illuminate\Database\Seeder;
use App\plan;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        plan::truncate();
        //plan::create(['id_user'=>14,'id_servicio'=>1,'cant_pantalla'=>5,'usuario'=>'ashdgjasd','contrasena'=>'yas2','valor'=>5]);

    }
}

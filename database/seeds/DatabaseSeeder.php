<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Andres Plehm',
            'username' => 'polach',
            'rol_usuario' => 1,
            'num_legajo' => 137,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Sistemas',
            'email' => 'sistemas@odontopraxis.com.ar',
            'ip_maquina' => '192.168.20.146',
            'password' => bcrypt('polacoputo'),
        ]);
    }
}

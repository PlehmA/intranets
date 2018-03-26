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
            'foto' => 'fotos/polach.jpg',
            'ip_maquina' => '192.168.20.146',
            'password' => bcrypt('polacoputo'),
        ]);

        DB::table('puestos')->insert([
            'id' => 1,
            'nombre_puesto' => 'Presidencia',
        ]);
        DB::table('puestos')->insert([
            'id' => 2,
            'nombre_puesto' => 'Gerencia',
        ]);
        DB::table('puestos')->insert([
            'id' => 3,
            'nombre_puesto' => 'Departamento de Sistemas',
        ]);
        DB::table('puestos')->insert([
            'id' => 4,
            'nombre_puesto' => 'Call-Center',
        ]);
        DB::table('puestos')->insert([
            'id' => 5,
            'nombre_puesto' => 'Recursos Humanos',
        ]);
        DB::table('puestos')->insert([
            'id' => 6,
            'nombre_puesto' => 'Auditoria',
        ]);
        DB::table('puestos')->insert([
            'id' => 7,
            'nombre_puesto' => 'Profesionales',
        ]);
        DB::table('puestos')->insert([
            'id' => 8,
            'nombre_puesto' => 'Desarrollo',
        ]);
        DB::table('puestos')->insert([
            'id' => 9,
            'nombre_puesto' => 'Administración',
        ]);
        DB::table('puestos')->insert([
            'id' => 10,
            'nombre_puesto' => 'Recepción',
        ]);
    }
}

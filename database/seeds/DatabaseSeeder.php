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
            'username' => 'aplehm',
            'rol_usuario' => 1,
            'num_legajo' => 137,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Sistemas',
            'email' => 'aplehm@odontopraxis.com.ar',
            'email_personal' => 'polachgg@gmail.com',
            'contra_mail' => 'Newsist2018',
            'foto' => 'storage/aplehm.jpg',
            'interno' => '181',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.146',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ivan Picoy',
            'username' => 'ipicoy',
            'rol_usuario' => 1,
            'num_legajo' => 126,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Sistemas',
            'email' => 'sistemas@odontopraxis.com.ar',
            'email_personal' => 'ipicoy@gmail.com',
            'contra_mail' => 'Newsist2018',
            'foto' => 'storage/ipicoy.jpg',
            'interno' => '181',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.33',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Patricia Palermo',
            'username' => 'ppalermo',
            'rol_usuario' => 1,
            'num_legajo' => 97,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Sistemas',
            'email' => 'pspalermo@odontopraxis.com.ar',
            'email_personal' => 'ppalermo@gmail.com',
            'contra_mail' => 'PSPm1345',
            'foto' => 'storage/ppalermo.jpg',
            'interno' => '180',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.124',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Agustin Polla',
            'username' => 'apolla',
            'rol_usuario' => 1,
            'num_legajo' => 160,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Desarrollo',
            'email' => 'agonzalo@odontopraxis.com.ar',
            'email_personal' => 'apolla@gmail.com',
            'contra_mail' => 'NewAPG2018',
            'foto' => 'storage/apolla.jpg',
            'interno' => '180',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.191',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Marcelo Sifón',
            'username' => 'msifon',
            'rol_usuario' => 1,
            'num_legajo' => 46,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Recursos Humanos',
            'email' => 'admpersonal@odontopraxis.com.ar',
            'email_personal' => 'pmsifon@gmail.com',
            'contra_mail' => 'RRHH2015',
            'foto' => 'storage/msifon.jpg',
            'interno' => '170',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.146',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Laura Carimali',
            'username' => 'lcarimali',
            'rol_usuario' => 1,
            'num_legajo' => 108,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Departamento de Auditoria',
            'email' => 'auditoria@odontopraxis.com.ar',
            'email_personal' => 'polachgg@gmail.com',
            'contra_mail' => 'newaudi7004',
            'foto' => 'storage/lcarimali.jpg',
            'interno' => '123',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.146',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Brenda Miller',
            'username' => 'bmiller',
            'rol_usuario' => 1,
            'num_legajo' => 110,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1987',
            'puesto' => 'Recepción',
            'email' => 'recepcion@odontopraxis.com.ar',
            'email_personal' => 'polachgg@gmail.com',
            'contra_mail' => 'ReCe1211bis',
            'foto' => 'storage/bmiller.jpg',
            'interno' => '100',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.52',
            'password' => bcrypt('secret'),
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

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Claudia Marcela Tuozzo',
            'username' => 'cmtuozzo',
            'tipo_rol'  => 1,
            'rol_usuario' => 1,
            'num_legajo' => 32,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1978',
            'puesto' => 'Presidenta',
            'email' => 'cmtuozzo@odontopraxis.com.ar',
            'contra_mail' => 'Newsist2018',
            'interno' => '181',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.90',
            'password' => 'Odonto$Praxi$13A'
        ]);
    
        
            App\User::create([
                'name' => 'Leonardo Andres Plehm',
                'username' => 'aplehm',
                'rol_usuario' => 3,
                'tipo_rol'  => 3,
                'num_legajo' => 137,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'sistemas@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/aplehm.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.40',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Ivan Erland Picoy',
                'username' => 'ipicoy',
                'rol_usuario' => 3,
                'tipo_rol'  => 3,
                'num_legajo' => 127,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'sistemas@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/ipicoy.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.33',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Patricia Palermo',
                'username' => 'ppalermo',
                'rol_usuario' => 3,
                'tipo_rol'  => 2,
                'num_legajo' => 97,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'pspalermo@odontopraxis.com.ar',
                'contra_mail' => 'PSPm1345',
                'foto' => 'storage/ppalermo.png',
                'interno' => '180',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.36',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Agustin Gonzalo Polla',
                'username' => 'agpolla',
                'rol_usuario' => 8,
                'tipo_rol'  => 3,
                'num_legajo' => 146,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Desarrollo',
                'email' => 'agonzalo@odontopraxis.com.ar',
                'contra_mail' => 'NewAPG2018',
                'foto' => 'storage/agpolla.png',
                'interno' => '180',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.35',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Marcelo Sifón',
                'username' => 'msifon',
                'rol_usuario' => 5,
                'tipo_rol'  => 2,
                'num_legajo' => 46,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Recursos Humanos',
                'email' => 'admpersonal@odontopraxis.com.ar',
                'contra_mail' => 'RRHH2015',
                'foto' => 'storage/msifon.png',
                'interno' => '170',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.95',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Laura Carimali',
                'username' => 'lcarimali',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 108,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'auditoria@odontopraxis.com.ar',
                'contra_mail' => 'newaudi7004',
                'foto' => 'storage/lcarimali.png',
                'interno' => '123',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.66',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Brenda Lara Miller',
                'username' => 'blmiller',
                'rol_usuario' => 10,
                'tipo_rol'  => 3,
                'num_legajo' => 110,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Recepción',
                'email' => 'recepcion@odontopraxis.com.ar',
                'contra_mail' => 'ReCe1211bis',
                'foto' => 'storage/blmiller.png',
                'interno' => '100',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.72',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Leandro Castro Vila',
                'username' => 'lcastrovila',
                'rol_usuario' => 12,
                'tipo_rol'  => 3,
                'num_legajo' => 50,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Marketing',
                'email' => 'admpersonal@odontopraxis.com.ar',
                'contra_mail' => 'RRHH2015',
                'interno' => '170',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.250',
                'password' => 'Lean1345$$'
            ]);
            App\User::create([
                'name' => 'Alejandra Maria Cardoso',
                'username' => 'amcardoso',
                'rol_usuario' => 11,
                'tipo_rol'  => 3,
                'num_legajo' => 94,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Secretaria',
                'email' => 'secretaria@odontopraxis.com.ar',
                'contra_mail' => 'Secreta9832',
                'foto' => 'storage/acardozo.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.71',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Julieta Rodriguez Lavalle',
                'username' => 'jrlavalle',
                'rol_usuario' => 6,
                'tipo_rol'  => 2,
                'num_legajo' => 103,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'jrlavalle@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jrlavalle.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.60',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Monti Juan Carlos',
                'username' => 'jcmonti',
                'rol_usuario' => 9,
                'tipo_rol'  => 3,
                'num_legajo' => 26,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Administración',
                'email' => 'jcmonti@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jcmonti.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.50',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Elisa Ines Gonzalez',
                'username' => 'eigonzalez',
                'rol_usuario' => 9,
                'tipo_rol'  => 3,
                'num_legajo' => 57,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Administración',
                'email' => 'proveedores@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.54',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Damian Miguel Saracena',
                'username' => 'dmsaracena',
                'rol_usuario' => 9,
                'tipo_rol'  => 3,
                'num_legajo' => 112,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Administración',
                'email' => 'dsaracena@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/dmsaracena.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.51',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Andrés Daniel Dendarieta',
                'username' => 'addendarieta',
                'rol_usuario' => 9,
                'tipo_rol'  => 3,
                'num_legajo' => 132,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Administración',
                'email' => 'emision_factura@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/addendarieta.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.52',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Silvina Ines Petric',
                'username' => 'sipetric',
                'rol_usuario' => 9,
                'tipo_rol'  => 3,
                'num_legajo' => 142,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Administración',
                'email' => 'emision_factura@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/sipetric.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.55',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Jorge Dalmasso',
                'username' => 'jdalmasso',
                'rol_usuario' => 2,
                'tipo_rol'  =>  1,
                'num_legajo' => 12,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Gerencia',
                'email' => 'jdalmasso@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jdalmasso.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.93',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Gerardo Horacio Scialpi',
                'username' => 'ghscialpi',
                'rol_usuario' => 9,
                'tipo_rol'  =>  1,
                'num_legajo' => 140,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Administración',
                'email' => 'gscialpi@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/ghscialpi.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.93',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Gabriela Arriola',
                'username' => 'garriola',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 15,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'auditoria@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/garriola.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.61',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Alejandro Gamarra',
                'username' => 'agamarra',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 35,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'auditoria@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/agamarra.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.68',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Mariana Alicia Zorzano',
                'username' => 'mazorzano',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 76,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'auditoria@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/mazorzano.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.69',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Julia Marina Di Pietro',
                'username' => 'jmdipietro',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 105,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'auditoria@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jmdipietro.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.64',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Agustina Carla Gonzalez',
                'username' => 'acgonzalez',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 114,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'auditoria@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/acgonzalez.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.65',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Melanie Agustina Zambelli',
                'username' => 'mazambelli',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 115,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '31/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'autorizaciones@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/mazambelli.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.67',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Guillermo Emiliano Pastó',
                'username' => 'gepasto',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 118,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'autorizaciones@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/gepasto.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.62',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Luisina Garzia',
                'username' => 'lgarzia',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 119,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'autorizaciones@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/lgarzia.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.70',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Alberto Carlos Dominguez',
                'username' => 'acdominguez',
                'rol_usuario' => 6,
                'tipo_rol'  => 3,
                'num_legajo' => 145,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'autorizaciones@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/acdominguez.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.63',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Yanina Marisel Vergara',
                'username' => 'ymvergara',
                'rol_usuario' => 7,
                'tipo_rol'  => 3,
                'num_legajo' => 86,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Departamento de Profesionales',
                'email' => 'autorizaciones@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/ymvergara.png',
                'interno' => '142',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.83',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Mariela Vanesa Sirvent',
                'username' => 'mvsirvent',
                'rol_usuario' => 7,
                'tipo_rol'  => 3,
                'num_legajo' => 141,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Departamento de Profesionales',
                'email' => 'profesionales@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/mvsirvent.png',
                'interno' => '141',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.82',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Marta Ojeda',
                'username' => 'mojeda',
                'rol_usuario' => 7,
                'tipo_rol'  => 2,
                'num_legajo' => 87,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Departamento de Profesionales',
                'email' => 'mojeda@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'interno' => '140',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.81',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Lidia Draghi',
                'username' => 'ldraghi',
                'rol_usuario' => 9,
                'tipo_rol'  => 1,
                'num_legajo' => 1,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '13/10/1987',
                'puesto' => 'Administración',
                'email' => 'ldraghi@odontopraxis.com.ar',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/ldraghi.png',
                'interno' => '140',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.92',
                'password' => 'Odonto$Praxi$13A'
            ]);
            App\User::create([
                'name' => 'Diego Jesus Zaragoza',
                'username' => 'djzaragoza',
                'rol_usuario' => 8,
                'tipo_rol'  => 3,
                'num_legajo' => 147,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Desarrollo',
                'email' => 'dzaragoza@odontopraxis.com.ar',
                'contra_mail' => 'NewAPG2018',
                'foto' => 'storage/djzaragoza.png',
                'interno' => '180',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.34',
                'password' => 'Odonto$Praxi$13A'
            ]);
    }
}

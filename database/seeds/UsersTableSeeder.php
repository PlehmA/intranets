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
            'name' => 'Claudia Tuozzo',
            'username' => 'cmtuozzo',
            'rol_usuario' => 1,
            'num_legajo' => 32,
            'fecha_ingreso' => '03/04/2017',
            'fecha_nacimiento' => '30/07/1978',
            'puesto' => 'Presidenta',
            'email' => 'cmtuozzo@odontopraxis.com.ar',
            'email_personal' => 'cmtuozzo@odontopraxis.com.ar',
            'contra_mail' => 'Newsist2018',
            'foto' => 'storage/aplehm.png',
            'interno' => '181',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.90',
            'password' => '123456'
        ]);
    
        
            App\User::create([
                'name' => 'Andres Plehm',
                'username' => 'aplehm',
                'rol_usuario' => 3,
                'num_legajo' => 137,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'sistemas@odontopraxis.com.ar',
                'email_personal' => 'polachgg@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/aplehm.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.34',
                'password' => '123456'
            ]);
            App\User::create([
                'name' => 'Ivan Picoy',
                'username' => 'ipicoy',
                'rol_usuario' => 3,
                'num_legajo' => 126,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'sistemas@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/ipicoy.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.33',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Patricia Palermo',
                'username' => 'ppalermo',
                'rol_usuario' => 3,
                'num_legajo' => 97,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'pspalermo@odontopraxis.com.ar',
                'email_personal' => 'ppalermo@gmail.com',
                'contra_mail' => 'PSPm1345',
                'foto' => 'storage/ppalermo.png',
                'interno' => '180',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.124',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Agustin Polla',
                'username' => 'apolla',
                'rol_usuario' => 8,
                'num_legajo' => 160,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Desarrollo',
                'email' => 'agonzalo@odontopraxis.com.ar',
                'email_personal' => 'apolla@gmail.com',
                'contra_mail' => 'NewAPG2018',
                'foto' => 'storage/apolla.png',
                'interno' => '180',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.191',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Marcelo Sifón',
                'username' => 'msifon',
                'rol_usuario' => 5,
                'num_legajo' => 46,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Recursos Humanos',
                'email' => 'admpersonal@odontopraxis.com.ar',
                'email_personal' => 'pmsifon@gmail.com',
                'contra_mail' => 'RRHH2015',
                'foto' => 'storage/msifon.png',
                'interno' => '170',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.95',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Laura Carimali',
                'username' => 'lcarimali',
                'rol_usuario' => 6,
                'num_legajo' => 108,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoria',
                'email' => 'auditoria@odontopraxis.com.ar',
                'email_personal' => 'polachgg@gmail.com',
                'contra_mail' => 'newaudi7004',
                'foto' => 'storage/lcarimali.png',
                'interno' => '123',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.66',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Brenda Miller',
                'username' => 'bmiller',
                'rol_usuario' => 10,
                'num_legajo' => 110,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Recepción',
                'email' => 'recepcion@odontopraxis.com.ar',
                'email_personal' => 'polachgg@gmail.com',
                'contra_mail' => 'ReCe1211bis',
                'foto' => 'storage/bmiller.png',
                'interno' => '100',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.72',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Leandro Castro Vila',
                'username' => 'lcastrovila',
                'rol_usuario' => 12,
                'num_legajo' => 50,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Marketing',
                'email' => 'admpersonal@odontopraxis.com.ar',
                'email_personal' => 'pmsifon@gmail.com',
                'contra_mail' => 'RRHH2015',
                'foto' => 'storage/msifon.png',
                'interno' => '170',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.250',
                'password' => '123456'
            ]);
            App\User::create([
                'name' => 'Alejandra Cardozo',
                'username' => 'acardozo',
                'rol_usuario' => 11,
                'num_legajo' => 1,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Sistemas',
                'email' => 'secretaria@odontopraxis.com.ar',
                'email_personal' => 'polachgg@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/aplehm.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.71',
                'password' => '123456'
            ]);
            App\User::create([
                'name' => 'Julieta Rodriguez Lavalle',
                'username' => 'jrlavalle',
                'rol_usuario' => 6,
                'num_legajo' => 103,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Departamento de Auditoría',
                'email' => 'jrlavalle@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jrlavalle.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.60',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Monti Juan Carlos',
                'username' => 'jcmonti',
                'rol_usuario' => 9,
                'num_legajo' => 26,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'jcmonti@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jcmonti.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.50',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Elisa Ines Gonzalez',
                'username' => 'eigonzalez',
                'rol_usuario' => 9,
                'num_legajo' => 57,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'proveedores@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.54',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Damian Miguel Saracena',
                'username' => 'dmsaracena',
                'rol_usuario' => 9,
                'num_legajo' => 112,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'dsaracena@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/dmsaracena.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.51',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Andrés Daniel Dendarieta',
                'username' => 'addendarieta',
                'rol_usuario' => 9,
                'num_legajo' => 132,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'emision_factura@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/addendarieta.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.52',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Silvina Ines Petric',
                'username' => 'sipetric',
                'rol_usuario' => 9,
                'num_legajo' => 142,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'emision_factura@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/sipetric.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.55',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Jorge Dalmasso',
                'username' => 'jdalmasso',
                'rol_usuario' => 2,
                'num_legajo' => 12,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'jdalmasso@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/jdalmasso.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.93',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Gerardo Horacio Scialpi',
                'username' => 'ghscialpi',
                'rol_usuario' => 9,
                'num_legajo' => 140,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'gscialpi@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/ghscialpi.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.93',
                'password' => 'secret'
            ]);
            App\User::create([
                'name' => 'Arriola Gabriela',
                'username' => 'garriola',
                'rol_usuario' => 6,
                'num_legajo' => 15,
                'fecha_ingreso' => '03/04/2017',
                'fecha_nacimiento' => '30/07/1987',
                'puesto' => 'Auditoria',
                'email' => 'auditoria@odontopraxis.com.ar',
                'email_personal' => 'ipicoy@gmail.com',
                'contra_mail' => 'Newsist2018',
                'foto' => 'storage/garriola.png',
                'interno' => '181',
                'estado' => 'online',
                'ip_maquina' => '192.168.20.61',
                'password' => 'secret'
            ]);
    }
}

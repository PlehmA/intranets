<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Template::create([
            'rol_usuario'   => 7,
            'enlace'        => 'https://onedrive.live.com/edit.aspx?cid=894d4e5b134c5b8d&page=view&resid=894D4E5B134C5B8D!155&parId=894D4E5B134C5B8D!152&authkey=!AM7ykAKAkUHulr4&app=Word',
            'foto'          => 'storage/plantillas/profesionales/1.png',
            'titulo'        => 'Bienvenida Profesionales',
        ]);
        App\Template::create([
            'rol_usuario'   => 7,
            'enlace'        => 'https://onedrive.live.com/edit.aspx?cid=894d4e5b134c5b8d&page=view&resid=894D4E5B134C5B8D!157&parId=894D4E5B134C5B8D!152&authkey=!AM7ykAKAkUHulr4&app=Word',
            'foto'          => 'storage/plantillas/profesionales/2.png',
            'titulo'        => 'Nota validador y carga - Etapas 1 Y 2',
        ]);
    }
}

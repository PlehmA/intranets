<?php

use Illuminate\Database\Seeder;

class OnedriveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('onedrives')->insert([
            'titulo'      => '1.Gestión.',
            'foto_video'  => 'img/onedrive/1.png',
            'video'       => 'videos/onedrive/1-gestion.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '2.Subida y descarga de archivos.',
            'foto_video'  => 'img/onedrive/2.png',
            'video'       => 'videos/onedrive/2-subir_y_descargar_archivos.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '3.Acciones complementarias.',
            'foto_video'  => 'img/onedrive/3.png',
            'video'       => 'videos/onedrive/3-acciones_complementarias.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '4.Compartir archivos.',
            'foto_video'  => 'img/onedrive/4.png',
            'video'       => 'videos/onedrive/4-compartir_archivos.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '5.Compartir archivos por enlace.',
            'foto_video'  => 'img/onedrive/5.png',
            'video'       => 'videos/onedrive/5-compartir_archivos_por_enlace.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '6.Búsqueda de archivos.',
            'foto_video'  => 'img/onedrive/6.png',
            'video'       => 'videos/onedrive/8-busqueda_de_archivos.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '7.Estructura de archivos.',
            'foto_video'  => 'img/onedrive/7.png',
            'video'       => 'videos/onedrive/9-estructura-archivos.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '8.Office online.',
            'foto_video'  => 'img/onedrive/8.png',
            'video'       => 'videos/onedrive/10-office_online.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '9.Abrir archivos desde el Office de escritorio.',
            'foto_video'  => 'img/onedrive/9.png',
            'video'       => 'videos/onedrive/11-abrir_archivos_desde_office.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '10.Guardar archivos hacia OneDrive.',
            'foto_video'  => 'img/onedrive/10.png',
            'video'       => 'videos/onedrive/12-guardar_archivos_hacia_onedrive.mp4',
            'id_programa' => '5'
          ]);
          DB::table('onedrives')->insert([
            'titulo'      => '11.Autoguardado.',
            'foto_video'  => 'img/onedrive/11.png',
            'video'       => 'videos/onedrive/13-autoguardado.mp4',
            'id_programa' => '5'
          ]);

    }
}

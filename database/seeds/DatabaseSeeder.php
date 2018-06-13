<?php

use \App\Calendar;
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
            'foto' => 'storage/aplehm.png',
            'interno' => '181',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.35',
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
            'foto' => 'storage/ipicoy.png',
            'interno' => '181',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.30',
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
            'foto' => 'storage/ppalermo.png',
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
            'foto' => 'storage/apolla.png',
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
            'foto' => 'storage/msifon.png',
            'interno' => '170',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.130',
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
            'foto' => 'storage/lcarimali.png',
            'interno' => '123',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.1',
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
            'foto' => 'storage/bmiller.png',
            'interno' => '100',
            'estado' => 'online',
            'ip_maquina' => '192.168.20.52',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Leandro Castro Vila',
            'username' => 'lcastrov',
            'rol_usuario' => 1,
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
            'ip_maquina' => '192.168.20.146',
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
        DB::table('contacts')->insert([
          'id_usuario' => '1',
          'nomyap' => 'Itprouser',
          'correo' => 'sdaj@gmail.com',
          'direccion' => 'sdasdasd 1515',
          'provincia' => 'Buenos Aires',
          'partido' => 'Capital Federal',
          'localidad' => 'Capital Federal',
          'tellinea' => '48596587',
          'telcel' => '1569876483',
          'interno' => '-',
        ]);
        DB::table('contacts')->insert([
          'id_usuario' => '1',
          'nomyap' => 'Lo puto de tS',
          'correo' => 'sdaj@gmail.com',
          'direccion' => 'asdasda asdasd 1896',
          'provincia' => 'Cordoba',
          'partido' => 'que se yo',
          'localidad' => 'por ahi',
          'tellinea' => '48544-421852',
          'telcel' => '15234658535',
          'interno' => '-',
        ]);
        ##################################################                    ############################################
        ##################################################                    ############################################
        ##################################################                    ############################################
        ##################################################                    ############################################
        ##################################################Esto es Office Calc ############################################
        ##################################################                    ############################################
        ##################################################                    ############################################
        ##################################################                    ############################################
        ##################################################                    ############################################
        ##################################################                    ############################################
        DB::table('tutorials')->insert([
          'titulo'      => '1.Introducción.',
          'foto_video'  => 'img/offcalc/1.png',
          'video'       => 'videos\office_calc\1-Intro.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '2.¿Qué es Calc?',
          'foto_video'  => 'img/offcalc/2.png',
          'video'       => 'videos\office_calc\2-Que_es_calc.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '3.Componentes de Office Calc.',
          'foto_video'  => 'img/offcalc/3.png',
          'video'       => 'videos\office_calc\3-Componentes_de_Office_calc.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '4.Cómo moverse en Office Calc.',
          'foto_video'  => 'img/offcalc/4.png',
          'video'       => 'videos\office_calc\4-Como_moverse_en_Office_calc.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '5.Selección de celdas.',
          'foto_video'  => 'img/offcalc/5.png',
          'video'       => 'videos\office_calc\5-Seleccion_de_celdas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '6.Insertar filas o columnas.',
          'foto_video'  => 'img/offcalc/6.png',
          'video'       => 'videos\office_calc\6-Insertar_filas_o_columnas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '7.Uso de hojas.',
          'foto_video'  => 'img/offcalc/7.png',
          'video'       => 'videos\office_calc\7-Uso_de_hojas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '8.Fijar filas o columnas.',
          'foto_video'  => 'img/offcalc/8.png',
          'video'       => 'videos\office_calc\8-Fijar_filas_o_columnas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '9.Introducir correctamente información.',
          'foto_video'  => 'img/offcalc/9.png',
          'video'       => 'videos\office_calc\9-Introducir_correctamente_informacion.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '10.Relleno de celdas.',
          'foto_video'  => 'img/offcalc/10.png',
          'video'       => 'videos\office_calc\10-Relleno_de_celdas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '11.Múltiples líneas de texto en única celda.',
          'foto_video'  => 'img/offcalc11png',
          'video'       => 'videos\office_calc\11-Multiples_lineas_de_texto_en_unica_celda.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '12.Formatos de números.',
          'foto_video'  => 'img/offcalc/12.png',
          'video'       => 'videos\office_calc\12-Formatos_de_numeros.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '13.Formatos de celdas.',
          'foto_video'  => 'img/offcalc/13.png',
          'video'       => 'videos\office_calc\13-Formatos_de_celdas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '14.Ordenar datos.',
          'foto_video'  => 'img/offcalc/14.png',
          'video'       => 'videos\office_calc\14-Ordenar_datos.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '15.Herramienta busqueda.',
          'foto_video'  => 'img/offcalc/15.png',
          'video'       => 'videos\office_calc\15-Herramienta_busqueda.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '16.Tablas y gráficos.',
          'foto_video'  => 'img/offcalc/16.png',
          'video'       => 'videos\office_calc\16-Tablas_y_graficos.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '17.Tablas y gráficos parte 2',
          'foto_video'  => 'img/offcalc/17.png',
          'video'       => 'videos\office_calc\17-Tablas_y_graficos_parte_2.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '18.Estilos en Calc.',
          'foto_video'  => 'img/offcalc/18.png',
          'video'       => 'videos\office_calc\18-Estilos_en_calc.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '19.Estilos en Calc parte 2.',
          'foto_video'  => 'img/offcalc/19.png',
          'video'       => 'videos\office_calc\19-Estilos_en_calc_parte_2.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '20.Estilos en Calc parte 3.',
          'foto_video'  => 'img/offcalc/20.png',
          'video'       => 'videos\office_calc\20-Estilos_en_calc_parte_3.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '21.Estilos en Calc parte 4.',
          'foto_video'  => 'img/offcalc/21.png',
          'video'       => 'videos\office_calc\21-Estilos_en_calc_parte_4.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '22.Plantillas.',
          'foto_video'  => 'img/offcalc/22.png',
          'video'       => 'videos\office_calc\22-Plantillas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '23.Plantillas parte 2.',
          'foto_video'  => 'img/offcalc/23.png',
          'video'       => 'videos\office_calc\23-Plantillas_parte_2.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '24.Imágenes.',
          'foto_video'  => 'img/offcalc/24.png',
          'video'       => 'videos\office_calc\24-Imagenes.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '25.Imágenes parte 2.',
          'foto_video'  => 'img/offcalc/25.png',
          'video'       => 'videos\office_calc\25-Imagenes_parte_2.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '26.Exportar a otros formatos.',
          'foto_video'  => 'img/offcalc/26.png',
          'video'       => 'videos\office_calc\26-Exportar_a_otros_formatos.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '27.Exportar a Pdf.',
          'foto_video'  => 'img/offcalc/27.png',
          'video'       => 'videos\office_calc\27-Exportar_a_pdf.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '28.Funciones.',
          'foto_video'  => 'img/offcalc/28.png',
          'video'       => 'videos\office_calc\28-Funciones.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '29.Fórmulas.',
          'foto_video'  => 'img/offcalc/29.png',
          'video'       => 'videos\office_calc\29-Formulas.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '30.Operaciones.',
          'foto_video'  => 'img/offcalc/30.png',
          'video'       => 'videos\office_calc\30-Operaciones.mp4',
          'id_programa' => '1'
        ]);
        DB::table('tutorials')->insert([
          'titulo'      => '31.Ejercicio practico: Factura.',
          'foto_video'  => 'img/offcalc/31.png',
          'video'       => 'videos\office_calc\31-Ejercicio_practico_Factura.mp4',
          'id_programa' => '1'
        ]);

        ########################### ACA SE MANEJA LA PARTE DE OFFICE WRITER ########################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE WRITER########################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE WRITER#########################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE WRITER#########################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE WRITER#######################################################

        DB::table('officewriters')->insert([
          'titulo'      => '1.Interfaz del usuario.',
          'foto_video'  => 'img/writer/1.png',
          'video'       => 'videos\office_writer/1-Interfaz_de_usuario.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '2.Interfaz parte 2',
          'foto_video'  => 'img/writer/2.png',
          'video'       => 'videos\office_writer\2-Interfaz_de_usuario_parte_2.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '3.Abrir documentos.',
          'foto_video'  => 'img/writer/3.png',
          'video'       => 'videos\office_writer\3-Abrir_documentos.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '4.Propiedades de un documento.',
          'foto_video'  => 'img/writer/4.png',
          'video'       => 'videos\office_writer\4-Propiedades_de_un_documento.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '5.Textos.',
          'foto_video'  => 'img/writer/5.png',
          'video'       => 'videos\office_writer\5-Textos.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '6.Copiar y pegar.',
          'foto_video'  => 'img/writer/6.png',
          'video'       => 'videos\office_writer\6_Copiar_y_pegar.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '7.Búsqueda y remplazo.',
          'foto_video'  => 'img/writer/7.png',
          'video'       => 'videos\office_writer\7-Busqueda_y_remplazo.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '8.Formato de texto.',
          'foto_video'  => 'img/writer/8.png',
          'video'       => 'videos\office_writer\8-formatodetexto.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '9.Formato de párrafo.',
          'foto_video'  => 'img/writer/9.png',
          'video'       => 'videos\office_writer\9-formatoparrafo.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '10.Listas.',
          'foto_video'  => 'img/writer/10.png',
          'video'       => 'videos\office_writer\10-listas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '11.Estilos.',
          'foto_video'  => 'img/writer11png',
          'video'       => 'videos\office_writer\11-estilos.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '12.Estilos y formatos.',
          'foto_video'  => 'img/writer/12.png',
          'video'       => 'videos\office_writer\12-estilosyformato.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '13.Estilos de párrafo.',
          'foto_video'  => 'img/writer/13.png',
          'video'       => 'videos\office_writer\13-estilosdeparrafo.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '14.Estilos a un texto.',
          'foto_video'  => 'img/writer/14.png',
          'video'       => 'videos\office_writer\14-estilosauntexto.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '15.Estilos de página.',
          'foto_video'  => 'img/writer/15.png',
          'video'       => 'videos\office_writer\15-estilosdepagina.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '16.Imágenes.',
          'foto_video'  => 'img/writer/16.png',
          'video'       => 'videos\office_writer\16-imagenes.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '17.Imágenes parte 2',
          'foto_video'  => 'img/writer/17.png',
          'video'       => 'videos\office_writer\17-imagenesparte2.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '18.Tablas.',
          'foto_video'  => 'img/writer/18.png',
          'video'       => 'videos\office_writer\18-tablas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '19.Operaciones y tablas.',
          'foto_video'  => 'img/writer/19.png',
          'video'       => 'videos\office_writer\19-operacionesytablas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '20.Insertar filas y columnas.',
          'foto_video'  => 'img/writer/20.png',
          'video'       => 'videos\office_writer\20-insertarfilasycolumnas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '21.Dividir celdas.',
          'foto_video'  => 'img/writer/21.png',
          'video'       => 'videos\office_writer\21-dividirceldas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '22.Bordes y fondos.',
          'foto_video'  => 'img/writer/22.png',
          'video'       => 'videos\office_writer\22-bordesyfondos.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '23.Formato de tabla.',
          'foto_video'  => 'img/writer/23.png',
          'video'       => 'videos\office_writer\23-formatotabla.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '24.Ordenar datos.',
          'foto_video'  => 'img/writer/24.png',
          'video'       => 'videos\office_writer\24-ordenardatos.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '25.Plantillas.',
          'foto_video'  => 'img/writer/25.png',
          'video'       => 'videos\office_writer\25-plantillas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '26.Crear plantillas.',
          'foto_video'  => 'img/writer/26.png',
          'video'       => 'videos\office_writer\26-crearplantillas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '27.Encabezado y pie de página.',
          'foto_video'  => 'img/writer/27.png',
          'video'       => 'videos\office_writer\27-encabezadoypiedepagina.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '28.Administrar plantillas.',
          'foto_video'  => 'img/writer/28.png',
          'video'       => 'videos\office_writer\28-administrarplantillas.mp4',
          'id_programa' => '2'
        ]);
        DB::table('officewriters')->insert([
          'titulo'      => '29.Documento.',
          'foto_video'  => 'img/writer/29.png',
          'video'       => 'videos\office_writer\29-Documentocompleto.mp4',
          'id_programa' => '2'
        ]);
        ########################### ACA SE MANEJA LA PARTE DE OFFICE IMPRESS ########################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE IMPRESS########################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE IMPRESS#########################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE IMPRESS#########################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE IMPRESS#######################################################

        DB::table('officeimpresses')->insert([
          'titulo'      => '1.Introducción.',
          'foto_video'  => 'img/impress/1.png',
          'video'       => 'videos\office_impress/1-Introduccion.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '2.Interfaz',
          'foto_video'  => 'img/impress/2.png',
          'video'       => 'videos\office_impress\2-Interfaz.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '3.Diapositivas.',
          'foto_video'  => 'img/impress/3.png',
          'video'       => 'videos\office_impress\3-Diapositivas.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '4.Panel de tareas.',
          'foto_video'  => 'img/impress/4.png',
          'video'       => 'videos\office_impress\4-Panel_de_tareas.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '5.Zona de trabajo.',
          'foto_video'  => 'img/impress/5.png',
          'video'       => 'videos\office_impress\5-Zona_de_trabajo.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '6.Presentación.',
          'foto_video'  => 'img/impress/6.png',
          'video'       => 'videos\office_impress\6-Presentacion.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '7.Formato presentación.',
          'foto_video'  => 'img/impress/7.png',
          'video'       => 'videos\office_impress\7-Formato_presentacion.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '8.Movimiento.',
          'foto_video'  => 'img/impress/8.png',
          'video'       => 'videos\office_impress\8-Movimiento.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '9.Transiciones.',
          'foto_video'  => 'img/impress/9.png',
          'video'       => 'videos\office_impress\9-Transiciones.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '10.Animar presentaciones.',
          'foto_video'  => 'img/impress/10.png',
          'video'       => 'videos\office_impress\10-Animar_presentaciones.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '11.Diapositivas maestras.',
          'foto_video'  => 'img/impress11png',
          'video'       => 'videos\office_impress\11-Diapositivas_maestras.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '12.Estilos.',
          'foto_video'  => 'img/impress/12.png',
          'video'       => 'videos\office_impress\12-Estilos.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '13.Plantillas.',
          'foto_video'  => 'img/impress/13.png',
          'video'       => 'videos\office_impress\13-Plantillas.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '14.Administración de plantillas.',
          'foto_video'  => 'img/impress/14.png',
          'video'       => 'videos\office_impress\14-Administracion_de_plantillas.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '15.Trabajando con texto.',
          'foto_video'  => 'img/impress/15.png',
          'video'       => 'videos\office_impress\15-Trabajando_con_texto.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '16.Tablas.',
          'foto_video'  => 'img/impress/16.png',
          'video'       => 'videos\office_impress\16-Tablas.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '17.Imágenes.',
          'foto_video'  => 'img/impress/17.png',
          'video'       => 'videos\office_impress\17-Imagenes.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '18.Frontwork.',
          'foto_video'  => 'img/impress/18.png',
          'video'       => 'videos\office_impress\18-Frontwork.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '19.Hojas de cálculo.',
          'foto_video'  => 'img/impress/19.png',
          'video'       => 'videos\office_impress\19-Hojas_de_calculo.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '20.Gráficas.',
          'foto_video'  => 'img/impress/20.png',
          'video'       => 'videos\office_impress\20-Graficas.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '21.Exportación.',
          'foto_video'  => 'img/impress/21.png',
          'video'       => 'videos\office_impress\21-Exportacion.mp4',
          'id_programa' => '3'
        ]);
        DB::table('officeimpresses')->insert([
          'titulo'      => '22.Presentación.',
          'foto_video'  => 'img/impress/22.png',
          'video'       => 'videos\office_impress\22-Presentacion.mp4',
          'id_programa' => '3'
        ]);

        ########################### ACA SE MANEJA LA PARTE DE OFFICE BASE ########################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE BASE########################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE BASE#########################################################
        ########################### ###############################################################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE BASE#########################################################
        ########################### ###############################################################################################
        ########################### ACA SE MANEJA LA PARTE DE OFFICE BASE#######################################################

        DB::table('officebases')->insert([
          'titulo'      => '1.Introducción.',
          'foto_video'  => 'img/base/1.png',
          'video'       => 'videos\office_base/1-Introduccion.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '2.Interfaz',
          'foto_video'  => 'img/base/2.png',
          'video'       => 'videos\office_base\2-Interfaz.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '3.Tablas.',
          'foto_video'  => 'img/base/3.png',
          'video'       => 'videos\office_base\3-Tablas.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '4.Asistente de tablas.',
          'foto_video'  => 'img/base/4.png',
          'video'       => 'videos\office_base\4-Asistentedetablas.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '5.Copiar tablas.',
          'foto_video'  => 'img/base/5.png',
          'video'       => 'videos\office_base\5-Copiartablas.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '6.Registros.',
          'foto_video'  => 'img/base/6.png',
          'video'       => 'videos\office_base\6-Registros.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '7.Formularios.',
          'foto_video'  => 'img/base/7.png',
          'video'       => 'videos\office_base\7-Formularios.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '8.Formularios parte 2.',
          'foto_video'  => 'img/base/8.png',
          'video'       => 'videos\office_base\8-Formulariosparte2.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '9.Cosultas.',
          'foto_video'  => 'img/base/9.png',
          'video'       => 'videos\office_base\9-Cosultas.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '10.Informes.',
          'foto_video'  => 'img/base/10.png',
          'video'       => 'videos\office_base\10-Informes.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '11.Documentación.',
          'foto_video'  => 'img/base11png',
          'video'       => 'videos\office_base\11-Documentacion.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '12.Recursos.',
          'foto_video'  => 'img/base/12.png',
          'video'       => 'videos\office_base\12-Recursos.mp4',
          'id_programa' => '4'
        ]);
        DB::table('officebases')->insert([
          'titulo'      => '13.Personalización.',
          'foto_video'  => 'img/base/13.png',
          'video'       => 'videos\office_base\13-Personalizacion.mp4',
          'id_programa' => '4'
        ]);

#######################################################################################################################
#######################################################################################################################
#######################################################################################################################
#######################################################################################################################
#######################################################################################################################
#######################################################################################################################
#######################################################################################################################



        DB::table('calendars')->insert([
          'id_usuario'  => '1',
          'title'       => 'Prueba de calendar 1',
          'descripcion' => 'Estamos probando el Calendar!!!',
          'start'       => '2018-06-11 02:08:30',
          'end'         => '2018-06-12 02:08:30',
          'color'       => 'grey',
          'textcolor'  => 'white',
          'allDay'      => false
          ]);

          DB::table('calendars')->insert([
            'id_usuario'  => '1',
            'title'       => 'Prueba de calendar 2',
            'descripcion' => 'Estamos probando el Calendar 2!!!',
            'start'       => '2018-06-13 02:08:30',
            'end'         => '2018-06-14 02:08:30',
            'color'       => 'black',
            'textcolor'  => 'white',
            'allDay'      => false
            ]);

            DB::table('calendars')->insert([
              'id_usuario'  => '1',
              'title'       => 'Prueba de calendar 3',
              'descripcion' => 'Estamos probando el Calendar 3!!!',
              'start'       => '2018-06-15 02:08:30',
              'end'         => '2018-06-16 02:08:30',
              'color'       => 'blue',
              'textcolor'  => 'white',
              'allDay'      => false

              ]);

              DB::table('calendars')->insert([
                'id_usuario'  => '1',
                'title'       => 'Prueba de calendar 4',
                'descripcion' => 'Estamos probando el Calendar 4!!!',
                'start'       => '2018-06-17 02:08:30',
                'color'       => 'red',
                'textcolor'  => 'white',
                'allDay'      => true

                ]);

    }

}

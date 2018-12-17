<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\News::create([
            'titulo'        => '',
            'cuerpo'        => '<p>&nbsp; En el &aacute;rea de novedades se ir&aacute;n subiendo descripciones breves de las herramientas que ofrece Uitalk. En esta entrada conocer&aacute;s las funcionalidades del chat y el correo.</p>
            <p><br /><img src="../../storage/imgnovedades/gBkyzZcXEyfclwZiV8qxLmsKracIdhjrAwBm5zS6.png" alt="" width="218" height="99" /></p>
            <h1>&middot;<strong><span style="font-size: 14pt;">&iquest;C&Oacute;MO ACCEDER?</span></strong></h1>
            <p>&nbsp; &nbsp;Se puede ingresar &uacute;nicamente por el bot&oacute;n que est&aacute; ubicado en la barra superior.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">&iquest;CU&Aacute;LES SON SUS FUNCIONES?</span></strong></h1>
            <p>&nbsp; &nbsp;Esta herramienta es similar a cualquier otro servicio de mensajer&iacute;a instant&aacute;nea que utilizamos diariamente. Conoc&eacute; las caracter&iacute;sticas principales.</p>
            <ul>
            <li><em>Contactos y buscador</em></li>
            </ul>
            <p>&nbsp; &nbsp;En la barra lateral del chat hay un listado con todos los usuarios logueados al sistema de la empresa. Por encima, podr&aacute;s ver el v&iacute;nculo &ldquo;Buscar&hellip;&rdquo;, y al hacer click sobre &eacute;l te permitir&aacute; ingresar el nombre del usuario que desees comunicar.</p>
            <ul>
            <li><em>Estados</em></li>
            </ul>
            <p>&nbsp; &nbsp;En la parte superior de la barra lateral se puede ver el nombre y la imagen de usuario que est&aacute; logueado a Uitalk. Al hacer click sobre la foto se desplegar&aacute; un men&uacute; que ofrece cuatro opciones: disponible, ocupado, en reuni&oacute;n y desconectado. Pod&eacute;s elegir cualquiera de ellos para notificar tu estado a otros contactos.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">NOTIFICACIONES</span></strong></h1>
            <p>&nbsp; &nbsp;Cuando recibas mensajes de otros usuarios, sobre el &iacute;cono de la aplicaci&oacute;n se visualizar&aacute; un cuadro rojo en el que se contabilizar&aacute; los que est&aacute;n pendientes a ser le&iacute;dos. A su vez, en la barra lateral podr&aacute;s ver, junto a cada contacto, ver&aacute;s la cantidad de mensajes pendientes de cada uno de ellos.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">OBSERVACIONES</span></strong></h1>
            <p>&nbsp; &nbsp;Cada d&iacute;a, al ingresar al chat, el primer mensaje tendr&aacute; una breve demora en visualizarse dentro de la ventana de conversaci&oacute;n. Esto se debe a que, a diario, el sistema crea una carpeta para cada usuario en la que se registra su intercambio de mensajes. Una vez creada la carpeta, no se vuelve a alentar la carga de los mismos.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">&iquest;ALGUIEN PUEDE LEER MIS MENSAJES?</span></strong></h1>
            <p>&nbsp; &nbsp;Los mensajes del chat son confidenciales. Solo podr&aacute;n ser vistos por las dos partes que mantengan la conversaci&oacute;n. Cualquier filtraci&oacute;n o divulgaci&oacute;n puede ser detectada por el departamento de Sistemas y sancionada por las autoridades de la empresa.</p>
            <p><img src="../../storage/imgnovedades/t6dwjv9dP1z0ixhpvZgAF4SWIJ6FwalmjhJ9QKEg.png" alt="" width="238" height="75" /></p>
            <p><br />&nbsp; &nbsp;Otra de las aplicaciones que componen a Uitalk es la Agenda, un directorio de contactos que se ofrece en tres formatos diferentes.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">AGENDA INTERNA</span></strong></h1>
            <p>&nbsp; &nbsp;Es un registro de los contactos de la empresa, detallados por n&uacute;mero de interno, nombre y apellido, correo electr&oacute;nico y &aacute;rea. Posee un motor de b&uacute;squeda para hallar de forma r&aacute;pida los datos requeridos.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">AGENDA EXTERNA</span></strong></h1>
            <p>&nbsp; &nbsp;Muestra los contactos que le son propios a cada &aacute;rea, permitiendo agregar nuevos o editar los existentes. Esta agenda se ordena por nombre y apellido, correo, direcci&oacute;n, partido, localidad, provincia, tel&eacute;fono de l&iacute;nea, interno y n&uacute;mero de celular. Tambi&eacute;n cuenta con buscador de contactos con cuatro opciones: nombre y apellido, correo electr&oacute;nico, localidad y direcci&oacute;n.</p>
            <h1>&middot;<strong><span style="font-size: 14pt;">AGENDA PERSONALIZADA</span></strong></h1>
            <p>&nbsp; &nbsp;La &uacute;ltima de las tres agendas que dispone cada usuario le permite confeccionarla a medida. Al seleccionar la opci&oacute;n &ldquo;Crear agenda&rdquo;, podr&aacute;s crear un directorio personalizado de contactos. A esta agenda se le pueden importar datos de la agenda externa. Esta &uacute;ltima opci&oacute;n es ideal para hacer una agenda en la que se detallan los contactos m&aacute;s frecuentes, tanto de la agenda interna y externa, como de aquellos que no pertenecen a las dos opciones anteriores pero son de uso recurrente.</p>',
            'atajo'         =>  'Odontopraxis Americana te da la bienvenida al nuevo sistema de trabajo colaborativo online. Esta plataforma ofrece una variedad de aplicaciones que te permitirán agilizar y organizar tus tareas de manera eficiente.',
            'foto'          => 'imagen1.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
        App\News::create([
            'titulo'        => '',
            'cuerpo'        => '<p>&nbsp; &nbsp;<strong>Uitalk est&aacute; dise&ntilde;ado para ofrecer soluciones r&aacute;pidas y sencillas. Por eso queremos recordarle a nuestros usuarios que cuentan con una galer&iacute;a de videos e im&aacute;genes tutoriales para aprender y consultar, paso a paso, c&oacute;mo realizar las acciones esenciales de cada aplicaci&oacute;n.</strong></p>
            <p><img src="../../storage/imgnovedades/64CgSPYUS9kc2M24cgHvtZ46SzDldCtDBMjFs6Cn.png" alt="" width="462" height="99" /></p>
            <h3><br />&iquest;DONDE SE ENCUENTRAN LOS VIDEOS TUTORIALES?</h3>
            <p>&nbsp; &nbsp;<strong>En la barra lateral encontraremos el bot&oacute;n Herramientas, y en el men&uacute; desplegable debemos seleccionar la opci&oacute;n &ldquo;Tutoriales&rdquo;. A la derecha podremos visualizar una serie de &iacute;conos con los programas que se utilizan diariamente para llevar a cabo las tareas. Se podr&aacute; optar entre Excel, Word, correo electr&oacute;nico, OneDrive, Calc, Writer, Base e Impress.</strong></p>
            <p><strong>&nbsp;<a href="../../storage/imgnovedades/P9b2O3KN8KIdlOwwgrraVf06b5OEG3EuXJfdqf4L.png" target="_blank" rel="noopener"><img src="../../storage/imgnovedades/P9b2O3KN8KIdlOwwgrraVf06b5OEG3EuXJfdqf4L.png" alt="" width="1059" height="504" /></a></strong></p>
            <h3>&iquest;C&Oacute;MO SE PUEDEN VER Y BUSCAR LOS TUTORIALES?&nbsp; &nbsp;</h3>
            <p>&nbsp; &nbsp;<strong>Al elegir el programa por el cual queremos realizar una consulta, si seleccionamos cualquiera de los programas de Microsoft se abrir&aacute; un reproductor de video multimedia en el cual podremos ver un listado de videos a disposici&oacute;n, los cuales est&aacute;n titulados con el tipo de acci&oacute;n que ense&ntilde;a a realizar. Para evitar hacer b&uacute;squedas por desplazamiento o <em>scrolling</em>, arriba de dicho listado hay un buscador que permite buscar el video por palabras clave o nombre del tutorial.</strong></p>
            <p><strong>&nbsp;<a href="../../storage/imgnovedades/ssX3qZbyozpxUTBRwp0t889M7vaOiMPSyrk431n5.png" target="_blank" rel="noopener"><img src="../../storage/imgnovedades/ssX3qZbyozpxUTBRwp0t889M7vaOiMPSyrk431n5.png" alt="" width="1056" height="503" /></a></strong></p>
            <p>&nbsp; <strong>&nbsp;En caso de que consultemos los tutoriales del correo electr&oacute;nico, se ver&aacute; parte de las acciones b&aacute;sicas en una galer&iacute;a posicionada a la izquierda que despliega capturas de pantalla que nos muestran como realizar las acciones en unos pocos pasos.</strong></p>
            <p><a href="../../storage/imgnovedades/usi85ZUSJLzOYyzT3nBqjOioo3u0HOCWHRhDuVk5.png" target="_blank" rel="noopener"><img src="../../storage/imgnovedades/usi85ZUSJLzOYyzT3nBqjOioo3u0HOCWHRhDuVk5.png" alt="" width="1059" height="498" /></a></p>',
            'atajo'         =>  'Pensamos en la experiencia de nuestros usuarios. Por eso ponemos a disposición una amplia galería de videos tutoriales para que puedan consultar como realizar una variedad de acciones dentro de los programas disponibles.',
            'foto'          => 'imagen2.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
        App\News::create([
            'titulo'        => '',
            'cuerpo'        => '<p>&nbsp; &nbsp; <span style="font-size: 12pt;">Tal como se coment&oacute; a todo el personal en la capacitaci&oacute;n sobre el uso de Uitalk, el sistema trabaja con la nube de Microsoft. Por lo que es importante que todos los archivos relevantes de cada usuario sean transferidos y cargados a su carpeta en la nube de OneDrive.</span></p>
            <p><span style="font-size: 12pt;">&nbsp; &nbsp; Cada &aacute;rea tiene una carpeta administradora y, dentro de la misma, cada usuario tiene su carpeta personal en la que puede crear su directorio de archivos, pudi&eacute;ndolos clasificr seg&uacute;n su preferencia y comodidad.</span></p>
            <p><span style="font-size: 12pt;">&nbsp; &nbsp; Se puede acceder a esta carpeta personal dirigi&eacute;ndose al bot&oacute;n de &ldquo;Mis Archivos&rdquo;, en la barra lateral. Al <span style="text-decoration: underline;"><em>hacer click</em></span> redireccionar&aacute; autom&aacute;ticamente a la nube que cada usuario posee.</span></p>
            <p><span style="font-size: 12pt;">&nbsp; &nbsp; Si tiene alguna duda de c&oacute;mo se utiliza OneDrive, puede hacer click aqu&iacute; para dirigirse a los videos tutoriales de esta herramienta.</span></p>
            <p><span style="font-size: 12pt;"><strong>&iquest;POR QU&Eacute; DEBEMOS EMIGRAR LOS ARCHIVOS A LA NUBE?</strong></span></p>
            <p><span style="font-size: 12pt;">&nbsp; &nbsp; Hay dos razones por las que debemos acostumbrarnos a trabajar en OneDrive.</span></p>
            <ul>
            <li><span style="font-size: 12pt;"><em>GUARDADO</em></span></li>
            </ul>
            <p><span style="font-size: 12pt;">&nbsp; &nbsp; La primera de ellas es poder contar con un back up de mayor seguridad. Todos los archivos que se alojan en la nube tienen un guardado de hasta noventa d&iacute;as despu&eacute;s de haber sido eliminados. Adem&aacute;s, los archivos que se crean y editan en los programas de OneDrive (Excel, Word, etc.) tienen autoguardado autom&aacute;tico, lo cual nos da el respaldo de no perder informaci&oacute;n.</span></p>
            <p><span style="font-size: 12pt;"><strong>Nota: </strong>Respecto a esto &uacute;ltimo, cuando se quiera utilizar un documento como base para crear uno nuevo y diferente sin alterar el original, se debe crear un nuevo documento al cual se copie la informaci&oacute;n del original, para editar sin que el autoguardado signifique un inconveniente.</span></p>
            <ul>
            <li><span style="font-size: 12pt;"><em>MANTENIMIENTO</em></span></li>
            </ul>
            <p><span style="font-size: 12pt;">&nbsp; &nbsp; Para que las computadoras puedan funcionar mejor y se realice un mantenimiento m&aacute;s exhaustivo, se har&aacute; una limpieza del disco r&iacute;gido de cada equipo para lograr un funcionamiento &oacute;ptimo.</span></p>',
            'atajo'         =>  'Ahora tus archivos estarán más seguros. Uitalk trabaja sincronizándolos a la nube, por lo que es importante realizar un back up de todos tus documentos que consideres relevantes.',
            'foto'          => 'imagen3.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
        App\News::create([
            'titulo'        => '',
            'cuerpo'        => '<p><span style="font-size: 18pt;">Curabitur iaculis eu ex eget interdum. Ut commodo pulvinar mi quis gravida. Etiam imperdiet vel enim sed finibus. Vivamus nec dui in mauris sollicitudin blandit id nec lacus. Praesent urna ligula, consequat condimentum diam hendrerit, ornare vestibulum enim. In gravida vulputate ante, ut tempor dolor varius ut. Etiam pretium tortor ac orci suscipit, eu ornare orci aliquam. Donec ac odio ac libero sollicitudin pretium non ac lorem. Aliquam id nibh rutrum, semper eros vitae, posuere nisi. Nam mollis condimentum libero, nec tincidunt sem volutpat ut. Nulla maximus euismod porttitor. Sed augue tortor, facilisis ac turpis vel, facilisis vulputate nulla. Donec venenatis sapien eget tellus molestie, nec tempor erat malesuada. Aliquam vestibulum enim quis justo mattis, eget feugiat dui dictum. Vestibulum eleifend ex eu dignissim dapibus. Nunc id varius sem, eget gravida nunc. Vestibulum auctor fermentum elementum. Vestibulum sit amet nisi vel turpis fermentum egestas. Curabitur semper nulla ac lacus lobortis, dictum ultricies lectus egestas. Praesent efficitur consectetur augue ac facilisis. Sed sodales sem sed velit sollicitudin vulputate.</span></p>',
            'atajo'         =>  '¡Más fácil y más rápido! Uitalk ofrece un apartado para gestionar los pedidos de licencias y solicitudes para casos excepcionales. Ingresá para saber cómo realizar cada una de las gestiones y consultarlas en el historial de registro.',
            'foto'          => 'imagen4.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
       
    }
}

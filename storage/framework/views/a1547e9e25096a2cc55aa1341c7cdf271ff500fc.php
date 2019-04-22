<ul class="nav">
    <ul class="collapsible" style="background-color: transparent; color:grey;">

    <li onclick="location.href='<?php echo e(route('dashboard')); ?>'">
        <div class="collapsible-header">
            <img src="<?php echo e(asset('img/faviconuitalk.png')); ?>" class="logo_mini">
            <img src="<?php echo e(asset('images/Recurso1.png')); ?>" class="logo_completo">
        </div>

      </li>

      <li onclick="location.href='<?php echo e(route('correo.index')); ?>'">
        <div class="collapsible-header">
            <img src="<?php echo e(asset('images/correo-atajo.png')); ?>" class="correo-icon">
          <p>Correo</p>
        </div>

      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">build</i> <p>Herramientas</p> </div>
        <div class="collapsible-body">
          <span><a href="<?php echo e(route('tutos.index')); ?>" class="grey-text text-darken-2">Tutoriales</a></span><hr>
          <span><a href="https://office.live.com/start/Excel.aspx?ui=es-ES&rs=ES#" class="grey-text text-darken-2" target="_blank">Excel</a></span><hr>
          <span><a href="https://office.live.com/start/Word.aspx?ui=es-ES&rs=ES&auth=1&nf=1" class="grey-text text-darken-2" target="_blank">Word</a></span>
          
          
        </div>

      </li>
      <?php if(Auth::user()->puesto != 'Call-center'): ?>
      <li>
          <div class="collapsible-header"><i class="material-icons">folder_open</i> <p>Mis Archivos</p> </div>
          <div class="collapsible-body">
            <span><a href="<?php echo e(Auth::user()->onedrivecompartido); ?>" target="_blank" class="grey-text text-darken-2">Compartido</a></span><hr>
            <span><a href="<?php echo e(Auth::user()->onedrivepersonal); ?>" target="_blank" class="grey-text text-darken-2">Mi carpeta</a></span>
          </div>
      </li>
      <?php endif; ?>
      <li onclick="location.href='<?php echo e(route('calendar.index')); ?>'">
        <div class="collapsible-header"><i class="far fa-calendar-alt" style="color: #a9afbb; margin-right: 19px; font-size: 24px; margin-left: 4px; margin-top: 2px"></i>
        <p>Calendario</p></div>

      </li>
      <li onclick="location.href='<?php echo e(route('directorio.index')); ?>'">
        <div class="collapsible-header">
            <img src="<?php echo e(asset('images/agenda_icon.png')); ?>" class="agenda-icon">
        <p>Agenda</p></div>
      </li>

      <li>
            <div class="collapsible-header"><i class="material-icons text-gray">insert_drive_file</i> <p>Gestiones</p> </div>
            <div class="collapsible-body">
              <span><a href="<?php echo e(url('tickets')); ?>" class="grey-text text-darken-2">Tickets</a></span><hr>
              <span><a href="<?php echo e(url('registroticket')); ?>" class="grey-text text-darken-2">Registro de tickets</a></span><hr>
            <?php if(1 != Auth::user()->tipo_rol): ?>
              <span><a href="<?php echo e(route('autorizaciones.create')); ?>" class="grey-text text-darken-2">Licencias</a></span><hr>
            <?php endif; ?>
              <span><a href="<?php echo e(route('autorizaciones.index')); ?>" class="grey-text text-darken-2">Registro de licencias</a></span>
            </div>

          </li>

      <li onclick="location.href='<?php echo e(route('dashboard')); ?>'">
        <div class="collapsible-header"><i class="fas fa-bullhorn" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
        <p>Novedades</p></div>

      </li>
      <?php if(Auth::user()->rol_usuario == 5 && Auth::user()->tipo_rol == 2|| 'aplehm' == Auth::user()->username || 'ipicoy' == Auth::user()->username || 'ppalermo' == Auth::user()->username): ?>
      <li onclick="location.href='<?php echo e(route('rrhh.index')); ?>'">
        <div class="collapsible-header">
              <i class="material-icons text-gray">people</i>
              <p>Recursos Humanos</p>
        </div>
      </li>
      <?php endif; ?>
      <?php if(Auth::user()->rol_usuario == 11): ?>
      <li onclick="location.href='<?php echo e(route('presidencia.index')); ?>'">
        <div class="collapsible-header">
              <i class="material-icons text-gray">people</i>
              <p>Presidencia</p>
        </div>
      </li>
      <?php endif; ?>
      <li onclick="location.href='<?php echo e(route('configuracion')); ?>'">
        <div class="collapsible-header"><i class="material-icons text-gray">lock</i>
        <p>Seguridad</p></div>

      </li>
      <?php if(Auth::user()->rol_usuario == 12 || Auth::user()->rol_usuario == 3 &&  Auth::user()->username != 'udemo' || Auth::user()->rol_usuario == 5): ?>
        <li onclick="location.href='<?php echo e(route('noticia.index')); ?>'">
            <div class="collapsible-header"><i class="material-icons text-gray">file_upload</i>
            <p>Entradas</p></div>

          </li>
      <?php endif; ?>
      

        <?php if('aplehm' == Auth::user()->username || 'ipicoy' == Auth::user()->username || 'ppalermo' == Auth::user()->username): ?>
        
        <li onclick="location.href='<?php echo e(url('/sistemas')); ?>'">
          <div class="collapsible-header"><i class="fab fa-suse" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
          <p>Sistemas</p></div>
        </li>

        <?php endif; ?>
        
    </ul>
</ul>
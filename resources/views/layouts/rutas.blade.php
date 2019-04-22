<ul class="nav">
    <ul class="collapsible" style="background-color: transparent; color:grey;">

    <li onclick="location.href='{{ route('dashboard') }}'">
        <div class="collapsible-header">
            <img src="{{ asset('img/faviconuitalk.png') }}" class="logo_mini">
            <img src="{{ asset('images/Recurso1.png') }}" class="logo_completo">
        </div>

      </li>

      <li onclick="location.href='{{ route('correo.index') }}'">
        <div class="collapsible-header">
            <img src="{{ asset('images/correo-atajo.png') }}" class="correo-icon">
          <p>Correo</p>
        </div>

      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">build</i> <p>Herramientas</p> </div>
        <div class="collapsible-body">
          <span><a href="{{ route('tutos.index') }}" class="grey-text text-darken-2">Tutoriales</a></span><hr>
          <span><a href="https://office.live.com/start/Excel.aspx?ui=es-ES&rs=ES#" class="grey-text text-darken-2" target="_blank">Excel</a></span><hr>
          <span><a href="https://office.live.com/start/Word.aspx?ui=es-ES&rs=ES&auth=1&nf=1" class="grey-text text-darken-2" target="_blank">Word</a></span>
          {{-- <span><a href="{{ route('organigrama.index') }}" class="grey-text text-darken-2">Organigrama corporativo</a></span><hr> --}}
          {{-- <span><a href="{{ route('plantillas.index') }}" class="grey-text text-darken-2">Plantillas</a></span> --}}
        </div>

      </li>
      @if (Auth::user()->puesto != 'Call-center')
      <li>
          <div class="collapsible-header"><i class="material-icons">folder_open</i> <p>Mis Archivos</p> </div>
          <div class="collapsible-body">
            <span><a href="{{ Auth::user()->onedrivecompartido }}" target="_blank" class="grey-text text-darken-2">Compartido</a></span><hr>
            <span><a href="{{ Auth::user()->onedrivepersonal }}" target="_blank" class="grey-text text-darken-2">Mi carpeta</a></span>
          </div>
      </li>
      @endif
      <li onclick="location.href='{{ route('calendar.index') }}'">
        <div class="collapsible-header"><i class="far fa-calendar-alt" style="color: #a9afbb; margin-right: 19px; font-size: 24px; margin-left: 4px; margin-top: 2px"></i>
        <p>Calendario</p></div>

      </li>
      <li onclick="location.href='{{ route('directorio.index') }}'">
        <div class="collapsible-header">
            <img src="{{ asset('images/agenda_icon.png') }}" class="agenda-icon">
        <p>Agenda</p></div>
      </li>

      <li>
            <div class="collapsible-header"><i class="material-icons text-gray">insert_drive_file</i> <p>Gestiones</p> </div>
            <div class="collapsible-body">
              <span><a href="{{ url('tickets') }}" class="grey-text text-darken-2">Tickets</a></span><hr>
              <span><a href="{{ url('registroticket') }}" class="grey-text text-darken-2">Registro de tickets</a></span><hr>
            @if(1 != Auth::user()->tipo_rol)
              <span><a href="{{ route('autorizaciones.create') }}" class="grey-text text-darken-2">Licencias</a></span><hr>
            @endif
              <span><a href="{{ route('autorizaciones.index') }}" class="grey-text text-darken-2">Registro de licencias</a></span>
            </div>

          </li>

      <li onclick="location.href='{{ route('dashboard') }}'">
        <div class="collapsible-header"><i class="fas fa-bullhorn" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
        <p>Novedades</p></div>

      </li>
      @if(Auth::user()->rol_usuario == 5 && Auth::user()->tipo_rol == 2|| 'aplehm' == Auth::user()->username || 'ipicoy' == Auth::user()->username || 'ppalermo' == Auth::user()->username)
      <li onclick="location.href='{{ route('rrhh.index') }}'">
        <div class="collapsible-header">
              <i class="material-icons text-gray">people</i>
              <p>Recursos Humanos</p>
        </div>
      </li>
      @endif
      @if(Auth::user()->rol_usuario == 11)
      <li onclick="location.href='{{ route('presidencia.index') }}'">
        <div class="collapsible-header">
              <i class="material-icons text-gray">people</i>
              <p>Presidencia</p>
        </div>
      </li>
      @endif
      <li onclick="location.href='{{ route('configuracion') }}'">
        <div class="collapsible-header"><i class="material-icons text-gray">lock</i>
        <p>Seguridad</p></div>

      </li>
      @if(Auth::user()->rol_usuario == 12 || Auth::user()->rol_usuario == 3 &&  Auth::user()->username != 'udemo' || Auth::user()->rol_usuario == 5)
        <li onclick="location.href='{{ route('noticia.index') }}'">
            <div class="collapsible-header"><i class="material-icons text-gray">file_upload</i>
            <p>Entradas</p></div>

          </li>
      @endif
      {{-- <li>
            <div class="collapsible-header"><i class="fas fa-door-open" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
                <p>Accesos</p></div>
            <div class="collapsible-body">
              <span><a href="http://192.168.0.8:8080/PREPAGA" target="_blank" class="grey-text text-darken-2">ThinkSoft</a></span><hr>

        
            </div>

          </li> --}}

        @if('aplehm' == Auth::user()->username || 'ipicoy' == Auth::user()->username || 'ppalermo' == Auth::user()->username)
        
        <li onclick="location.href='{{ url('/sistemas') }}'">
          <div class="collapsible-header"><i class="fab fa-suse" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
          <p>Sistemas</p></div>
        </li>

        @endif
        {{-- @if('aplehm' == Auth::user()->username)
        <li onclick="location.href='{{ url('video') }}'">
          <div class="collapsible-header"><i class="fab fa-suse" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
          <p>videos</p></div>
        </li>
        @endif --}}
    </ul>
</ul>
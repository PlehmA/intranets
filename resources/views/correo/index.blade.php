@extends('correo.app')
@section('content')
    <div class="container-font">
        <div class="row">

            <div class="col-md-12">
                <table class="table">
                <tr style="height: 50px">
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn"><input type="checkbox" value=""></button>
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5rem;">
                                 <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                            <button class="btn" style="margin-left: 5px; font-size: 1.5rem;"><i class="fas fa-sync-alt"></i></button>
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 5px; font-size: 1.5rem;">
                                Mas  &nbsp;<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                    </td>
                    <td>
                        <div class="text-right">
                            <b>1-100 de 100</b>
                        </div>
                    </td>
                    <td>
                        <div class="move-left">
                            <nav aria-label="Page navigation">
                                <ul class="pager">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </td>
                </tr>
                </table>
            </div>

        </div> <!--div con clase row-->
        <div class="col-lg-1 pull-left float-left position-fixed menu-izq">
            <nav>
            <ul class="nav nav-stacked col-lg-12 pull-left">
                <a href="" class="btn btn-danger btn-sm">
                    Redactar
                </a>
                <li>
                    <a href="">
                        hostings
                    </a>
                </li>
                <li>
                    <a href="">
                        [Imap]/Trash
                    </a>
                </li>
                <li>
                    <a href="">
                        [Imap]/Sent
                    </a>
                </li>
                <li>
                    <a href="">
                        programacion
                    </a>
                </li>
                <li>
                    <a href="">
                        IMPORTANT
                    </a>
                </li>
                <li>
                    <a href="">
                        Viaje
                    </a>
                </li>
                <li>
                    <a href="">
                        Trabajo
                    </a>
                </li>
                <li>
                    <a href="">
                        Inbox
                    </a>
                </li>
                <li>
                    <a href="">
                        Spam
                    </a>
                </li>
            </ul>
            </nav>
        </div>
        <div class="col-md-10">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Nunc tincidunt</a></li>
                    <li><a href="#tabs-2">Proin dolor</a></li>
                    <li><a href="#tabs-3">Aenean lacinia</a></li>
                </ul>
                <div id="tabs-1">
                    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                </div>
                <div id="tabs-2">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                </div>
                <div id="tabs-3">
                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                </div>
            </div>

            <table class="table">
                <tr>
                    <th width="10%">Nombre</th>
                    <th width="80%">Asunto</th>
                    <th width="10%">Hora</th>
                </tr>
            </table>
            </div>
    </div>

@endsection
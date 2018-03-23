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
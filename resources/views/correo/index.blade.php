@extends('layouts.app')
@section('content')
    <div class="container-fluid container-font">
        <div class="row">
            <div class="col-lg-1">
                <b>1-100 de 100</b>
            </div>
            <div class="pull-right">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous" class="btn btn-sm btn-default">
                                <span aria-hidden="true" style="font-size: 2rem;">&laquo;</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" aria-label="Next" class="btn btn-sm btn-default">
                                <span aria-hidden="true" style="font-size: 2rem;">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
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
@extends('tutos.app')
@section('content')
<div class="col-sm-6">
  <ul class="collection">
    <a href="#">
      <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0;">
        <img src="{{ asset('img/LibreOffice_Writer.png') }}" alt="" class="circle">
        <span class="title">Tutoriales de Libre Office writer</span>
        <p>Material para el uso adecuado de Libre Office writer</p>
      </li>
    </a>
<a href="#">
  <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0;">
    <img src="{{ asset('img/libreoffice_calc.png') }}" alt="" class="circle">
    <span class="title">Tutoriales de Libre Office calc</span>
    <p>Material para el uso adecuado de Libre Office calc</p>
  </li>
</a>
<a href="#">
  <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0;">
    <img src="{{ asset('img/LibreOffice_Impress.svg') }}" alt="" class="circle">
    <span class="title">Tutoriales de Libre Office impress</span>
    <p>Material para el uso adecuado de Libre Office impress</p>
  </li>
</a>
<a href="#">
  <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0;">
    <img src="{{ asset('img/LibreOffice_Base.svg') }}" alt="" class="circle">
    <span class="title">Tutoriales de Libre Office base</span>
    <p>Material para el uso adecuado de Libre Office base</p>
  </li>
</a>
  </ul>
</div>
@endsection

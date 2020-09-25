@extends('layouts.app')

@section('content')

    <div id="myDiv"></div>

    <!--  Categorias -->
    @include('player.partials.categories') 

    <!--  Playlist -->
    @include('player.partials.playlist') 

@endsection
{{-- layout.app es donde esta los encabezados html y demas plugins js y css--}}
@extends('layouts.app')

{{-- lo que esta en section('content') lo ubica en layout.app en la etiqueta @yield('content')--}}
@section('content')
    <div class="row" style="margin-top: 100px">
        <div class="col-md-4 offset-md-4">
            <div id='login' class="panel panel-default border-top border-bottom border-light rounded" style="margin: 10px; padding:30px">
                <div class="panel-heading">
                    <h2 class="panel-title">Login</h2>
                </div>
                <div class="panel-body">
                    <!-- Formulario de Login -->
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input class="form-control" 
                                    type="email" 
                                    name="email" 
                                    placeholder="Ingresar Usuario">
                            {{-- $error muestra msj bajo input de form login segun validacion en metodo login --}}
                            {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">Password</label>
                            <input class="form-control" 
                                    type="password" 
                                    name="password" 
                                    placeholder="Ingresar Password">
                            {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Acceder</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
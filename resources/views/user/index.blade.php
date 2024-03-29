@extends('master')

@section('titulo')
    Login
@stop

@section('cuerpo')
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black bg-light">

                    <div class="px-5 ms-xl-4 ">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0"><img src="/img/logo1.png" alt="Logo"></span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        {{ Form::open(['route' => 'User_login', 'method' => 'post']) }}
                            <div style="width: 23rem;">

                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inciar Sesión</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" id="usuario" class="form-control form-control-lg" name="usuario"/>
                                    <label class="form-label" for="usuario">Usuario</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="contraseña" class="form-control form-control-lg" name="contraseña"/>
                                    <label class="form-label" for="contraseña">Contraseña</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                                </div>
                                @if (session('Fallo'))
                                    <div class="mb-3 mt-3 alert alert-success alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        {{ session('Fallo') }}
                                    </div>    
                                @endif
                            </div>
                        {{ Form::close() }}
                        

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="/img/foto.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
@stop
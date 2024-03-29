@extends('master')

@section('titulo')
    Usuarios
@stop

@section('estilos')
    <link rel="stylesheet" href="/css/ver.css">
    <link rel="stylesheet" href="/datatables/datatables.min.css">
    <link rel="stylesheet" href="/datatables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('cuerpo')
    @parent
    @auth
        @if (Auth::user() -> tipo != "admin")
            <?php route('principal') ?>
        @else
            <div class="tabla">
                <div class="container">
                    <h1>Lista de Usuarios</h1>
                    <?php $i = 0; ?>
                    <table class="table table-dark table-striped table-hover" id="example">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Usuario</th>
                                <th>Activo</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user -> id != Auth::user() -> id)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user -> apellido_paterno . ' ' . $user -> apellido_materno }}</td>
                                        <td>{{ $user -> nombres }}</td>
                                        <td>{{ $user -> usuario }}</td>
                                        <td>
                                            @switch($user -> activo)
                                                @case("S")
                                                    Si
                                                    @break
                                                @case("N")
                                                    No
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="{{ route('user_mos_user', ['id' => $user -> id]) }}">Mostrar</a> |
                                            <a href="{{ route('user_edi_user', ['id' => $user -> id]) }}">Editar</a> |
                                            <a href="{{ route('user_eli_user', ['id' => $user -> id]) }}">Eliminar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="/js/jquery-3.7.0.min.js"></script>
            <script src="/datatables/datatables.min.js"></script>
            <script src="/js/tablas.js"></script>
        @endif
    @endauth
@stop
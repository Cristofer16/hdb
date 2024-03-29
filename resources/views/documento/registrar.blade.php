@extends('master')

@section('titulo')
    Registrar Documento
@stop

@section('estilos')
    <link rel="stylesheet" href="/css/registrar.css">
@stop

@section('cuerpo')
    @parent
    <div class="formulario">
        <div class="container">
            <h1>
                Registra Documento - 
                @switch($datos['tipo'])
                    @case("bajamedica")
                        Baja Medica
                        @break
                    @case("declaracionjurada")
                        Declaracion Jurada
                        @break
                    @case("memorando")
                        Momorandum
                        @break
                    @case("curriculum")
                        Curriculum
                        @break
                    @case("servicio")
                        Años de Servicio
                        @break
                    @case("vacacion")
                        Vacaciones
                        @break
                @endswitch
            </h1>
            {{ Form::open(['route' => 'documento_validar_registro', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <div class="mb-3 mt-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Introduza el nombre del documento" name="nombre" required>
                </div>
                <input name="tipo" type="hidden" value="{{ $datos['tipo'] }}">
                <div class="mb-3">
                    <label for="archivero" class="form-label">Archivero:</label>
                    <div class="mb-3">
                        <select class="form-select" id="archivero" name="archivero">
                            <option value="doctor">Doctores</option>
                            <option value="enfermera">Enfermeras</option>
                            <option value="administrativo">Administrativos</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cajon" class="form-label">Cajon:</label>
                    <input type="text" class="form-control" id="cajon" placeholder="Introduza la letra del cajon" name="cajon" required>
                </div>
                <div class="custom-file mb-3">
                    <label class="form-label" for="pdf">Seleccionar Archivo</label>
                    <input type="file" class="form-control" id="pdf" lang="es" name="pdf" required>
                </div>
                <input name="personal_id" type="hidden" value="{{ $datos['personal_id'] }}">
                <input name="nom_completo" type="hidden" value="{{ $datos['nom_completo'] }}">
                @switch($datos['tipo'])
                    @case("bajamedica")
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_fin" class="form-label">Fecha de Finalización:</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                        </div>
                        @break
                    @case("declaracionjurada")
                        <div class="mb-3">
                            <label for="gestion" class="form-label">Gestion:</label>
                            <input type="date" class="form-control" id="gestion" name="gestion" required>
                        </div>
                        @break
                    @case("memorando")
                        <div class="mb-3">
                            <label for="numero_memorando" class="form-label">Número de Memorando:</label>
                            <input type="text" class="form-control" id="numero_memorando" placeholder="Introduza el número del memorando" name="numero_memorando" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_memo" class="form-label">Tipo de Memorando:</label>
                            <input type="text" class="form-control" id="tipo_memo" placeholder="Introduza el tipo de memorando" name="tipo_memo" required>
                        </div>
                        @break
                    @case("curriculum")
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad:</label>
                            <input type="text" class="form-control" id="especialidad" placeholder="Introduza su especialidad" name="especialidad">
                        </div>
                        <div class="mb-3">
                            <label for="titulo_mayor" class="form-label">Titulo de Mayor Grado:</label>
                            <input type="text" class="form-control" id="titulo_mayor" placeholder="Introduza su grado mayor" name="titulo_mayor" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_documentos" class="form-label">Cantidad de Documentos Presentados:</label>
                            <input type="number" class="form-control" id="cantidad_documentos" placeholder="Introduza la cantida de los documentos" name="cantidad_documentos" required>
                        </div>
                        @break
                    @case("servicio")
                        <div class="mb-3">
                            <label for="fecha_emitida" class="form-label">Fecha Emitida del Documento:</label>
                            <input type="date" class="form-control" id="fecha_emitida" name="fecha_emitida" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_años" class="form-label">Años de Servicio:</label>
                            <input type="number" class="form-control" id="cantidad_años" placeholder="Introduza los años de servicio" name="cantidad_años" required>
                        </div>
                        @break
                    @case("vacacion")
                        <div class="mb-3">
                            <label for="tipo_vacacion" class="form-label">Tipo de Vacación:</label>
                            <input type="text" class="form-control" id="tipo_vacacion" placeholder="Introduza el tipo de vacación" name="tipo_vacacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_dias" class="form-label">Cantidad de Días:</label>
                            <input type="number" class="form-control" id="cantidad_dias" placeholder="Introduza la cantidad de días" name="cantidad_dias" required>
                        </div>
                        @break
                @endswitch
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-dark col-2" >Registar</button>
                    <button type="reset" class="btn btn-dark col-2">Borrar</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
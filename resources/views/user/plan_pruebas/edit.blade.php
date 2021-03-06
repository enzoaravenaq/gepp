@extends('layouts.app')

@section('navbar_content')
    <li class="nav-item">
        <a class="nav-link" href="{{route('index')}}">{{ __('Planes de Prueba') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">{{ __('Historial de Pruebas') }}</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <div class="row">
                    <div class="col"><h2>{{ __('Editar Plan de Pruebas') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <form action={{ route('actualizar_plan_prueba', $id) }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mx-sm-3 row">
                        <label for="test_group" class="col-sm-2 col-form-label">Grupo de Trabajo:</label>
                        <div class="col-sm-10">
                            <input id="test_group" name="test_group" type="text" class="form-control" placeholder="Ej: Grupo 1, Grupo 2, ..."
                                   value="{{$plan_a_editar->grupo_proy}}">
                        </div>

                        @error('test_group')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="project_name" class="col-sm-2 col-form-label">Nombre del proyecto:</label>
                        <div class="col-sm-10">
                            <input id="project_name" name="project_name" type="text" class="form-control" placeholder="Ej: Gepp, Facebook, Uber, ..."
                                   value="{{$plan_a_editar->nombre_proyecto}}">
                        </div>

                        @error('project_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="project_access" class="col-sm-2 col-form-label">Forma de Acceso al Sistema:</label>
                        <div class="col-sm-10">
                            <input id="project_access" name="project_access" type="text" class="form-control" placeholder="Ej: URL o Implementación Local"
                                   value="{{$plan_a_editar->acceso_sistema}}">
                        </div>

                        @error('project_access')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="project_info" class="col-sm-2 col-form-label">Datos Generales:</label>
                        <div class="col-sm-10">
                            <textarea maxlength="500" class="form-control" id="project_info" name="project_info" rows="3" placeholder="Ej: Información de acceso al sistema, credenciales, etc">{{$plan_a_editar->datos_generales}}</textarea>
                        </div>

                        @error('project_info')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="project_icon" class="col-sm-2 col-form-label">Logo del proyecto:</label>
                        <div class="col-sm-3 ">
                            <input id="project_icon" name="project_icon" type="file" class="form-control-sm" placeholder="Ej: Información de acceso al sistema, credenciales, etc">
                        </div>

                        @error('project_icon')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <div class="col-12">
                            <button id="btn_submit" class="btn btn-primary" type="submit"> <i class="fas fa-save"></i> {{ __('Guardar') }}</button>
                            <a class="btn btn-danger" href="{{ route('ver_plan_prueba', $id) }}" role="button"> <i class="fas fa-times"></i> {{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('navbar_content')
    <li class="nav-item" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml"
        xmlns:v-on="http://www.w3.org/1999/xhtml">
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
                    <div class="col"><h2>{{ __('Nuevo Caso de Prueba') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-warning alert-dismissible fade show text-left" role="alert">
                    Los campos marcados con <span style="color: #ed1b24">*</span> son obligatorios.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action={{ route('guardar_caso_prueba', $id) }} method="POST" >
                    @csrf
                    <div class="form-group mx-sm-3 row">
                        <div class="input-group col-sm-10">
                            <label for="level_id" class="col-sm-2">Identificador de la prueba <span style="color: #ed1b24">*</span></label>
                            <div class="input-group-prepend-sm">
                                <span class="input-group-text"  id="addon_level_id">P</span>
                            </div>
                            <input id="level_id" name="level_id" type="number" min="1" class="form-control" aria-describedby="addon_level_id" placeholder="Ej: P1, P2, P3, ...">
                        </div>
                        @error('level_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="level_name" class="col-sm-2 col-form-label">Nombre del caso <span style="color: #ed1b24">*</span></label>
                        <div class="col-sm-10">
                            <input id="level_name" name="level_name" type="text" class="form-control" placeholder="Ej: Log-in, Registro de Compra, Agregar Amigo, ...">
                        </div>
                        @error('level_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="level_actors" class="col-sm-2 col-form-label">Actor(es) <span style="color: #ed1b24">*</span></label>
                        <div class="col-sm-10">
                            <input id="level_actors" name="level_actors" type="text" class="form-control" placeholder="Ej: Administrador, Cajero, Abogado, ...">
                        </div>
                        @error('level_actors')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 row">
                        <label for="level_sist_req" class="col-sm-2">Identificador(es) requerimiento(s) <span style="color: #ed1b24">*</span></label>
                        <div class="col-sm-10">
                            <input id="level_sist_req" name="level_sist_req" type="text" class="form-control" placeholder="Ej: RF-01, RF02, RNF-01, ...">
                        </div>

                        @error('level_sist_req')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3  row">
                        <label for="level_pre_condition" class="col-sm-2 col-form-label">Pre-condición:</label>
                        <div class="col-sm-10">
                            @if(isset($select_casos))
                                <select class="custom-select-sm form-control col-sm-4" id="level_pre_condition" name="level_pre_condition">
                                    @foreach($select_casos as $caso)
                                        <option <?php echo($caso->id === -1 ? 'selected ' : '')?> value="{{__ ($caso->id)}}">{{$caso->nombre_en_select}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="custom-select-sm form-control col-sm-4" id="level_pre_condition" name="level_pre_condition">
                                    <option selected value="-1">No hay casos de prueba</option>
                                </select>
                            @endif
                        </div>
                        @error('level_pre_condition')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3  row">
                        <label for="level_description" class="col-sm-2 col-form-label">Descripción de la prueba <span style="color: #ed1b24">*</span></label>
                        <div class="col-sm-10">
                            <textarea id="level_description" name="level_description" class="form-control" placeholder="Descripción de la Prueba"></textarea>
                        </div>
                        @error('level_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <activity-result-form-component></activity-result-form-component>

                    <div class="form-group row">
                        <div class="col-12">
                            <button id="btn_submit" class="btn btn-primary" type="submit"> <i class="fas fa-save"></i> {{ __('Crear') }}</button>
                            <a class="btn btn-danger" href="{{ route('ver_plan_prueba', $id) }}" role="button"><i class="far fa-times-circle"></i> {{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    import ActivityResultFormComponent from "../../../js/components/ActivityResultFormComponent";
    export default {
        components: {ActivityResultFormComponent}
    }
</script>
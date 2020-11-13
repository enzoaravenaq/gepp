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
        @if(@session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{@session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(@session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{__('Error! ')}}</strong>{{@session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>


    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm"><h2>{{ __('Plan de Pruebas') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <h5 class="card-title"><b>{{__('Datos plan de pruebas')}}</b></h5>
                    <div class="row">
                        <div class="col">
                            <dt class="col-sm-6">{{__('Grupo de Trabajo: ')}}</dt>
                            <dd class="col-sm-9">{{__($plan_de_prueba->grupo_proy)}}</dd>

                            <dt class="col-sm-6">{{__('Nombre del Proyecto: ')}}</dt>
                            <dd class="col-sm-9">
                                <p>{{__($plan_de_prueba->nombre_proyecto)}}</p>
                            </dd>

                            <dt class="col-sm-6">{{__('Forma de Acceso al Sistema: ')}}</dt>
                            <dd class="col-sm-9">
                                <p>{{__($plan_de_prueba->acceso_sistema)}}</p>
                            </dd>

                            <dt class="col-sm-6">{{__('Datos Generales: ')}}</dt>
                            <dd class="col-sm-9">
                                <p>{{__($plan_de_prueba->datos_generales)}}</p>
                            </dd>

                            @if(isset($enlace_plan->enlace))

                                <dt class="col-sm-6">{{__('Enlace Acceso a la Prueba: ')}}</dt>
                                <dd class="col-sm-9">
                                    <div class="input-group input-group-sm mb-3 mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="icono_link"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="El link estará disponible para el día de ejecución del plan de pruebas" aria-label="Small" aria-describedby="icono_link" disabled>
                                        <!--<input type="text" class="form-control" value="{{__($enlace_plan->enlace)}}" aria-label="Small" aria-describedby="icono_link" disabled>-->
                                    </div>
                                </dd>
                            @endif
                        </div>
                        <div class="col col-lg-3">
                            <img src="{{__ (isset($plan_de_prueba->nombre_imagen)) ? URL::asset('logos_plan_pruebas/'.$plan_de_prueba->nombre_imagen) : URL::asset('logos_plan_pruebas/default_logo.jpg')}}" class="img-thumbnail" style="width:150px;height:150px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col"><h2>{{ __('Casos de Prueba del Plan') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">

                    @foreach($casos_de_prueba as $key => $caso)
                        <div class="container-fluid mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <b>{{'Caso de Prueba P'.$caso->ident_caso.'-'.$caso->nombre}}</b>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <dt class="col-sm-3">{{__('Identificación de la prueba: ')}}</dt>
                                        <dd class="col-sm-4 text-left">{{__($caso->ident_caso)}}</dd>
                                    </div>

                                    <div class="row">
                                        <dt class="col-sm-3">{{__('Nombre de la prueba: ')}}</dt>
                                        <dd class="col-sm-4 text-left">
                                            <p>{{__($caso->nombre)}}</p>
                                        </dd>
                                    </div>

                                    <div class="row">
                                        <dt class="col-sm-3">{{__('Actor(es): ')}}</dt>
                                        <dd class="col-sm-4 text-left">
                                            <p>{{__($caso->actores)}}</p>
                                        </dd>
                                    </div>

                                    <div class="row">
                                        <dt class="col-sm-3">{{__('Identificador(es) de requerimiento(s): ')}}</dt>
                                        <dd class="col-sm-4 text-left">
                                            <p>{{__($caso->ident_req)}}</p>
                                        </dd>
                                    </div>

                                    <div class="row mt-2">
                                        <dt class="col-sm-3">{{__('Pre-condición: ')}}</dt>
                                        <dd class="col-sm-4 text-left">
                                            <?php echo($caso->id_level_req != NULL ? $caso->pre_condicion : 'Ninguna' )?>
                                        </dd>
                                    </div>

                                    <?php $i=1?>
                                    @foreach($caso->actividades as $actividad)
                                        <div class="card mx-3 mb-3 mt-3">
                                            <h5 class="card-header text-center">{{__('Actividad y Respuesta del Sistema #'.$i)}}</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <dt class="col-sm-3">{{__('Actividad: ')}}</dt>
                                                    <dd class="col-sm">{{__($actividad->actividad)}}</dd>
                                                </div>
                                                <div class="row">
                                                    <dt class="col-sm-3">{{__('Respuesta del Sistema: ')}}</dt>
                                                    <dd class="col-sm">{{__($actividad->respuesta_sistema)}}</dd>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
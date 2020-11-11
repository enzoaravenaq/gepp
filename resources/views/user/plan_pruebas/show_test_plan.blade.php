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
                    <div class="col"></div>
                    <div class="col text-center">
                        <a class="btn btn-warning" href="{{ __(route('editar_plan_prueba', $plan_de_prueba->id)) }}" role="button"> <i class="far fa-edit"></i> {{ __('Editar plan de prueba') }} </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h4>Instrucciones de configuración del plan de pruebas</h4>
                        <ul>
                            <li> Primero crear todos los Casos de Prueba necesarios para el plan.</li>
                            <li> Opcionalmente si debe editar o eliminar un Caso de Prueba, hacerlo en segunda instancia.</li>
                            <li> Una vez listos los Casos de Prueba, acceder a "Señalar orden de ejecución" y ordenar los Casos de Prueba para la ejecución de los Testers.</li>
                            <li> Finalmente copie el "Enlace de Acceso a la Prueba" y dejelo a disposición de los Testers.</li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

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
                    <div class="col"><h2>{{ __('Casos de Prueba') }}</h2></div>
                    <div class="col"></div>
                    <div class="col">
                        <a class="btn btn-success" href="{{ __(route('crear_caso_prueba', $plan_de_prueba->id)) }}" role="button"> <i class="fas fa-plus-circle"></i> {{ __('Crear caso de prueba') }}</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-primary" href="{{ __(route('ordenar_casos_prueba', $plan_de_prueba->id)) }}" role="button"> <i class="fas fa-arrows-alt"></i> {{ __('Señalar orden de ejecución') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @if(isset($casos_de_prueba))
                            @foreach($casos_de_prueba as $key => $caso)
                                <div class="card mt-3 mr-3" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{ 'P'.$caso->ident_caso.'-'.$caso->nombre}}</b></h5>
                                        <p class="card-text">{{ 'Descripción: '.$caso->descripcion }}</p>

                                    </div>
                                    <div class="card-footer">
                                        <a href="{{route('ver_caso_prueba', $caso->id)}}" class="btn btn-primary btn-sm"> <i class="far fa-eye"></i> {{__('Ver')}}</a>
                                        <a href="{{route('editar_caso_prueba', [$caso->id, $plan_de_prueba->id])}}" class="btn btn-warning btn-sm"> <i class="far fa-edit"></i> {{__('Editar')}}</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal_{{ $key }}">
                                            <i class="fas fa-trash"></i>
                                            {{__('Eliminar')}}
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal_{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{__('Eliminar Caso de Prueba')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{__('¿Está seguro de que desea eliminar el Caso de Prueba?')}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('borrar_caso_prueba', $caso->id) }}" class="btn btn-light"><i class="fas fa-check"></i> {{__('Sí')}}</a>
                                                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-times"></i> {{__('No')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

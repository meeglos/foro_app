@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <h2>Posts</h2>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-top: 22px;">


            <div class="btn-group">
                <button type="button" class="btn btn-info">Seleccionar</button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Pendientes</a></li>
                    <li><a href="#">Finalizados</a></li>
                    <li><a href="#">Solo los de hoy</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Mostrar todos</a></li>
                </ul>
            </div>


            <a role="button" class="btn btn-danger pull-right" href="create" aria-label="Left Align">Agregar registro
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="panel panel-default" style="margin-bottom: 5px;">
        <div class="panel-body" style="padding-top: 8px; padding-bottom: 8px;">
            <a href="{{ $post->url }}" data-toggle="tooltip" data-html="true" data-placement="bottom" title="{{ $post->tooltip }}">
                {{ str_limit($post->description, 80) }} | <b style="color: #2d760c;">Creado por: <u>{{ $post->user->name }}</u></b> {{ $post->dif }}
            </a>
            <span class="badge">{{ $post->count }}</span>
            <span class="label label-info pull-right" style="padding: 5px 10px; font-size: .8em; font-weight: 100;">Pendiente</span>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-xs-7 col-xs-offset-5">
            {{ $posts->render() }}
        </div>
    </div>
</div>
@endsection
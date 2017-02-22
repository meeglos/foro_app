@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-8 col-md-10">
            <h2>Categorias</h2>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2" style="margin-top: 22px;">
            <a role="button" class="btn btn-danger pull-right" href="create" aria-label="Left Align">Agregar etiqueta
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
    </div>

        @foreach($tags as $tag)
    <div class="panel panel-default" style="margin-bottom: 5px;">
            <div class="panel-body" style="padding-top: 8px; padding-bottom: 8px;">
                {{ $tag->description }}
            </div>
    </div>
        @endforeach
    <div class="row">
        <div class="col-xs-7 col-xs-offset-5">
            {{ $tags->render() }}
        </div>
    </div>
</div>
@endsection
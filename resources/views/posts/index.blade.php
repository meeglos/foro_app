@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-8 col-md-10">
            <h2>Posts</h2>
            {{--<h2>Posts</h2>--}--}}
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2" style="margin-top: 22px;">
            <a role="button" class="btn btn-danger pull-right" href="posts/create" aria-label="Left Align">Agregar registro
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
    </div>

        @foreach($posts as $post)
    <div class="panel panel-default" style="margin-bottom: 5px;">
            <div class="panel-body" style="padding-top: 8px; padding-bottom: 8px;">
                <a href="{{ $post->url }}">
                    {{ $post->title }} | <b style="color: #2d760c;">Creado por: <u>{{ $post->user->name }}</u></b> {{ $post->dif }}
                </a>
                <span class="badge">14</span>
                <span class="badge pull-right" style="background-color: #5c8705;">Pendiente</span>
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
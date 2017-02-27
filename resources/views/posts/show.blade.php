@extends('layouts/app')

@section('content')
<div class="container">
    <h2 class="show-header">
        {{ $post->description }} {!! Form::submit('editar', ['class'=> 'btn btn-primary pull-right']) !!}
        <small> <p class="label label-warning">{{ $post->dif }}</p></small>
    </h2>

    <section class="row post-details">
        <section class="col-md-6 post-details-left">
            @foreach($post->tags as $tag)
                <span class="tag-follow">{{ $tag->description }}</span>
            @endforeach
            <p class="creado-por">Reportado por: {{ $post->agent_code}} @ {{ $post->fecha }}</p>

        </section>
        <section class="col-md-6 post-details-right">
            <p><span class="post-details-title">ID del cliente:</span> {{ $post->client_code }}</p>
            <p><span class="post-details-title">Contacto del cliente:</span> {{ $post->client_phone }}</p>
            <p><span class="post-details-title">Nombre del contacto:</span> {{ $post->client_name }}</p>
        </section>
    </section>

    <ol id="lista2">
        @foreach($post->follows as $follow)
        <li>
            <p class="follow-header"><span class="follow-author">{{ $follow->user->name }}</span> &#8226; {{ $follow->dif }}</p>
            <p class="follow-comment">{{ $follow->comments }}</p>
        </li>
        @endforeach
    </ol>

    <hr>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="post" action="/posts/{{ $post->id }}/follows">

                {{ csrf_field() }}

                <div class="form-group">
                    {!! Field::textarea('comments', ['label' => 'Descripción de seguimiento', 'rows' => '3', 'placeholder' => 'Descripción del seguimiento al cliente aquí']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class'=> 'btn btn-primary form-control']) !!}
                </div>
            </form>
        </div>
    </div>

    <hr>
    <p>Creado por {{ $post->user->name }}</p>

</div>
@endsection

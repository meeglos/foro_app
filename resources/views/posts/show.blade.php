@extends('layouts/app')

@section('content')
<div class="container">
    <h2 class="show-header">
        {{ $post->description }} {!! Form::submit('editar', ['class'=> 'btn btn-primary pull-right']) !!}
        <small> <p class="label label-warning">{{ $post->dif }}</p></small>
    </h2>
    @foreach($post->tags as $tag)
        <span class="badge" style="padding: 6px 10px;">{{ $tag->description }}</span>
    @endforeach
    <h4 style="display: inline-block;"><span style="padding: 5px 10px;" class="label label-danger">Creado por:</span> {{ $post->agent_code}}</h4>
    <h4 style="display: inline-block;"><span style="padding: 5px 10px;" class="label label-warning">ID del cliente:</span> {{ $post->client_code }}</h4>
    <h4 style="display: inline-block;"><span style="padding: 5px 10px;" class="label label-success">Contacto del cliente:</span> {{ $post->client_phone }}</h4>
    <h4 style="display: inline-block;"><span style="padding: 5px 10px;" class="label label-default">Nombre del contacto:</span> {{ $post->client_name }}</h4>

    <hr>

    <div class="comment">

        @foreach($post->follows as $follow)

            <div class="panel panel-default">
                <div class="panel-body">

                    <h6><b>{{ $follow->user->name }} {{ $follow->dif }}</b></h6>

                    {{ $follow->comments }}

                </div>
            </div>

        @endforeach

    </div>

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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit {!! $post->description !!}</div>
                    <div class="panel-body">
                        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['CreatePostController@update', $post->id]]) !!}

                            <div class="col-md-6">
                                {!! Field::text('agent_code', ['label' => 'Reportado por', 'placeholder' => 'Código del agente que reporta la incidencia']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_code', ['label' => 'Id cliente', 'placeholder' => 'Id del cliente a llamar']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_name', ['label' => 'Nombre cliente', 'placeholder' => 'Nombre de la persona de contacto']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_phone', ['label' => 'Teléfono', 'placeholder' => 'Teléfono de contacto']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_contact', ['label' => 'Contactar', 'placeholder' => 'Fecha y hora de contacto']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('category[]', $tags, $post->tagList, ['id' => 'tag_list', 'label' => 'Categoría', 'multiple']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Field::textarea('description', ['label' => 'Motivo llamada', 'rows' => '3', 'placeholder' => 'Descripción del motivo de llamada']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::submit('Guardar', ['class'=> 'btn btn-primary form-control']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



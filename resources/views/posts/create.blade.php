@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar datos de seguimiento</div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'posts.store']) !!}
                            <div class="col-md-6">
                                {{--<input type="number" min="0" class="form-control" placeholder="Cantidad" id="cantidad">--}}
                                {!! Field::text('agent_code', ['label' => 'Reportado por', 'placeholder' => 'Código del agente que reporta la incidencia']) !!}
                            </div>
                            <div class="col-md-6">
                                {{--<input type="text" class="form-control" placeholder="Ej: [Fibra 300] [Linea M]" id="descripcion">--}}
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
                                {!! Field::select('category[]', $tags,  null, ['id' => 'tag_list', 'label' => 'Categoría', 'multiple']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Field::textarea('description', ['label' => 'Motivo llamada', 'rows' => '3', 'placeholder' => 'Descripción del motivo de llamada']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::submit('Guardar', ['class'=> 'btn btn-primary form-control']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                    <script>$('#tag_list').select2({ placeholder: 'Selecciona una categoría' });</script>

                </div>
            </div>
        </div>
    </div>
@endsection



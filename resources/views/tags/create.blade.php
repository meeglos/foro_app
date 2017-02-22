@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar etiquetas de seguimiento</div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'tags.store']) !!}
                        <div class="col-md-12">
                            {!! Field::text('description', ['label' => 'Nombre de categoría', 'placeholder' => 'Tipo de categoría: fijo, móvil, etc.']) !!}
                        </div>
                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts/app')

@section('content')
<div class="container">
    <p>{{ $post->description }}</p>

    <p>{{ $post->user->name}}</p>
</div>
@endsection

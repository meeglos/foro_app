@extends('layouts/app')

@section('content')
<div class="container">
    <span class="pull-right">{{ $post->dif }}</span>
    <h2>{{ $post->description }}</h2>
    @foreach($post->tags as $tag)
        <span class="badge" style="padding: 6px 10px;">{{ $tag->description }}</span>
    @endforeach
    {{ $post->agent_code . ' - ' . $post->client_code . ' - ' . $post->client_phone . ' - ' . $post->client_name}}
    <hr>
    <p>Creado por {{ $post->user->name}}</p>

</div>
@endsection

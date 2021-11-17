@extends('layouts.app')

@section('content')
    <div class="container">

        @forelse ($notices as $notice)
            @can('view_notice', $notice)
                <h1>{{ $notice->title }}</h1>
                <p>{{ $notice->description }}</p>
                <b>Author: {{ $notice->user->name }}</b>
                @can('edit_notice', $notice)
                    <a href="{{ url("/notice/$notice->id/update") }}">Editar</a>
                @endcan
                <hr>
            @endcan
        @empty
            <p>Nenhuma notícia cadastrada.</p>
        @endforelse

    </div>
@endsection

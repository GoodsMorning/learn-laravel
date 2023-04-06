{{-- @extends('layout')

@section('content')
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            {!! $post->body !!}
        </p>

    </article>

    <a href="/">Back Home</a>
@endsection
down > top --}}

<x-layout>
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        {!! $post->body !!}
    </article>
    <a href="/">Back Home</a>
</x-layout>

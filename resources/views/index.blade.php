<x-layout>
    @foreach ($posts as $post)
        <article>
            <a href="/post/{{ $post->id }} ">
                <h1>
                    {{ $post->title }}
                </h1>
            </a>

            {{ $post->excerpt }}

        </article>
    @endforeach
</x-layout>

{{-- top > dowm --}}

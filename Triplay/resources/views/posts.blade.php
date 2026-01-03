<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
@foreach ( $posts as $post )


    <article class ="py-8 max-w-screen-md border-b border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post ['title'] }}</h2>
        <div class = "text-base text-gray-500 ">
            <a href="/authors/{{ $post->author->username}}" class = "hover:underline">{{ $post->author->name }}</a> | {{ $post->created_at}}
        </div class = "text-base text-gray-500">
        <p class="my-4 font-light">{{ Str::limit($post ['body'], 100) }}</p>
        <a href="posts/{{$post['id']}}" class="text-medium text-blue-500 hover:underline">Read More &raquo;</a>
    </article>
@endforeach
</x-layout>


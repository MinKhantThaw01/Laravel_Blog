{{-- <x-layout>

    <x-slot name="title">
        <title>ALL BLOG</title>
    </x-slot>
@foreach($blogs as $blog)
<h1>
    <a href="blog/{{ $blog->slug }}">
    {{ $blog->title }}
    </a>
</h1>
<h4>Author - <a href="/users/{{ $blog->author->user_name }}">{{ $blog->author->name }}</a></h4>
<p><a href="/categories/{{ $blog->category->slug }}">{{ $blog->category->name }}</a></p>
<div>
<p>Published at {{ $blog->created_at->diffForHumans() }}</p>
    <p>{{ $blog->intro }}</p>
</div>

@endforeach
   
</x-layout> --}}
<x-layout>
    @if (session('success'))
    <div class="alert alert-success text-center ">{{ session('success') }} </div>
    @endif

    
    <x-hero-section />
    
    <x-blogs-section :blogs="$blogs"  />
        

</x-layout>


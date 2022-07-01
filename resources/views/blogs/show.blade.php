{{-- <x-layout>
    <x-slot name="title">
        <title>{{$blog->title}}</title>
    </x-slot>
    <h1>{{ $blog->title }}</h1>
    <p>{!! $blog->body !!}</p>
    
    
    <a href="/">go back</a>
        
</x-layout>

 --}}

 <x-layout>
   

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src='{{ asset("/storage/$blog->thumbnail") }}'
            class="card-img-top my-3"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <div class="my-3">Author - <a href="/?user={{ $blog->author->user_name }}">{{ $blog->author->name }}</a></div>
          <div class="d-flex justify-content-center my-2">
            <div class="badge bg-primary "><a class="text-white text-decoration-none" href="/?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a> </div>
            @auth
            <div class="mx-2"> 
              <form action="/blog/{{$blog->slug}}/subscription" method="POST">
                @csrf
              @if (auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger badge">Unsubscribe</button>
              @else
              <button class="btn btn-warning badge">Subscribe</button>
              @endif
              </form>
            </div>
            @endauth
            
            
          </div>
          <div>{{ $blog->created_at->diffForHumans() }}</div>
          <p class="lh-md">
            {{ $blog->body }}
          </p>
        </div>
      </div>
    </div>

    <section class="container ">
      
      <div class="col-md-8 mx-auto">
        @auth
        <x-comment-form :blog="$blog"/>
        @else
        <p class="text-center">Need<a href="/login" class=" text-danger"> Login </a>first to participate in this session.</p>
        @endauth
      </div>
      
   </section>

    @if ($blog->comments->count())
    <x-comment :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif
  

    <x-blog_you_may_like :randomBlogs="$randomBlogs"/>
   
</x-layout>

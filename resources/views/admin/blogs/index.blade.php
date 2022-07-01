<x-admin-layout>
  @if (session('success'))
  <div class="alert alert-warning text-center ">{{ session('success') }} </div>
  @endif

    <div class="my-5">
      
      <h3 class="my-2 text-center">Blogs</h3>
      <x-card-wrapper>
          <table class="table">
              <thead>
                <tr>
      
                  <th scope="col">Title</th>
                  <th scope="col">Intro</th>
                  <th scope="col" colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                      <td><a href="/blog/{{ $blog->slug }}" targer="_blank">{{ $blog->title }}</a></td>
                      <td>{{ $blog->intro }}</td>
                      <td><a href="/admin/{{ $blog->slug }}/edit" class="btn btn-warning">Edit</a></td>
                      <td>
                         <form action="/admin/{{ $blog->slug }}/delete" method="POST" >
                          @csrf
                          @method('DELETE')
                          <button type='submit' class="btn btn-danger">Delete</button>
                         </form>
                      </td>
      
                    </tr>
                @endforeach
              </tbody>
            </table>
            {{ $blogs->links() }}
      </x-card-wrapper>
    </div>

</x-admin-layout>
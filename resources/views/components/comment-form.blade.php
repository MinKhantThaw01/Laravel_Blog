<x-card-wrapper >
    <form action="/blog/{{ $blog->slug }}/comment" method="post">
      @csrf
     <div class="mb-3">
      <textarea required name="body" id="" cols="10" rows="5" class="form-control border-0" placeholder="say something ... "></textarea>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary my-3">Submit</button>
      </div>
    </form>
    <x-error name="body" />
  </x-card-wrapper>
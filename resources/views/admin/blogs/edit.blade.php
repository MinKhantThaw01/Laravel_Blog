

<x-admin-layout>
    <div class="container my-2">
        <h1 class="text-center my-4">Blog Edit Form</h1>
            <x-card-wrapper>
              
                <form 
                enctype="multipart/form-data"
                action="/admin/blogs/{{ $blog->slug }}/update"
                method="post"
                >

                @method('patch')
                    @csrf

                    <x-form.input name="title" value="{{ $blog->title }}" ></x-form.input>
                   
                    <x-form.input name="slug" value="{{ $blog->slug }}"></x-form.input>
                    
                    <x-form.input name="intro" value="{{ $blog->intro }}"></x-form.input>
                    
                   
                    <x-form.textarea name="body" value="{{ $blog->body }}"></x-form.textarea>

                    <x-form.input name="thumbnail" type="file"></x-form.input>
                    
                    <img src="/storage/{{ $blog->thumbnail }}" width="200px" height="100px" alt="">
                    
                    <x-form.select :categories="$categories"  :blog="$blog"></x-form.select>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </x-card-wrapper>
        </div>
 
</x-admin-layout>
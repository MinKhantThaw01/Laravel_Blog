<x-admin-layout>
    <div class="container my-2">
        <h1 class="text-center my-4">Blog Create Form</h1>
            <x-card-wrapper>
              
                <form 
                enctype="multipart/form-data"
                action="/admin/blogs/store"
                method="post"
                >
                    @csrf

                    <x-form.input name="title"></x-form.input>
                   
                    <x-form.input name="slug"></x-form.input>
                    
                    <x-form.input name="intro"></x-form.input>
                    
                    <x-form.textarea name="body"></x-form.textarea>

                    <x-form.input name="thumbnail" type="file"></x-form.input>
                    
                    <x-form.select :categories="$categories"></x-form.select>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </x-card-wrapper>
        </div>
 
</x-admin-layout>
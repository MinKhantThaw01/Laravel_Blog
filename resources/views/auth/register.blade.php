<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary my-3 text-center">Register Form</h3>
                <div class="card p-5 my-3 shadow-sm">
                    <form method="post" action="/register">
                        @csrf
                        <x-form.input name="name"></x-form.input>
                        
                        <x-form.input name="user_name"></x-form.input>

                        <x-form.input name="email" type="email"></x-form.input>
                        
                        <x-form.input name="password" type="password"></x-form.input>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
         </div>
    </div>
</x-layout>
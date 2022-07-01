<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5">
                <h3 class="text-primary mt-4 text-center">Login Form</h3>
                <div class="card p-5 my-5 shadow-sm">
                    <form method="post" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" 
                            required
                            name="email"
                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value={{ old('email') }} >

                            <x-error name="email" />
                            
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password"
                        required 
                        name="password"
                        class="form-control" id="exampleInputPassword1" >

                            <x-error name="password" />
                        
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
         </div>
    </div>
</x-layout>
<!-- navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/#blogs" class="nav-link">Blogs</a>
        @guest
       
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
        @else
        @can('admin')
        <a href="/admin/blogs" class="nav-link">DashBoard</a>
        @endcan
           <img 
                   class="rounded-circle"
                   src="{{ auth()->user()->avatar }}"
                   width=40 
                   height=40 >
       
        <a href="" class="nav-link">Welcome {{ auth()->user()->name }}</a>
        <form action="/logout" method="post">
          @csrf
          <button class="nav-link btn btn-link">Log Out</button>
        </form>
        @endguest

       
        
       
       
       

        <a href="/#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>
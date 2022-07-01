<div class="dropdown">
    <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
     {{isset($currentCategory) ? $currentCategory->name : "Filter By category"}}
    </a>
  
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <li><a class="dropdown-item" 
        href="/">all</a>
        </li>
          
      @foreach ($categories as $category)
      <li><a class="dropdown-item" 
        href="/?category={{ $category->slug }}{{ request('search') ? '&search='.request('search') : " " }}
        {{ request('user') ? '&user='.request('user') : " " }}">{{ $category->name }}</a></li>
      @endforeach
      
    </ul>
  </div>
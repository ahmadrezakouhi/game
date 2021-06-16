<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
    <div class="navbar-brand dropdown" >
        <a class=" dropdown-toggle text-dark"  id="navbarDropdown"  data-toggle="dropdown" style="text-decoration: none;
cursor: pointer">
            <img src="{{asset('img/avatar.png')}}" class="rounded-circle" alt="" style="width:38px">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item persian text-right" href="{{route('logout')}}">خروج</a>

        </div>
    </div>
  
</nav>
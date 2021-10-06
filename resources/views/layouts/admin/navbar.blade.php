<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
    <div class="navbar-brand dropdown" >
        <a class=" dropdown-toggle text-dark"  id="navbarDropdown"  data-toggle="dropdown" style="text-decoration: none;
cursor: pointer">
            <img src="{{asset('img/avatar.png')}}" class="rounded-circle" alt="" style="width:38px">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <span class="dropdown-item-text persian text-right text-success">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item persian text-right" href="{{route('logout')}}">خروج</a>

        </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-right persian" href="{{route('users')}}">مدیریت کاربر ها</a>
            </li>
            


        </ul>

    </div>
</nav>

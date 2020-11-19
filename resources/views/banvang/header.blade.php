<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">GSS-24K</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link {{ (request()->is('lich-su-giao-dich')) ? 'active' : '' }}" href="{{ route('lich-su-giao-dich') }}">Lịch sử giao dịch</a>
        </li>
        
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm vàng . . " aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <a href="{{ route('gio-hang') }}" class="btn btn-default"><i style="font-size: 22px;color: white;" class="fas fa-shopping-cart"></i></a>
    </div>
</nav>
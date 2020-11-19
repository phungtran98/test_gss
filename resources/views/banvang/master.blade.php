<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - bán vàng</title>
    <!-- CSS and Bootstrap -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('PhoneWoo/assets/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('PhoneWoo/assets/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
      body {
    position: relative;
  }
      div#footer {
    background-color: #343a40;
    margin-top: 130px;
    }

    div#footer > p {
      color: white;
      margin: 10px;
    }
    .text_product{
      color: #0016b5;
    font-size: 16px;

    }
    .alert-css {
    position: absolute;
    right: 0%;
    z-index: 99;
    top: 49px;
    width: 22%;
}


    </style>
</head>
<body>
    <div class="container ">
      @if (session('error'))
        <div class="alert alert-danger alert-css" role="alert">
                {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-css" role="alert">
            {{ session('success') }}
        </div>
    @endif
      {{-- phần header --}}
        @include('banvang.header')
        <div class="row mt-2">
          {{-- phần sidebar --}}
            @include('banvang.sidebar')
            <div class="col-9 ">
                <!-- Hiển thị sản phẩm -->
               @yield('content')
            </div>
        </div>
    </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 " id="footer">
        <p>Trần Thanh Phụng</p>
        <p>Người hướng dẫn: <strong>Anh Trần Thanh Phong</strong></p>
      </div>
    </div>
  </div>

<!-- JS and JQuery -->
<script src="{{asset('PhoneWoo/assets/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('PhoneWoo/assets/bootstrap/dist/js/bootstrap.js')}}"></script>
@stack('script')
</body>
</html>
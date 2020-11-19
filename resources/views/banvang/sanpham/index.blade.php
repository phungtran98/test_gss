@extends('banvang.master')
@section('content')
 {{-- phần sider --}}
 @include('banvang.slider')
<div class="row mt-5">
    <div class="col-12">
        <h5 class="text-center">Sản phẩm mới</h5>
    </div>
  @foreach ($sanpham as $item)
  <div class="col-md-4">
    <div class="card mb-4 shadow-sm">
      <img class="card-img-top" src="{{asset("upload").'/'.$item->sp_hinhanh}}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_173b4f45847%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_173b4f45847%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
      <div class="card-body">
        <p class="card-text"><a href="#" class="text_product"> {{$item->sp_ten}} </a></p>
        <p class="card-text"><a href="#" class="text_product" style="font-weight:bold"> {{ number_format($item->sp_gia)}} VNĐ</a></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
          
            <input type="hidden" class="sp_id{{$item->sp_id}}" value="{{$item->sp_id}} ">
            <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart" data-cart="{{$item->sp_id}}">Thêm vào giỏ hàng</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Chi tiết</button>
          </div>
        </div>
      </div>
    </div>
</div>
  @endforeach
</div>
@endsection
@push('script')
<script>
 $(document).ready(function () {

   $('.add-to-cart').click(function (e) { 
     e.preventDefault();
     var id = $(this).attr('data-cart');
    var sp=$('.sp_id'+id).val();  
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "post",
      url: " {{route('them-sp-gio-hang')}} ",
      data: {sp:sp},
      dataType: "json",
      success: function (response) {
        // console.log(response);
        if(response > 0)
        {
          alert("Thêm thành công vào giỏ hàng");
        }
      }
    });

   });
 });
</script>
@endpush
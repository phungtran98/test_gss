@extends('banvang.master')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h5 class="text-center">Giỏ hàng của bạn</h5>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1?>
                    @foreach ($sanpham as $item)
                    <tr>
                        <td> {{$i++}} </td>
                        <td> {{$item->name}} </td>
                        <td style="text-align: right"> {{ number_format($item->price)}} </td>
                        <td > <input style="width:100px;text-align:center" class="form-control" type="number" min="1" value="{{$item->qty}}"></td>
                        <td style="text-align: right"> {{number_format($item->price * $item->qty)}} </td>
                        <td>
                            <a href="{{ route('xoa-san-pham-gio-hang', ['id'=>$item->rowId]) }}" class="btn btn-danger" >Xóa</a>
                        </td>
                        
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Tổng tiền</td>
                        <td style="text-align: right"> {{Cart::subtotal()}} </td>
                        <td><a href="#" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Thanh Toán</a></td>
                    </tr>
                </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('thanh-toan') }}" method="post">  
            @csrf 
            <div class="row">
                <div class="col-md-4">
                    <h5>Thông tin khách hàng</h5>
                    <p>Họ tên: <strong>{{$kh->name}}</strong> </p>
                    <p>Email: <strong>{{$kh->email}} </strong></p>
                    <p>Số điện thoại: 0987 654 222</p>
                </div>
                <div class="col-md-4">
                    <h5>Thông tin sản phẩm</h5>
                    <table class="table table-bordered">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; $subtotal=0;?>
                                @foreach ($sanpham as $item)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td> {{$item->name}} </td>
                                    <td > {{ number_format($item->price)}} </td>
                                    <td >{{$item->qty}}</td>
                                    <td > {{number_format($item->price * $item->qty)}} 
                                        <input type="hidden" name="price" value=" {{$subtotal+=($item->price * $item->qty)}} ">
                                    </td>
                                    
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">Tổng tiền</td>
                                    <td style="text-align: right"> {{Cart::subtotal()}} </td>
                                
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Thanh Toán</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script>
    
</script>   
@endpush
@extends('banvang.master')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h5 class="text-center">Lịch sử giao dịch</h5>
    </div>
    <div class="col-md-12">
        <table class="table  ">
            <thead class="thead-inverse">
                <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Ngày lập</th>
                    <th>trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1?>
                @foreach ($cthd as $item)
                    <tr>
                        <td> {{$i++}} </td>
                        <td> {{$item->hd_id}} </td>
                        <td> {{date('d-m-Y H:i:s', strtotime($item->hd_ngaylap))}} </td>
                        <td> 
                            @if ($item->hd_trangthai != 0)
                            <span class="badge badge-success">Đã thanh toán</span>
                            @else
                            <span class="badge badge-danger">Lỗi thanh toán</span>
                            @endif    
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
@push('script')
<script>
    
</script>   
@endpush
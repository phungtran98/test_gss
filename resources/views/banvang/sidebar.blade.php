<div class="col-3 ">
    <ul class="list-group normal-border">
        <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Danh mục sản phẩm</b></li>
       @foreach ($loaisp as $item)
       <li class="list-group-item normal-border"><a href="#" style="display: block"> {{$item->lsp_ten}} </a> </li>
       @endforeach
      </ul>
</div>
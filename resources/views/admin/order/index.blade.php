@extends("layout.admin.head")
@section('title')
    Список заказов
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
<link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
<link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
@endsection

@section('content')
<div class="card-tools">
    <form action="{{route("admin.products.index")}}" method="get">
        @csrf
        <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="searchField" class="form-control float-right" placeholder="Поиск" @if(isset($_GET['searchField'])) value="{{$_GET['searchField']}}" @endif>
  
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
        </div>
    </form>
  </div>
  <table class="table table-bordered table-hover mt-2">
      <thead>
        <tr>
          <th scope="col">ФИО</th>
          <th scope="col">Телефон</th>
          <th scope="col">Почта</th>
          <th scope="col">Адрес</th>
          <th scope="col">Общ.стоимость</th>
          <th scope="col">Статус</th>
          <th scope="col">Дата заказа</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr data-widget="expandable-table" aria-expanded="false">
            <th scope="row">{{$order->FIO}}</th>
            <td>{{$order->phone_number}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->adress}}</td>
            <td>{{$order->total_price}}</td>

            <td>@if($order->is_checked) <p class="text-success"> Проверен </p> @else <p class="text-danger">Не проверен</p>@endif</td>
            <td>@if($order->updated_at) {{$order->updated_at}} @else {{$order->created_at}} @endif</td>
            <td> 
              @if (!$order->is_checked)
              <form action="{{route('admin.orders.confirm')}}" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="email" value="{{$order->email}}">
                <input type="hidden" name="FIO" value="{{$order->FIO}}">
                <button type="submit" value="{{$order->id}}" name="orderId" class="btn btn-success"><i class="fas fa-check"></i></button>
              </form>
              @endif
            </td>
        </tr>
        <tr class="expandable-body d-none" data-widget="expandable-table" aria-expanded="false">
          <td colspan="7">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">Продукт</th>
                  <th scope="col">Стоимость</th>
                  <th scope="col">Материал</th>
                  <th scope="col">Размер</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order->products as $product)
                <tr>
                  <th scope="row">{{$product->title}}</th>
                  <td>{{$product->price}}</td>
                  <td>{{$product->composition}}</td>
                  <td>{{$product->size}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    {{-- <button type="button" class="btn btn-block btn-secondary">Создать</button> --}}
    <script>
      $('#no, #modal-danger .close').on('click', function(){
      
      $('#modal-danger').modal('hide');
    });
    </script>
@endsection

@section('js')
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>

<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
<script src="{{asset("dist/js/demo.js")}}"></script>
@endsection
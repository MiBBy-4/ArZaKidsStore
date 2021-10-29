@extends("layout.admin.head")
@section("title")Товары @endsection
@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
<link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
<link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
@endsection
@section("content")
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
        <th scope="col">Название</th>
        <th scope="col">Стоимость</th>
        <th scope="col">Цвет</th>
        <th scope="col">Состав</th>
        <th scope="col">Размер</th>
        <th scope="col">Картинка</th>
        <th scope="col">Статус</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{$product->title}}</th>
        <td>{{$product->price}}</td>
        <td>{{$product->color}}</td>
        <td>{{$product->composition}}</td>
        <td>{{$product->size}}</td>
        <td>
          <a href="{{$product->image}}" target="__blank">Посмотреть</a>
        </td>
        <td>
          @if($product->is_active) <label class="text-success">Активный</label> @else <label class="text-danger">Неактивный</label> @endif
        </td>
        <td>
          <a href="{{route("admin.products.edit", $product->id)}}" type="button" class="btn btn-block btn-secondary">Изменить</a>
          
            
            <form action="{{route('admin.products.destroy', $product->id)}}" method="POST" class="mt-2">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-block bg-gradient-danger" data-target="#modal-danger" data-toggle="modal" value="Удалить">
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="container d-flex justify-content-md-center mt-4">
    {{$products->appends($_GET)->links()}}
  </div>
  <div class="container">
    <a href="{{route("admin.products.create")}}" type="button" class="btn btn-block btn-secondary">Создать</a>
  </div>
  {{-- <button type="button" class="btn btn-block btn-secondary">Создать</button> --}}
  <script>
    $('#no, #modal-danger .close').on('click', function(){
    
    $('#modal-danger').modal('hide');
  });
  </script>
@endsection
@section("js")
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
<script src="{{asset("dist/js/demo.js")}}"></script>
@endsection
@extends("layout.admin.head")
@section('title')Создание товара
@endsection
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
<link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
<link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
@endsection

@section('content')
<form action="{{route("admin.products.store")}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="title">Название:</label>
        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Название">
        @error('title')
        <p class='text-danger'>{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label>Статус</label>
        <select class="custom-select" name="is_active">
          <option value="1">Активный</option>
          <option value="0">Неактивный</option>
        </select>
      </div>
      <div class="form-group">
        <label for="title">Стоимость:</label>
        <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="title" placeholder="Название">
        @error('price')
        <p class='text-danger'>{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="color">Цвет:</label>
        <input type="text" name="color" class="form-control" id="color" value="{{ old('color') }}" placeholder="Цвет">
        @error('color')
        <p class='text-danger'>{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="composition">Состав:</label>
        <input type="text" name="composition" class="form-control" id="composition" value="{{ old('composition') }}" placeholder="Состав">
        @error('composition')
        <p class='text-danger'>{{$message}}</p>
        @enderror  
    </div>
      <div class="form-group">
        <label for="size">Размер:</label>
        <input type="text" name="size" class="form-control" id="size" value="{{ old('size') }}" placeholder="Размер">
        @error('size')
        <p class='text-danger'>{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="image">Адрес картинки:</label>
        <input type="url" name="image" class="form-control" id="image" value="{{ old('image') }}" placeholder="Адрес">
        @error('image')
        <p class='text-danger'>{{$message}}</p>
        @enderror
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-success">Добавить</button>
    </div>
  </form>
@endsection

@section("js")
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
<script src="{{asset("dist/js/demo.js")}}"></script>
@endsection
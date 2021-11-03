@extends("layout.main.head")
@section("title")Arza Kids @endsection
@section("css")

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
{{Breadcrumbs::render('main')}}
@auth
@include("include.main.sweet")
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <form action="{{route("main.index")}}">
          @csrf
            <div class="input-group">
                <input type="search" name="searchField" @if(isset($_GET['searchField'])) value="{{$_GET['searchField']}}" @endif class="form-control form-control-md" placeholder="Я хочу найти...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-md btn-default effect">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="album py-5 mt-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($products as $product)
        <div class="col">
          <div class="card shadow-sm">
            <img class="card-img-top img-fluid" src="{{$product->image}}" alt="Card image cap">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-success text-md" style="tex; text-transform: none" >
                {{$product->price}}p
              </div>
            </div>
            <div class="card-body">
              <p class="card-text">
                  <h3 class="text-center mb-3">{{$product->title}}</h3>
                  <div class="row">
                      <div class="col-4">
                        <p class="text-black">Состав</p>
                        <p>{{$product->composition}}</p>
                      </div>
                      <div class="col-4">
                            <p class="text-black">Цвет</p>
                            <p>{{$product->color}}</p>
                      </div>
                      <div class="col-4">
                          <p class="text-black">Размер</p>
                          <p>{{$product->size}}</p>
                      </div>
                  </div>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <form action="{{route('cart.store')}}" method="post">
                  @csrf
                  <div class="btn-group">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"  name="product_id" value="{{$product->id}}" data-toggle="modal" data-target="#modal-xl">Я хочу это <i class="far fa-heart"></i></button>
                  </div>
                </form>
               <form action="{{route('bookmark.store')}}" method="post">
                 @csrf
                 <div class="btn-group">
                  {{-- style="background-color: rgb(241, 139, 139)" --}}
                   <button type="submit" class="btn btn-sm btn-outline-secondary"  name="product_id" value="{{$product->id}}">В закладки <i class="far fa-bookmark"></i></button>
                 </div>
               </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

@else
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <form action="{{route("main.index")}}">
          @csrf
            <div class="input-group">
                <input type="search" name="searchField" @if(isset($_GET['searchField'])) value="{{$_GET['searchField']}}" @endif class="form-control form-control-md" placeholder="Я хочу найти...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-md btn-default effect">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="album py-5 mt-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($products as $product)
        <div class="col">
          <div class="card shadow-sm">
            <img class="card-img-top img-fluid" src="{{$product->image}}" alt="Card image cap">
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-success text-md" style="tex; text-transform: none" >
                {{$product->price}}p
              </div>
            </div>
            <div class="card-body">
              <p class="card-text">
                  <h3 class="text-center mb-3">{{$product->title}}</h3>
                  <div class="row">
                      <div class="col-4">
                        <p class="text-black">Состав</p>
                        <p>{{$product->composition}}</p>
                      </div>
                      <div class="col-4">
                            <p class="text-black">Цвет</p>
                            <p>{{$product->color}}</p>
                      </div>
                      <div class="col-4">
                          <p class="text-black">Размер</p>
                          <p>{{$product->size}}</p>
                      </div>
                  </div>
              </p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

@endauth

  @include("include.main.footer")
@endsection

@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

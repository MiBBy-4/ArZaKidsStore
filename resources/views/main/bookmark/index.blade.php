@extends('layout.main.head')
@section('title')
    Закладки
@endsection
@section('css')
    
@endsection
@section('content')
@if ($products)
<section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="{{route('main.index')}}" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Продолжить покупку</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Ваши закладки</p>
                    <p class="mb-0">{{$products->count()}} продукт(-а,-ов) у Вас в закладках</p>
                  </div>
                </div>
                @foreach ($products as $product)
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="{{$product->image}}"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{$product->title}}</h5>
                          <p class="small mb-0">{{$product->color}}, {{$product->composition}}, {{$product->size}}</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 80px;">
                          <h5 class="mb-0">{{$product->price}}</h5>
                        </div>
                        <form action="{{route('bookmark.destroy')}}" method="post">
                            @method('delete')
                            @csrf
                            <button  type="submit" value="{{$product->id}}" name="product_id" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach  
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@else
<section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="{{route('main.index')}}" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Продолжить покупку</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Ваши закладки</p>
                    <p class="mb-0">В данный момент у Вас не товаров в закладках.</p>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

@endsection
@section('js')
    
@endsection
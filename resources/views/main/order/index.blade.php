@extends('layout.main.head')
@section('title')
    Мои заказы
@endsection
@section('css')
    
@endsection
@section('content')
{{Breadcrumbs::render('userOrders')}}
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
                      <p class="mb-1">Ваши заказы</p>
                      <p class="mb-0">{{$ordersProductsCount}} заказанных(-ый) продукт(-а,-ов)</p>
                    </div>
                  </div>
                  @foreach ($userOrders as $order)
                  @foreach ($order->products as $product)
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
                        <div class="ml-3 d-flex flex-row align-items-center">
                          <div style="width: 80px;">
                            <h5 class="mb-0">{{$product->price}}</h5>
                          </div>
                          @if ($order->is_checked)
                          <p class="ml-3 text-success">Подтверждено</p>
                          @else
                          <p class="ml-3">Ожидает подтверждения</p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endforeach  
                </div>
  
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('js')
    
@endsection
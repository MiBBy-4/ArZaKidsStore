@extends('layout.main.head')
@section('title')
    Корзина
@endsection
@section('css')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
{{Breadcrumbs::render('userCart')}}
@include('include.main.sweet')
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
                      class="fas fa-long-arrow-alt-left me-2"></i>Продолжить покупки</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Ваша корзина</p>
                    <p class="mb-0">У Вас {{$products->count()}} продукт(-а,-ов) в Вашей корзине</p>
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
                        <form action="{{route('cart.destroy')}}" method="post">
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
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Оставить заявку на покупку</h5>

                    </div>


                    <form class="mt-4" @if($sum<=0)action="" @else action="{{route('order.store')}}" @endif method="POST">
                        @csrf
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" name="FIO" class="form-control form-control-lg" siez="17"
                          placeholder="Фамилия Имя Отчество" value="{{old('FIO')}}" />
                        <label class="form-label" for="typeName">ФИО</label>
                        @error('FIO')
                        <p class='text-danger'>{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="email" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="example@mail.ru" name="email"  value="{{Auth::user()->email}}" />
                        <label class="form-label" for="typeText">Почта</label>
                        @error('email')
                        <p class='text-danger'>{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-outline form-white mb-4">
                          <input type="tel" id="typeName" name="phone_number" class="form-control form-control-lg" siez="17"
                            placeholder="+375331234567" value="{{old('phone_number')}}" />
                          <label class="form-label" for="typeName">Контактный номер</label>
                          @error('phone_number')
                          <p class='text-danger'>{{$message}}</p>
                          @enderror
                        </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" name="adress" id="typeExp" class="form-control form-control-lg"
                              placeholder="г.Гродно,ул.Пушкина, д.Колотушкина" value="{{old('address')}}" />
                            <label class="form-label" for="typeExp">Адрес</label>
                            @error('address')
                            <p class='text-danger'>{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                      </div>



                      <hr class="my-4">

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Сумма товаров</p>
                        <p class="mb-2">{{$sum}}</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Доставка</p>
                        <p class="mb-2">{{$sum * 0.05}}</p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Общая стоимость</p>
                        <p class="mb-2">{{$sum+$sum*0.05}}</p>
                      </div>

                      <button type="submit" class="btn btn-info btn-block btn-lg" @if($sum<=0) disabled @endif>
                        <div class="d-flex justify-content-between">
                          <span>{{$sum+$sum*0.05}}</span>
                          <span>Заказать <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>
                    </form>
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
                      class="fas fa-long-arrow-alt-left me-2"></i>Продолжить покупки</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Ваша корзина</p>
                    <p class="mb-0">В данный момент у Вас нет товаров в корзине</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Оставить заявку на покупку</h5>

                    </div>


                    <form class="mt-4" action="" method="POST">
                        @csrf
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" name="FIO" class="form-control form-control-lg" siez="17"
                          placeholder="Фамилия Имя Отчество" value="{{old('FIO')}}" />
                        <label class="form-label" for="typeName">ФИО</label>
                        @error('FIO')
                        <p class='text-danger'>{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="email" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="example@mail.ru" name="email"  value="{{Auth::user()->email}}" />
                        <label class="form-label" for="typeText">Почта</label>
                        @error('email')
                        <p class='text-danger'>{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-outline form-white mb-4">
                          <input type="tel" id="typeName" name="phone_number" class="form-control form-control-lg" siez="17"
                            placeholder="+375331234567" value="{{old('phone_number')}}" />
                          <label class="form-label" for="typeName">Контактный номер</label>
                          @error('phone_number')
                          <p class='text-danger'>{{$message}}</p>
                          @enderror
                        </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" name="adress" id="typeExp" class="form-control form-control-lg"
                              placeholder="г.Гродно,ул.Пушкина, д.Колотушкина" value="{{old('address')}}" />
                            <label class="form-label" for="typeExp">Адрес</label>
                            @error('address')
                            <p class='text-danger'>{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                      </div>



                      <hr class="my-4">

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Сумма товаров</p>
                        <p class="mb-2">0</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Доставка</p>
                        <p class="mb-2">0</p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Общая стоимость</p>
                        <p class="mb-2">0</p>
                      </div>

                      <button type="submit" class="btn btn-info btn-block btn-lg" disabled>
                        <div class="d-flex justify-content-between">
                          <span>0</span>
                          <span>Заказать <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>
                    </form>
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

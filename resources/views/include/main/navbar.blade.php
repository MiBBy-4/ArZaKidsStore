<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route("main.index")}}" class="nav-link effect"><h5>ArZa kids</h5></a>
    </li>
    
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 sm:block">
                    @auth
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{ route('cart.index') }}" class="btn"><i class="fas fa-shopping-cart"></i> Корзина</a>
                        <a href="{{ route('bookmark.index') }}" class="btn"><i class="far fa-bookmark"></i></i> Избранное</a>
                        <a href="{{ route('order.index') }}" class="btn"><i class="fas fa-receipt"></i> Заказы</a>
                        <a class="btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                      </div>
                    </li>
                       
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
    </li>
  </ul>
</nav>
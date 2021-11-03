<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('main', function($trail){
    $trail->push('Главная', route('main.index'));
});

Breadcrumbs::for('userCart', function($trail){
    $trail->parent('main');
    $trail->push('Корзина', route('cart.index'));
});

Breadcrumbs::for('userOrders', function($trail){
    $trail->parent('main');
    $trail->push('Заказы', route('cart.index'));
});

Breadcrumbs::for('userBookmarks', function($trail){
    $trail->parent('main');
    $trail->push('Закладки', route('cart.index'));
});

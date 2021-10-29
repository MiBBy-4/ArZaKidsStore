@if(Session::has('cartSuccess'))
 <script>
    swal({
        title: "Товар успешно добавлен.",
        text: "Вы сделали отличный выбор!",
        icon: "success",
        button: "Спасибо!",
    });
 </script>
@endif

@if (Session::has('cartDestroy'))
<script>
    swal({
        title: "Товар удален из вашей корзины.",
        text: "Думаю, что Вам стоит продолжить покупки!",
        icon: "success",
        button: "Спасибо!",
    });
</script>
@endif


@if (Session::has('bookmarkSuccess'))
<script>
    swal({
        title: "Товар успешно сохранен.",
        text: "Ждем не дождемся, когда Вы решитесь приобрести данный продукт!",
        icon: "success",
        button: "Спасибо!",
    });
</script>
@endif

@if (Session::has('bookmarkDestroy'))
<script>
    swal({
        title: "Товар больше не у Вас в сохраненных.",
        text: "Ничего страшного, мы не сильно обиделись!",
        icon: "success",
        button: "Спасибо!",
    });
</script>
@endif

@if (Session::has('orderSuccess'))
<script>
    swal({
        title: "Покупка совершена успешно.",
        text: "Мы отправили Вам сообщение на указанную почту, где Вы можете подробнее ознакомиться. Ожидайте подтверждения от администрации!",
        icon: "success",
        button: "Спасибо!",
    });
</script>
@endif


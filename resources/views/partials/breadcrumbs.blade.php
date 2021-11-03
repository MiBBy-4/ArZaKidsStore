@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb" style="background-color: transparent">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item"><a style="text-decoration: none; color: whitesmoke;" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item active" style="color: rgba(255, 255, 255, 0.164)">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>
@endunless
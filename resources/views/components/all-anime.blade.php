<div class="container row mx-auto">
    @foreach ($anime as $item)
        <div class="col-md-4 col-sm-12 pt-2">
            <div class="card" style="width: 18rem;">

                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top anime-img" alt="{{ $item->name }}">
                <div class="card-body theme">
                    <a href="anime/{{ $item->url }}" style="text-decoration: none;">
                        <h5 class="card-title">{{ $item->name }}</h5>
                    </a>
                    <p class="card-text">
                        Студия: <a href="">{{ $item->studio }}</a><br>
                        Статус: {{ $item->state }}<br>
                        Год: {{ date('Y', strtotime($item->date)) }}<br>
                        Жанры: 
                        @foreach (json_decode($item->genre) as $key => $genre)
                            @if ($key === array_key_last(json_decode($item->genre)))
                                <a href="{{ route('main') . '?genre=' . $genre }}">{{ $genre }}</a>
                            @else
                                <a href="{{ route('main') . '?genre=' . $genre }}">{{ $genre }}, </a>
                            @endif
                        @endforeach
                    </p>
                </div>

            </div>
        </div>
    @endforeach
</div>

<div class="container p-5">{{ $anime->links('vendor.pagination.bootstrap-5') }}</div>

<div class="container row mx-auto">

    @foreach ($anime as $item)
        <div class="col-md-4 col-sm-12 pt-2">
            <div class="card" style="width: 18rem;">
                <a href="anime/{{ $item->url }}" style="text-decoration: none;">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top anime-img"
                        alt="{{ $item->name }}">
                    <div class="card-body theme">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">
                            Студия: {{ $item->studio }}<br>
                            Статус: {{ $item->state }}<br>
                            {{ date('Y', strtotime($item->date)) }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>

<div class="container p-5">{{ $anime->links('vendor.pagination.bootstrap-5') }}</div>

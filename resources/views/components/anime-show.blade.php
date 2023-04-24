<div class="container theme mx-auto">
    @foreach ($anime as $item)
        <div class="row pt-5">
            <div class="col-3">
                <img src={{ asset('storage/' . $item->image) }} alt="{{ $item->name }}" style="width:100%">
            </div>
            <div class="col-9">
                <h1>{{ $item->name }}</h1>
                <p>Студия: {{ $item->studio }}</p>
                <p>Состояние: {{ $item->state }}</p>
            </div>
        </div>
    @endforeach
</div>

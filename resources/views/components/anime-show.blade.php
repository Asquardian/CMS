<div class="container theme mx-auto">
    @foreach ($anime as $item)
        <div class="row pt-5">
            <div class="col-3">
                <img src={{ asset('storage/' . $item->image) }} alt="{{ $item->name }}" style="width:100%">
            </div>
            <div class="col-9">
                <h1>{{ $item->name }}</h1>
                <div class="row">
                    <p class="col-6">Студия:</p> <p class="col-6">{{ $item->studio }}</p>
                    <p class="col-6">Состояние:</p> <p class="col-6">{{ $item->state }}</p>
                </div>
            <p>
                <a class="btn btn-primary">Добавить информацию</a>
            </p>
            </div>
        </div>
    @endforeach
</div>

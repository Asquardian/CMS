<div class="container theme mx-auto">
    @foreach ($anime as $item)
        <div class="row pt-5">
            <div class="col-3">
                <img src={{ asset('storage/' . $item->image) }} alt="{{ $item->name }}" style="width:100%">
            </div>
            <div class="col-9">
                <h1>{{ $item->name }}</h1>
                <div class="row">
                    <p class="col-6">Студия:</p>
                    <p class="col-6">{{ $item->studio }}</p>
                    <p class="col-6">Состояние:</p>
                    <p class="col-6">{{ $item->state }}</p>
                    <p class="col-6">Жанры:</p>
                    <p class="col-6">
                        @foreach (json_decode($item->genre) as $key => $genre)
                            @if ($key === array_key_last(json_decode($item->genre)))
                                <a href="{{ route('main') . '?genre=' . $genre }}">{{ $genre }}</a>
                            @else
                                <a href="{{ route('main') . '?genre=' . $genre }}">{{ $genre }}, </a>
                            @endif
                        @endforeach
                    </p>
                    <p class="col-6">Дата выхода:</p>
                    <p class="col-6">
                        <?php
                        $formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG, IntlDateFormatter::LONG);
                        $formatter->setPattern('d MMMM yyyy');
                        echo $formatter->format(new DateTime($item->date)); ?>
                    </p>
                </div>
                <p>
                    <a class="btn btn-primary">Добавить информацию</a>
                </p>
            </div>
        </div>
    @endforeach
</div>

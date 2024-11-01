<x-layout title="Séries">
    <a href="{{ route('series.create')}}">Adicionar</a>
    <ul>
        @foreach ($series as $serie)
        <a href="{{ route('seasons.index', $serie->id) }}">
            {{ $serie->name }}
        </a>
            <form action="{{ route('series.destroy', $serie->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button>X</button>
                <a href="{{ route('series.edit', $serie->id)}}">
                    E
                </a>
            </form>
        @endforeach
    </ul>
</x-layout>

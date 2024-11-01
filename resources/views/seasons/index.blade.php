<x-layout title="Séries">
    <ul>
        @foreach ($seasons as $season)
        Tempoarada - {{ $season->number }}
        <span>
            Episódios {{ $season->episodes->count() }}
        </span>
        <br>
        @endforeach
    </ul>
</x-layout>

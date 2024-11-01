<x-layout title="Nova Séries">
    <form action="{{ route('series.store') }}" method="POST">
        @csrf
        <label for="name" class="font-bold text-2xl">nome</label>
        <input
            type="text"
            id="name"
            autofocus
            name="name"
            @isset($name)
                value="{{ $name }}"
            @endisset/>
        <label for="seasonsQty" class="font-bold text-2xl">Temporadas</label>
        <input
            type="text"
            id="seasonsQty"
            name="seasonsQty"
            @isset($name)
                value="{{ $name }}"
            @endisset/>
        <label for="episodes" class="font-bold text-2xl">Episodios / Temporada</label>
        <input
            type="text"
            id="episodes"
            name="episodes"
            @isset($name)
                value="{{ $name }}"
            @endisset/>
        <button type="submit">Enviar</button>
    </form>
</x-layout>

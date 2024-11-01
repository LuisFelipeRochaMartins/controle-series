<form action="{{ $action }}" method="POST">
    @isset($update)
        @method('PUT')
    @endisset
    @csrf
    <label for="name" class="font-bold text-2xl">nome</label>
    <input type="text" id="name" name="name"/ @isset($name) value="{{ $name }}" @endisset/>

    <button type="submit">Enviar</button>
</form>

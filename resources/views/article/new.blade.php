articolo

<form action="{{route('article.create')}}">
    @csrf
    @method('POST')
    <label for="name">name</label>
    <input type="text" name="name" id="name">
</form>

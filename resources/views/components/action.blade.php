<a href="{{ $href ?? '' }}" class="btn btn-warning">Edit</a>
<form action="{{ $action ?? '' }}" method="post" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>

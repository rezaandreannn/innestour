<a href="{{ $href ?? '' }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ $action ?? '' }}" method="post" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>

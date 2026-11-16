<a href="{{ route($route . '.edit', $id) }}" class="btn btn-sm btn-warning" title="Edit">
    <i class="bi bi-pencil-square"></i>
</a>
<form action="{{ route($route . '.destroy', $id) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Yakin hapus data ini?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" title="Hapus"><i class="bi bi-trash"></i></button>
</form>

<td>

    @can('update-'.$model->getTable())
    <a href="{{ route('admin.' . $model->getTable() . '.edit', $id) }}" class="btn  px-2 me-2">
        <i class="fal fa-edit"></i>
    </a>
    @endcan

    @can('delete-'.$model->getTable())
    <form action="{{ route('admin.' . $model->getTable() . '.destroy', $id) }}" method="post"
        style="display: inline-block;">
        @method('DELETE')
        @csrf

        <a href="#" class="btn text-danger px-2 me-2 deleteBtn">
            <i class="fal fa-trash"></i>
        </a>
    </form>
    @endcan

</td>

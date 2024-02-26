<td>{{ $discount->id }}</td>
<td>{{ $discount->title }}</td>
<td>{{ $discount->discount_percent }}%</td>
<td>
    {{ $discount->created_at }}
</td>
<td>
    {{ $discount->updated_at }}
</td>
<td>
    @if(hasPermission('PUT'))
        <a onclick="showEditModal({{ $discount->id }})" class="btn btn-primary">
            <i class="fa fa-edit"></i> Sửa
        </a>
    @endif
    @if(hasPermission('DELETE'))
        <button onclick="deleteCategory({{ $discount->id }})" type="button" class="btn btn-danger">
            <i class="fa fa-trash"></i> Xóa
        </button>
    @endif
</td>

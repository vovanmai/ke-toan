<tr class="tr-discount-{{$discount->id}}">
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
            <button onclick="deleteDiscount({{ $discount->id }})" type="button" class="btn btn-danger">
                <i class="fa fa-trash"></i> Xóa
            </button>
        @endif
    </td>
</tr>

@push('script')
    <script>
        function deleteDiscount (id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Có',
                confirmButtonColor: 'green',
                cancelButtonText: 'Không',
                width: 400,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'delete',
                        dataType: "JSON",
                        url: `/admin/discounts/${id}`,
                        success: function(response)
                        {
                            toastr.success(response.message, 'Thành công');
                            $(`.tr-discount-${id}`).remove()
                        },
                        error: function(error) {
                            toastr.error(error.responseJSON.message, 'Lỗi');
                        }
                    });
                }
            })
        }
    </script>
@endpush

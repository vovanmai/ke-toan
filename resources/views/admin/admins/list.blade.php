<tbody>
    @if($admins->isNotEmpty())
        @foreach($admins as $key => $admin)
            <tr class="tr-admin-{{$admin->id}}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $admin->name }}</td>
                <td>
                    {{ $admin->email }}
                </td>
                <td style="text-align: center">
                    @if($admin->avatar)
                        <img style="height: 50px; width: 50px; object-fit: cover; border-radius: 50%" src="{{ $admin->avatar['url'] ?? '' }}" alt="">
                    @endif
                </td>
                <td>
                    @if ($admin->role == \App\Models\Admin::ROLE_SUPPER_ADMIN)
                        <span class="badge bg-red">{{ $admin->role_name }}</span>
                    @elseif ($admin->role == \App\Models\Admin::ROLE_ADMIN)
                        <span class="badge bg-green">{{ $admin->role_name }}</span>
                    @elseif ($admin->role == \App\Models\Admin::ROLE_EDITOR)
                        <span class="badge bg-yellow">{{ $admin->role_name }}</span>
                    @else
                        <span class="badge bg-success">{{ $admin->role_name }}</span>
                    @endif
                </td>
                <td class="is-active text-center">
                    @if($admin->active)
                        <img onclick="changeActive({{ $admin->id }}, 0)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/active.jpg" alt="">
                    @else
                        <img onclick="changeActive({{ $admin->id }}, 1)" style="height: 28px; width: 28px; cursor: pointer" src="/assets/admin/dist/img/inactive.png" alt="">
                    @endif
                </td>
                <td>
                    {{ $admin->login_at ? getTimeAgo($admin->login_at) : null }}
                </td>
                <td>
                    {{ $admin->created_at }}
                </td>
                <td>
                    {{ $admin->updated_at }}
                </td>
                <td>
                    <a href="{{ route('admin.admin.edit', ['id' => $admin->id]) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    {{--<button onclick="deleteAdmin({{ $admin->id }})" type="button" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Xóa
                    </button>--}}
                </td>
            </tr>
        @endforeach
    @else
    <tr>
        <td colspan="10" class="text-center">
            <span>Không có dữ liệu</span>
        </td>
    </tr>
    @endif
    <tr>
        <td colspan="10">
            <div class="text-right">{!! $admins->links() !!}</div>
        </td>
    </tr>
</tbody>

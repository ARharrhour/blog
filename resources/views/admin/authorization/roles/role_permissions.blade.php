<x-admin>
    @section('content')
        <div class="col">
            <h1>role permissions</h1>
            <div class="table-responsive my-5">
                <table class="table table-bordered text-center" id="dataTable">
                    <thead>
                        <tr>
<th class="text-center">role</th>
<th colspan="3" class="text-center">permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="{{ $permissions->count() }}" class="text-center align-middle">{{$role->name }}
                            </th>

                            <td><input type="checkbox" class="rolePermission"  value={{ $permissions->first()->id }}
                                    @if ($role->roleHasPermission($permissions->first()->name)) {{ 'checked' }} @endif> {{$permissions->first()->name }}
                            </td>
                            <td>
                                <form
                                    action="{{ route('role.permissions.attach', [$permissions->first()->id, $role->id]) }}"
                                    method='post'>
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-primary"
                                        @if ($role->roleHasPermission($permissions->first()->name)) {{ 'disabled' }} @else {{ '' }} @endif>attach</button>
                                </form>
                            </td>
                            <td>
                                <form
                                    action="{{ route('role.permissions.detach', [$permissions->first()->id, $role->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger"
                                        @if (!$role->roleHasPermission($permissions->first()->name)) {{ 'disabled' }} @else {{ '' }} @endif>detach</button>
                                </form>
                            </td>
                        </tr>
                        @foreach ($permissions->skip(1) as $permission)
                            <tr>
                                <td colspan=""><input type="checkbox" class="rolePermission" value={{ $permission->id }}
                                        @foreach ($role->permissions as $permissionRole) @if ($permissionRole->name == $permission->name)
                                            {{ 'checked' }}
                                         @endif @endforeach> {{$permission->name }}
                                </td>
                                <td>
                                    <form action="{{ route('role.permissions.attach', [$permission->id, $role->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary"
                                            @if ($role->roleHasPermission($permission->name)) {{ 'disabled' }} @else @endif>attach</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('role.permissions.detach', [$permission->id, $role->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger"
                                            @if ($role->roleHasPermission($permission->name)) {{ '' }} @else {{ 'disabled' }} @endif>detach</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>


        </div>
    @endsection
</x-admin>

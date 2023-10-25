<x-admin>
    @section('content')
        <div class="col">

            <h1>roles </h1>

            <div class="row">
                <div class="col-md-6 col-12">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Role</label>
                            <input type="text" name="role" id="" class="form-control text-capitalize"
                                placeholder="enter a role name">

                        </div>
                        <button type="submit" class="btn btn-primary">create</button>
                    </form>
                    @if (isset($role))
                        <form action="{{ route('role.update', $role->id) }}" class="my-4" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Role edit</label>
                                <input type="text" name="role_edit" id="" class="form-control text-capitalize"
                                    value="{{ $role->name }}">

                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    @else
                        {{ '' }}
                    @endif


                </div>
                <div class="col-md-6 col-12">
                    <table class="table table-bordred bg-white">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                @if (auth()->user()->userHasRole('admin'))
                                <th>delete</th>
                                @endif
                                <th>update</th>
                                <th>permissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>


@if (auth()->user()->userHasRole('admin'))


                                        <td>
                                            <form action="{{ route('role.delete', $role->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger">delete</button>
                                            </form>

                                        </td>

    @endif
                                        <td><a href="{{ route('role.edit', $role) }}"
                                                class="btn btn-success">update</a></td>
<td><a href="{{route('role.permissions',$role->id)}}" class="btn btn-warning">permissions</a></td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    @endsection
</x-admin>

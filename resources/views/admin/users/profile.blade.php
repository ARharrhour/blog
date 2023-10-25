<x-admin>
    @section('content')
        <div class="col">

            <form action="{{ route('user.update', auth()->user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="fullname">full name</label>
                    <input type="text" name="fullname" class="form-control" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control" value="{{ auth()->user()->username }}">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">new password</label>
                    <input type="password" name="newpassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">confirm new password</label>
                    <input type="password" name="confirmpassword" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>



            </form>
            <div class="row my-3">
                <div class="col">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>role</th>
                                    <th>attach</th>
                                    <th>detach</th>
                                    {{-- <th>delete</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value={{$role->id}} @if (auth()->user()->userHasRole($role->name))
{{"checked"}}
                                            @endif>
                                        </td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <form action="{{route('role.attach',$role->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                                <button type="submit" class="btn btn-success" @if (auth()->user()->userHasRole($role->name))
{{"disabled"}}
                                                @endif>attach</button>
                                            </form>
                                        </td>
                                         <td>
                                            <form action="{{route('role.detach',$role->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                                <button type="submit" class="btn btn-secondary " @if (!auth()->user()->userHasRole($role->name))
{{"disabled"}}
                                                @endif >detach</button>
                                            </form>
                                        </td>
                                         {{-- <td>
                                            <form action="{{route('userRoleDelete',$role->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin>

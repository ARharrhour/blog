<x-admin>
    @section('content')
        <!-- DataTales Example -->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">Users Informations</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>


                                <tr>

                                    <th>id</th>
                                    <th>full name</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>created at</th>
                                    <th>updated at</th>
                                    @can('delete',auth()->user())
<th>delete</th>
                                    @endcan


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        @can('delete',auth()->user())
                                            <td>
                                                <form action="{{ route('user.delete', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">delete</button>
                                                </form>
                                            </td>

                                        @endcan


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mx-auto">{{ $users->links() }}</div>
                </div>

            </div>
        </div>
    @endsection
</x-admin>

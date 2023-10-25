<x-admin>
    @section('content')
        <div class="col">

            <h1>categories </h1>

            <div class="row">
                <div class="col-md-6 col-12">
                    <form action="{{ route('category.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" name="category" id="" class="form-control text-capitalize"
                                placeholder="enter a category name">

                        </div>
                        <button type="submit" class="btn btn-primary">create</button>
                    </form>
                    @if (isset($category))
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" name="category_edit" id="" class="form-control text-capitalize"
                                    value="{{ $category->name }}">

                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    @else
                        {{ '' }}
                    @endif


                </div>
                <div class="col-md-6 col-12">
                    <div class="table-responsive">
                    <table class="table table-bordred" id="dataTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                @if (auth()->user()->userHasRole('admin'))
                                    <th>delete</th>
                                @endif
                                <th>update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>


                                    @if (auth()->user()->userHasRole('admin'))
                                        <td>
                                            <form action="{{ route('category.delete', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger">delete</button>
                                            </form>

                                        </td>
                                    @endif
                                    <td><a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-success">update</a></td>




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

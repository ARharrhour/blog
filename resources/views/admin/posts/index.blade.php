<x-admin>
    @section('content')
        <!-- DataTales Example -->
        <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->has('createFeedBack'))
                {{session('createFeedBack')}}
                @else
{{"not created"}}
                @endif
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <form action="{{route('bulk.delete')}}" method="post">
@csrf
@method('DELETE')
<select name="checkboxes" id="">
    <option value="delete">delete</option>
</select>
<button type="submit" class="btn btn-danger">delete</button>
                  <div class="table-responsive my-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                        <thead>

                            <tr>
                                <th><input type="checkbox"  class="checkboxesAll"></th>
                                <th>title</th>
                                <th>author</th>
                                <th>body</th>
                                <th>post image</th>
                                <th>created at</th>
                                <th>updated at</th>
                                <th>deleted</th>
                                <th>update</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><input type="checkbox"  class="checkboxesAll"></th>
                                <th>title</th>
                                <th>author</th>
                                <th>body</th>
                                <th>post image</th>
                                <th>created at</th>
                                <th>updated at</th>
                                 <th>deleted</th>
                                <th>update</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post )


                            <tr>
                                <td><input type="checkbox" name="checkboxes[]" class="checkboxitem" value="{{$post->id}}"></td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{illuminate\Support\Str::limit($post->body,120,'...')}}</td>
                                <td><img src="{{$post->post_image}}" class="img img-fluid" alt=""> </td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                               @can('delete',$post)
                                <td>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-capitalize">delete</button>
                                        </form>


                                    </td>
                                    @endcan
                                    @can('edit',$post)
                                    <td>

                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-success text-capitalize">update</a>



                                    </td>
                                    @endcan


                            </tr>     @endforeach
                        </tbody>

                    </table>
                </div>
            </form>
            </div>
<div class="d-flex">
     <div class="mx-auto">{{$posts->links()}}</div>
            </div>

        </div> </div>




    @endsection
</x-admin>

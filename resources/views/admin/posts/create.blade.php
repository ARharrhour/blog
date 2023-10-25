<x-admin>
    @section('content')
<div class="col">
     <h1>create</h1>
        {{-- @if (session()->has('successCreateFeedBack'))
                  <div class="alert alert-success">{{ session('successCreateFeedBack') }}</div>
                @elseif(session()->has('failedCreateFeedBack'))
                  <div class="alert alert-danger"> {{ session('failedCreateFeedBack') }}</div>
                @else
                {{""}}
                    @endif --}}
 <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
 @csrf
 <div class="form-group">
     <label for="title">Title</label>
     <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="enter title" >

 </div>
 <div class="form-group">
    <label for="file">File</label>
    <input type="file" name="post_image" class="form-control" id="admin_post_image"  placeholder="">
 </div>
  <div class="form-group">
    <textarea name="body" id="texteditor" class="form-control" cols="30" rows="10"></textarea>
 </div>

 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    @endsection
</x-admin>

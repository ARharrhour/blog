
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Post</span>
        </a>
        <div id="collapsePosts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts:</h6>
            <a class="collapse-item" href="{{route('posts.index')}}">View all posts</a>
            <a class="collapse-item" href="{{route('post.create')}}">create post</a>
          </div>
        </div>
      </li>

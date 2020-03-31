<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;"> 
        <a class="navbar-brand" href="/">は・ら・る</a>
        @if (Auth::check())
        <form method="GET" action="/">
            <input type="text" name="keyword">
            <input type="submit" value="Search">
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-md-auto align-items-center">
            <li class="nav-item"><a href="/posts/new" class="nav-link">Post</a></li>
            <li class="nav-item"><a href="/users/{{ Auth::user()->id }}" class="nav-link">My Profile</a></li>
            <li class="nav-item"><a href="/users/index" class="nav-link">Users</a></li>
          </ul>
        </div>
        @endif
    </nav>
</header>



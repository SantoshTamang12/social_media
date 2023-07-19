<div class="container-fluid" style="max-width:90%!important">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/profile/{{ Auth::user()->image }}" width="50" height="50" class="rounded-circle"
                    onerror="this.onerror=null; this.src='/profile/avatar.jpg'">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('profile', $id = auth()->user()->id) }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/createpost">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method='post'>
                            @csrf
                            <button type="submit" class="btn btn-success">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

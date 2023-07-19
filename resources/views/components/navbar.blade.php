<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>

<body>
    <header class="bg-dark text-white py-3 fixed-top px-5">
        <div class="p-x-5" style="font-size:15px">
            <nav class="navbar navbar-expand-lg navbar-dark" style="padding:0;">
                <a class="navbar-brand" href="/home" style="font-size:15px">
                    <img src="" width="30" height="30" padding="2%"class="rounded-circle"
                        onerror="this.onerror=null; this.src='/profile/avatar.jpg'">
                    Social Media
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/follower" style="color:white;">Follower</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/message" style="color:white;">Messages</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="color:white;">
                                Post
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/createpost">Create New Post</a></li>
                                <li><a class="dropdown-item" href=/viewmypost>View All post</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/notification" style="color:white;">Notifications</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="color:white;">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('profile', $id = auth()->user()->id) }}">profile</a></li>
                                <li class="dropdown-item">
                                    <form action="{{ route('logout') }}" method='post'>
                                        @csrf
                                        <button type="submit"
                                            style="border: none; background:transparent;padding:0;">Logout</button>
                                        {{-- <a href="{{ route('logout') }}">Logout</a> --}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</body>

</html>

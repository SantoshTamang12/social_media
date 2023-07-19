    @extends('components.template')
    @section('content')
        <br>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style1.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
            rel="stylesheet">
        <script src="css/main.js" defer></script>
        @if (session('message'))
            <div class="alert alert-success" role="alert" style="text-align:center">{{ session('message') }}</div>
        @endif

        @foreach ($createposts as $key => $createpost)
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card" style="width: 700px; {{ $key == 0 ? ' margin-top:50px' : '' }}"><br>
                            <div class="container">
                                <a class="navbar-brand">
                                    <img src="/profile/{{ $createpost->user->image }}" width="50" height="50"
                                        class="rounded-circle" onerror="this.onerror=null; this.src='/profile/avatar.jpg'">
                                    <p style="margin-top:-44px; margin-left:58px;">{{ $createpost->user->name }}</p>
                                </a>
                                <div class="posttime">
                                    <p class="text-sm text-muted">
                                        {{ $createpost->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="message">
                                    <p>{{ $createpost->message }}</p>
                                </div>
                                <img src="postimage/{{ $createpost->image }}" class="card-img-top"
                                    style="hight:75px; width:680px;" alt="">
                                <form action="{{ route('like.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $createpost->id }}">
                                    <div class="like-button">
                                        <div class="heart-bg">
                                            <button class="heart-icon {{ $createpost->userLiked ? 'liked' : '' }}"
                                                style="border: none"></button>
                                        </div>
                                        <div class="likes-amount">{{ $createpost->likes->count() }}</div>
                                </form>
                                <button type="button" class="comment-icon ms-3 border-0 bg-transparent">
                                    <i class="bi bi-chat-dots"></i>
                                </button>
                                <div class="likes-amount" style="margin-left: 10px">{{ $createpost->comments->count() }}
                                </div>
                            </div>
                            <div class="row d-none" class="comment-container" style="height:315px;overflow-y:scroll">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                        <div class="card-body p-4 pb-0">
                                            @foreach ($createpost->comments ?? [] as $comment)
                                                <div class="card mb-4">
                                                    <div class="card-body pb-0" style="max-height: 5%;">
                                                        <div class="row">
                                                            <div class="d-flex justify-items-center">
                                                                <img class="profile-image"
                                                                    src="/profile/{{ $comment->user->image }}"
                                                                    onerror="this.onerror=null; this.src='/profile/avatar.jpg'"
                                                                    style="vertical-align: middle;width: 30px;height: 30px;border-radius: 50%;margin-right:10px!important">
                                                                <p>{{ $comment->comment }}</p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p class="text-sm text-muted" style="font-size:13px">
                                                                    {{ $comment->user->name }}
                                                                </p>
                                                            </div>
                                                            <div class="float-right">
                                                                <p class="text-sm text-muted" style="font-size:10px">
                                                                    {{ $comment->created_at->diffForHumans() }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex">
                                <div class="comment-box">
                                    <form action="{{ route('comment.store', $createpost->id) }}" method="post">
                                        @csrf
                                        <textarea class="form-control my-3" rows="3" id="comment" name="comment" placeholder="Write a comment..."
                                            required></textarea>
                                        <button class="btn btn-primary mt-2" type="submit" value="save">Post</button>
                                    </form>
                                </div>
                            </div><br>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <br>
        @endforeach
        <br><br>
    @endsection

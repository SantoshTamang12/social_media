@extends('components.template')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    @if (session('message'))
        <div class="alert alert-success" role="alert" style="text-align: center">{{ session('message') }}</div>
    @endif
    @foreach ($users as $user)
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card" style="width: 700px; margin-top:80px;">
                        <div class="container">
                            {{-- <a class="navbar-brand"> --}}
                            <img src="/profile/{{ Auth::user()->image }}" class="rounded-circle"
                                style="margin-top:10px;"width="50" height="50"
                                onerror="this.onerror=null; this.src='/profile/avatar.jpg'">
                            <p style="margin-top:-43px; margin-left:58px;">{{ Auth::user()->name }}</p>
                            {{-- </a> --}}
                            <div class="card-body">
                                <p class="card-text">{{ $user->message }}</p>
                            </div>

                            <img src="postimage/{{ $user->image }}" class="card-img-top"
                                style="hight:75px; width:680px;"alt=""><br>
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <a href="/updatepost/{{ $user->id }}">
                                        <button type="success" class="btn btn-success" style="margin-left: -6px;">Edit
                                            Post</button>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <a href="/deletepost/{{ $user->id }}">
                                        <button type="button" class="btn btn-danger" style="margin-right: -17px;">Delete
                                            Post</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    @endforeach
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

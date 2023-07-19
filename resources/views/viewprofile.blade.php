@extends('components.template')
<br><br><br>
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    @if (session('message'))
        <div class="alert alert-success" role="alert" align="center">{{ session('message') }}</div>
    @endif
    <br>
    <div class="profile-card" width="700px;">
        <img class="profile-image" src="/profile/{{ $value->image }}"
            onerror="this.onerror=null; this.src='/profile/avatar.jpg'">
        <div class="profile-details">
            <div class="profile-name">{{ $value->name }}</div>
            <div class="profile-email">Email: {{ $value->email }}</div>
            <div class="profile-number">Phone: {{ $value->number }}</div>
            <div class="profile-bio">
                Bio: {{ $value->bio }}
            </div>
            <div class="profile-link">
                Link: <a href="{{ $value->link }}" target="_blank">{{ $value->link }}</a>
            </div><br>
            <a href="/updateprofile/{{ $value->id }}">
                <button type="button" class="btn btn-success">Update Now</button>
            </a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

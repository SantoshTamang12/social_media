    @extends('components.template')
    <br><br><br>
    @section('content')
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        @if (session('message'))
            <div class="alert alert-success" role="alert" align="center">{{ session('message') }}</div>
        @endif <br>
        <h2 style="text-align:center">Create a Post</h2><br>
        <form class="form" action="{{ route('createpost') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <input type = "hidden" name= "user_id" value ="{{ Auth::user()->user_id }}"/> --}}
            {{-- <input type = "hidden" name= "email" value ="{{ Auth::user()->email }}"/> --}}
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Enter your message"></textarea>

            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            <input type="submit" value="save">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    @endsection

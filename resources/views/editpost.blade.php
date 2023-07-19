<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		form {
			background-color: #fff;
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		input[type="text"], input[type="email"], textarea, input[type="file"] {
			padding: 10px;
			width: 100%;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 20px;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    @if (session('message'))
    <div class="alert alert-success" role="alert" align="center">{{ session('message') }}</div>
@endif
<h2 align="center">Edit Post</h2>
	<form action="{{ route('editpost', ['id'=> $value->id]) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type = "hidden" name= "name" value ="{{ Auth::user()->name }}"/>
        <input type = "hidden" name= "email" value ="{{ Auth::user()->email }}"/>
		<label for="message">Message</label>
		<textarea id="message" name="message" value="">{{ $value->message}}</textarea>

		<label for="image">Image</label>
		<input type="file" id="image" name="image" accept="image/*" value="{{ old('image', $value->image) }}">
        {{-- <p>{{ $value->image }}</p> --}}
        <img src="/postimage/{{ $value->image }}" alt="" class="rounded-circle" width="100">
          <br><br>
		<input type="submit" value="Update">
        {{-- <button type="submit" value="save" class="btn btn-danger">Upload</button> --}}
	</form>
</body>
</html>

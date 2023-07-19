<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
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
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        input[type="file"] {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    @if (session('message'))
        <div class="alert alert-success" role="alert" align="center">{{ session('message') }}</div>
    @endif
    <h2 align="center">Update your Profile</h2>
    <form action={{ route('editprofile', ['id' => auth()->user()->id]) }} method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <label for="name">Username</label>
        <input type="text" id="name" value="{{ Auth::user()->name }}" name="name">
        <label for="number">Number</label>
        <input id="number" value="{{ Auth::user()->number }}" name="number" maxlength=10
            placeholder="Enter Number"><br><br>
        <label for="bio">Bio</label>
        <input type="text" id="bio" value="{{ Auth::user()->bio }}" name="bio" placeholder="Write Bio">
        <label for="link">Link</label>
        <input type="link" id="link" value="{{ Auth::user()->link }}" name="link"
            placeholder="Please enter full URL"><br><br>
        <label for="image">Profile picture</label>
        <input type="file" id="image" name="image" accept="image/*">
        <img src="/profile/{{ Auth::user()->image }}" alt="" class="rounded-circle" width="100"><br><br>

        <button type="submit" value="save" class="btn btn-success">Update</button>
    </form>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>

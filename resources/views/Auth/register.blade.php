<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="register-form">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('fail'))
                <div class="alert alert-danger">{{ session('fail') }}</div>
            @endif
            @csrf
            <label for="name">Username</label>
            <input type="text" id="name" value="" name="name" placeholder="Enter your username"
                required>
            <label for="email">Email</label>

            <input type="email" id="email" value="" name="email" placeholder="Enter your email" required>
            <label for="password">Password</label>
            <input type="password" id="password" value="" name="password" placeholder="Enter your password"
                required>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" value="" name="confirm_password"
                placeholder="Confirm your password" required>
            <button type="submit" value="save" class="btn btn-success">Register</button>
            <a href="/login">Already Registeerd! Login Here.</a>
        </form>
        <script>
            @if (session('success'))
                toastra.options = {
                    "closeButton" = true,
                    "progressbar" = true,
                }
                toastra.success("{{ session('success') }}")
            @endif
        </script>
    </div>

</body>

</html>

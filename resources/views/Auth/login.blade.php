<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="login-form">
        @if (session('message'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
        @endif
        <h2>Login</h2>
        <form action="/login" method="post" enctype="multipart/form-data">
            @csrf
            <label for="email">Email</label>
            <input type="text" id="email" value="" name="email" placeholder="Enter your email" required>
            <label for="password">Password</label>
            <input type="password" id="password" value="" name="password" placeholder="Enter your password"
                required>
            <button type="submit" valeu="">Login</button><br><br>
            <a href="/register">New User!! Register Here.</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

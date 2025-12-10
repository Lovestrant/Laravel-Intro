<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>

    {{-- If user is logged in --}}
    @auth
        <div>
            <h1 style="text-align: center">Welcome, {{ auth()->user()->name }}!</h1>
            <form action="/logout" method="POST" style="text-align: center">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    
    {{-- If user is NOT logged in --}}
    @else
        <div style="text-align: center;">
            <h1>Welcome, You are not logged in!</h1>

            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="email" type="email" placeholder="Email" required><br><br>
                <input name="password" type="password" placeholder="Password" required><br><br>
                <button type="submit">Login</button>
            </form>
        </div>
    @endauth


    <hr><br>

    {{-- Registration Form (visible to everyone) --}}
    <div class="container">
        <div>
            <form action="/register" method="POST" style="text-align: center">
                @csrf
                <h2>Register</h2>
                <input name="name" type="text" placeholder="Name" required/><br><br>
                <input name="email" type="email" placeholder="Email" required/><br><br>
                <input name="password" type="password" placeholder="Password" required/><br><br>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>

</body>
</html>

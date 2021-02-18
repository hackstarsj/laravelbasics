<html>
    <head>
    <title>Login Page</title>
    </head>
    <body>
        <form method="post" action="{{ route('userloginprocess') }}">
        @csrf
        <h2>Login Page</h2><br>
        <input type="text" name="username" value="" placeholder="Username"><br>
        <input type="password" name="password" value="" placeholder="Password"><br>
        <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>
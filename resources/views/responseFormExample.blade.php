<html>
<head>
</head>
<body>
<h2>Response Form {{$title}} SUBTITLE : {{$subtitle}}</h2>
<form action="" method="post">
    @csrf
    <label>
    Name : 
    </label>
    <input type="text" name="personName" value="{{ old('personName') }}"/><br>
    <button type="submit">SUBMIT</button>
    @if(session("validation"))
        <p>{{ session("validation") }}</p>
    @endif
</form>
</body>
</html>
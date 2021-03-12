<html>
<head>
</head>
<body>
<h2>Request Form Example</h2>

<br>
<form action="" method="post">
    @csrf
    <label>
    Name : 
    </label>
    <input type="text" name="personName"/><br>
    <label>
    Username : 
    </label>
    <input type="text" name="username"/><br>
    <label>
    Email : 
    </label>
    <input type="text" name="email"/><br>
    <label>
    Password : 
    </label>
    <input type="text" name="password"/><br>
    <label>
    AGE : 
    </label>
    <input type="text" name="age"/><br>

    <h4>Products</h4>
    <input type="text" name="products[]"/><br>
    <input type="text" name="products[]"/><br>
    <input type="text" name="products[]"/><br>
    <input type="text" name="products[]"/><br>
    <button type="submit">SUBMIT</button>
</form>
<h2>Another Form</h2>
<form action="/requestExampleFormSave2" method="post" enctype="multipart/form-data">
    @csrf
    <label>
    Name : 
    </label>
    <input type="text" name="personName"/><br>
    <label>
    Username : 
    </label>
    <input type="text" name="username" value="{{ old('email') }}"/><br>
    <label>
    Email : 
    </label>
    <input type="text" name="email" value="{{ old('email') }}"/><br>
    <label>
    Password : 
    </label>
    <input type="text" name="password" value="{{ old('password') }}"/><br>
    <label>
    AGE : 
    </label>
    <input type="text" name="age"/><br>
    <label>
    Profile : 
    </label>
    <input type="file" name="profile"/><br>

    <button type="submit">SUBMIT</button>
</form>

</body>
</html>
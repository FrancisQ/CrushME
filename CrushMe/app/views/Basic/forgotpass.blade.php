<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{ URL::asset('images/pencil.ico') }}">
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>

</head>
<body>
<h1>Reset Your Password</h1>

{{Form::open(['action' => 'UserController@newpass'])}}
<div>
    {{Form::label('emailaddress', 'Email Address: ')}}
    {{Form::email('emailaddress', '')}}
    {{$errors->first('emailaddress', '<span class=”error”>:message<span>')}}
</div>
<div>
    {{Form::submit('Email New Password')}}
</div>
{{Form:: close()}}

</body>
</html>
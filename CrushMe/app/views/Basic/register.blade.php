<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{ URL::asset('images/pencil.ico') }}">
    <meta charset="UTF-8">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Laravel PHP Framework</title>

</head>
<body>
<h1>Register</h1>
{{Form::open(['route' => 'user.store'])}}
<div>
    {{Form::label('username', 'Username: ')}}
    {{Form::text('username', '')}}
    {{$errors->first('username', '<span class=”error”>:message<span>')}}
</div>

<div>
    {{Form::label('emailaddress', 'Email Address: ')}}
    {{Form::email('emailaddress', '')}}
    {{$errors->first('emailaddress', '<span class=”error”>:message<span>')}}
</div>

<div>
    {{Form::label('password', 'Password: ')}}
    {{Form::password('password')}}
    {{$errors->first('password' , '<span class=”error”>:message<span>')}}

</div>
<div>
    {{Form::label('password_confirmation', 'Password Confirmation: ')}}
    {{Form::password('password_confirmation')}}
    {{$errors->first('password_confirmation' , '<span class=”error”>:message<span>')}}
</div>
<div class="g-recaptcha" data-sitekey="6LdqMRsTAAAAAI7LLPOPFIL-H6pRfQoHb0Tw7Za4"></div>

<div>
    {{Form::submit('Register')}} |  {{HTML::link('/user', 'Log in')}}
</div>
{{Form:: close()}}

</body>
</html>
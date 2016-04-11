@extends('Layouts/MainLayout')

@section('head')
<link href="css/login.css" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('header')

@endsection

@section('main')
    <div class="wrapper">
        <div class="container">
            <h1>Register Today!</h1>


            {{Form::open()}}
            <div>
                {{Form::text('username', 'Username')}}
                {{$errors->first('username', '<span class=”error”>:message<span>')}}
            </div>

            <div>
                {{Form::email('emailaddress', 'Email')}}
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

            <div>
                {{Form::submit('Register')}}
                {{HTML::link('Already a Member?')}}
            </div>
            {{Form:: close()}}

        </div>
    </div>
@endsection

@section('footer')
@endsection


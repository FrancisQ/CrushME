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


            {{Form::open(array('action'=>'UserController@store'))}}
            <div>
                {{Form::text('username',  Input::old('Username'),['placeholder' => 'Username'])}}
                {{$errors->first('username', '<span class=”error”>:message<span>')}}
            </div>

            <div>
                {{Form::email('emailaddress',  Input::old('Email'),['placeholder' => 'Email'])}}
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
                {{HTML::link('/login', 'Already a Member?')}}
            </div>
            {{Form:: close()}}

        </div>
    </div>
@endsection

@section('footer')
@endsection


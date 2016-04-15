@extends('Layouts/MainLayout')

@section('pagetitle')
    <title> New Password </title>
@endsection

@section('head')
    <link href="css/login.css" media="all" rel="stylesheet" type="text/css" />

@endsection

@section('header')
@endsection

@section('main')
    <div class="wrapper">
        <div class="container">
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

        </div>

    </div>
@endsection

@section('footer')
@endsection

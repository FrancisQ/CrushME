@extends('Layouts/MainLayout')

@section('pagetitle')
    <title> HOME </title>
@endsection
@section('head')
    <link href="css/login.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('header')
    @endsection

@section('main')
    <div class="wrapper">
        <div class="container">
            <h1>Welcome</h1>

            {{Form::open(array('action'=>'UserController@enter'))}}
            {{Form::text('username','Username')}}
            {{$errors->first('username', '<span class=”error”>:message<span>')}}
            {{Form::password('password', ['placeholder' => 'Password'])}}
            {{$errors->first('password', '<span class=”error”>:message<span>')}}
            {{Form::submit('login')}}
            {{Form::submit('forgot')}}
            {{Form::close()}}
        </div>

    </div>
    @endsection

@section('footer')
    @endsection
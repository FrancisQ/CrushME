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

            {{Form::open()}}
            {{Form::text('username','Username')}}
            {{Form::password('password', ['placeholder' => 'Password'])}}
            {{Form::submit('login')}}
            {{Form::submit('forgot')}}
            {{Form::close()}}
        </div>

    </div>
    @endsection

@section('footer')
    @endsection
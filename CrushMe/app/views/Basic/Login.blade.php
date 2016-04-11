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

            <form class="form">
                <input type="text" placeholder="Username"><br>
                <input type="password" placeholder="Password"><br>
                <button type="submit" id="login">Login</button>
                <button type="submit" id="Forgot">Forgot Password?</button>
            </form>
        </div>

    </div>
    @endsection

@section('footer')
    @endsection
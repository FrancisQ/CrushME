@extends('layouts/mainLayout')

@section('pagetitle')
    <title> HOME </title>
    @endsection
@section('head')

    <link href="css/home.css" media="all" rel="stylesheet" type="text/css" />

@endsection
@section('header')
    <div id="titlewrapper">
        {{HTML::image ('images/title.png', 'image', array('id' => 'title'))}}
    </div>
@endsection

@section('main')

        <div id="imgwrapper">
            {{HTML::image ('images/heart.png', 'image', array('id' => 'logo'))}}
            {{HTML::image ('images/logo.png', 'image', array('id' => 'logo'))}}
            {{HTML::image ('images/heart.png', 'image', array('id' => 'logo'))}}
        </div>
        <div id="btnswrapper">
            {{Form::open()}}
            {{Form::submit('Has a shot', array('name'=> 'yes','id' => 'yes'))}}
            {{Form::submit('Crush On',   array('name'=> 'like','id' => 'crushOn'))}}
            {{Form::submit('No Shot',  array('name'=> 'no','id' => 'no'))}}
            {{Form::submit('Crush It!',   array('name'=> 'like','id' => 'crushIt'))}}
        </div>

@endsection

@section('footer')
    <a href="login"><div class="link">login</div></a>
    <a href="signup"><div class="link">signup</div></a>

    @endsection
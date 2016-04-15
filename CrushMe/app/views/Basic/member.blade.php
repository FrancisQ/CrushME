@extends('layouts/mainLayout')

@section('pagetitle')
    <title> Member </title>
@endsection

@section('head')
    <link href="css/member.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@endsection
@section('header')
   <div id="imgwrapper">
    {{HTML::image ('images/heart.png', 'image', array('id' => 'heart'))}}
   </div>
    <div id="membername">
       <h1> {{"member name here"}}</h1>
    </div>
    @endsection

@section('main')
    <div class="filewrap">
        <h2>{{Form::label('image', 'Your picture')}}</h2>
        {{Form::file('memberpic')}}
        <!--<img src="" width="200px">-->
        {{$errors->first('image' , '<span class=”error”>:message<span>')}}
    </div>

    <div class="dispimg">
        {{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}
    </div>

    <div id="clear"></div>

    <div class="filewrap">
        <h2>{{Form::label('image', 'Your Crushes')}}</h2>
        {{Form::file('crushpic')}}
                <!--<img src="" width="200px">-->
        {{$errors->first('image' , '<span class=”error”>:message<span>')}}
    </div>
    <div class="dispimg">
        {{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}
        {{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}
        {{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}
    </div>

    <div id="clear"></div>


        <li id="list">
            <ul class="percent">Percentage: 100%</ul>
            <ul class="percent">Percentage: 90%</ul>
            <ul>Percentage: 1%</ul>
        </li>




    <div id="buttonwrap">
        <a href="/"><div class="link">Go Vote Now!</div></a>
    </div>

    @endsection



@section('footer')
    @endsection
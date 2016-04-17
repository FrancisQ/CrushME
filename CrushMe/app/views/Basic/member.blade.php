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
       <h1> Welcome {{$user->username}}</h1>
    </div>
    @endsection

@section('main')
    <div class="filewrap">
        <h2>{{Form::label('image', 'Your picture')}}</h2>

        {{Form::open(['action'=>'UserController@updatePics', 'files'=>'true'])}}
        {{Form::hidden('username',$user->username)}}

        {{Form::file('memberpic')}}
        <!--<img src="" width="200px">-->
        {{$errors->first('image' , '<span class=”error”>:message<span>')}}
    </div>

    <div class="dispimg">
        @if($user->img==NULL)
            {{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}
        @else
            <img src="{{"data:image/jpeg;base64,".$user->img}}" width="100px">
        @endif
    </div>

    <div id="clear"></div>

    <div class="filewrap">
        <h2>{{Form::label('image', 'Your Crushes')}}</h2>
        @if(count($crushes)==3)
            {{Form::label('Maximum number of crushes! Delete some to add more!')}}
        @else
            {{Form::file('crushpic')}}
        <br/><br/>
        @endif
        {{Form::submit('Upload')}}
                <!--<img src="" width="200px">-->
        {{$errors->first('image' , '<span class=”error”>:message<span>')}}
    </div>
    <div class="dispimg">
        @for($i = 0; $i < count($crushes); $i++)
            <img src="{{"data:image/jpeg;base64,".$crushes[$i]}}" width="100px">
            {{Form::checkbox('delete'.$i, 'yes')}}
        @endfor
        {{Form::close()}}
        {{--{{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}--}}
        {{--{{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}--}}
        {{--{{HTML::image ('images/heart.png', 'image', array('id' => 'heart', 'width'=> '150px'))}}--}}
    </div>

    <div id="clear"></div>


        <li id="list">
            @for($i = 0; $i < count($percentages); $i++)
                <ul class="percent">Percentage: {{$percentages[$i]}}%</ul>
            @endfor
        </li>




    <div id="buttonwrap">
        <a href="/"><div class="link">Go Vote Now!</div></a>
    </div>

    @endsection



@section('footer')
    @endsection
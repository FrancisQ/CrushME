@extends('Layouts/MainLayout')

@section('pagetitle')
    <title> Response </title>
@endsection

@section('head')
    <link href="css/login.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('header')
@endsection

@section('main')
    <div class="wrapper2">
        <div class="container">
            {{HTML::image ('images/'.$imgsrc, 'image', array('id' => 'logo', 'height'=>'250px'))}}

            <div id="buttonwrap">
                <a href="/"><div class="link">Next!</div></a>
            </div>
    </div>
    </div>
@endsection

@section('footer')
@endsection
<!-- app/views/login.blade.php -->

@extends('layout')

@section('content')
<!-- Header -->
    <header style="height: 100px;
    background-color: black!important;
    background-image: none;">
        <div class="container">
            <div class="intro-text" style="padding-bottom:0px;padding-top: 450px;">
                
            </div>
        </div>
    </header>
    
    <section id="services" class="bg-light-gray">
        <div class="container">
            {!! Form::open(array('url' => 'login')) !!}
                <h1>Login</h1>
                
                <!-- if there are login errors, show them here -->
                <p>
                    {!! $errors->first('name') !!}
                    {!! $errors->first('password') !!}
                </p>
                
                <p>
                    {!! Form::label('name', 'Username') !!}
                    {!! Form::text('name', Input::old('name'), array('placeholder' => 'awesome@awesome.com')) !!}
                </p>
                
                <p>
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password') !!}
                </p>
                
                <p>{!! Form::submit('Login!') !!}</p>
            {!! Form::close() !!}
        </div>
    </section>

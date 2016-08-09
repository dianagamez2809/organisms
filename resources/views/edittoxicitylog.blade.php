@extends('layout3')

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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Edit score</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>

                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}
                
                {!! Form::model($toxicity, array('route' => array('toxicity.update', $toxicity->id), 'method' => 'PUT')) !!}
                
                    <div class="form-group">
                        {!! Form::label('level', 'Level') !!}
                        {!! Form::text('nivel', Input::old('nivel'), array('class' => 'form-control')) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('environment', 'Environment') !!}
                        {!! Form::select('environment', array('Select' => 'Select', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '?'), Input::old('environment'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('animals', 'Animals') !!}
                        {!! Form::select('animals', array('Select' => 'Select', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '?'), Input::old('animals'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('humans', 'Humans') !!}
                        {!! Form::select('humans', array('Select' => 'Select', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '?'), Input::old('humans'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="row" style="margin-top:10px">
                        <div class="col-lg-12 text-center">
                            {!! Form::submit('Edit', array('class' => 'btn btn-xl')) !!}
                        </div>
                    </div>
                
                    
                
                {!! Form::close() !!}
                
                </div>
            
            </div>
        
        </div>
    </section>
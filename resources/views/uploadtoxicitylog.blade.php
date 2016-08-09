@extends('layout2')

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
                    <h2 class="section-heading">Upload score</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>

                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}
                
                {!! Form::open(array('url' => 'toxicitylog')) !!}
                
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
                        {!! Form::select('environment', array('Select' => 'Select', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '?'), null, array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('animals', 'Animals') !!}
                        {!! Form::select('animals', array('Select' => 'Select', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '?'), null, array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('humans', 'Humans') !!}
                        {!! Form::select('humans', array('Select' => 'Select', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '?'), null, array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="row" style="margin-top:10px">
                        <div class="col-lg-12 text-center">
                            {!! Form::submit('Create', array('class' => 'btn btn-xl')) !!}
                        </div>
                    </div>
                
                    
                
                {!! Form::close() !!}
                
                </div>
            
            </div>
        
        </div>
    </section>
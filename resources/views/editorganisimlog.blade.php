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
                    <h2 class="section-heading">Edit organism</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>

                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}
                
                {!! Form::model($organism, array('route' => array('organism.update', $organism->id), 'method' => 'PUT')) !!}
                
                    <div class="form-group">
                        {!! Form::label('organismName', 'Name') !!}
                        {!! Form::text('organismName', Input::old('organismName'), array('class' => 'form-control')) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('accessionNumber', 'Number') !!}
                        {!! Form::text('accessNumber', Input::old('accessNumber'), array('class' => 'form-control')) !!}
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
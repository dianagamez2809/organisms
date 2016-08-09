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
                    <h2 class="section-heading">Upload metabolite</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>

                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}
                
                {!! Form::model($metabolite, array('route' => array('metabolites.update', $metabolite->id), 'method' => 'PUT'))  !!}
                
                    <div class="form-group">
                        {!! Form::label('idOrganism', 'Organism') !!}
                        {!! Form::select('idOrganism', $organisms, Input::old($metabolite->idOrganism), ['class' => 'form-control']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('cluster', 'Cluster') !!}
                        {!! Form::text('cluster', Input::old('cluster'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('metabolite', 'Metabolite') !!}
                        {!! Form::text('metabolite', Input::old('metabolite'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('idToxicity', 'Toxicity') !!}
                        {!! Form::select('idToxicity', $toxicities, Input::old($metabolite->idToxicity), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('criteria', 'Criteria') !!}
                        {!! Form::text('criteria', Input::old('criteria'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('completeness', 'Completeness') !!}
                        {!! Form::text('completeness', Input::old('completeness'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('link', 'Link') !!}
                        {!! Form::text('link', Input::old('link'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('dnaRegion', 'DNA Region') !!}
                        {!! Form::text('dnaRegion', Input::old('dnaRegion'), array('class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('percentage', 'Percentage of Gene Similarity') !!}
                        {!! Form::text('percentage', Input::old('percentage'), array('class' => 'form-control')) !!}
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
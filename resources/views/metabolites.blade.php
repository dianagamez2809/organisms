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
            <a class="btn btn-xl" href="{{ URL::to('metabolites/create') }}" style="float: right;margin-top: -100px;background-color: #32b159;
    border-color: #32b159;">New metabolite</a>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Metabolites</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Accession Number</th>
                    <th>Organism</th>
                    <th>Metabolite</th>
                    <th>Toxicity</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($metabolites as $key => $value)
                      <tr>
                        <?php 
                             $organism = DB::table('organisms')->where('id', $value->idOrganism)->pluck('organismName'); 
                             $number = DB::table('organisms')->where('id', $value->idOrganism)->pluck('accessNumber');
                        ?>
                        <td>{!! $number !!}</td>
                        <td>{!! $organism !!}</td>
                        <td>{!! $value->metabolite !!}</td>
                        <td>{!! $value->idToxicity !!}</td>
                        <td>
                            <a class="btn btn-block btn-info" href="{{ URL::to('metabolites/' . $value->id . '/edit') }}">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </section>
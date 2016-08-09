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
            <a class="btn btn-xl" href="{{ URL::to('toxicitylog/create') }}" style="float: right;margin-top: -100px;background-color: #32b159;
    border-color: #32b159;">New level</a>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Toxicity Scores</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nivel</th>
                    <th>Description</th>
                    <th>Environment</th>
                    <th>Animals</th>
                    <th>Humans</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($toxicities as $key => $value)
                      <tr>
                        <td><?php if($value->nivel == 0){
                                        echo '?';
                                  }
                                  else{
                                    echo $value->nivel;
                             }?>
                        </td>
                        <td>{!! $value->description !!}</td>
                        <td><?php if($value->environment == 6){
                                        echo '?';
                                  }
                                  else{
                                    echo $value->environment;
                             }?>
                        </td>
                        <td><?php if($value->animals == 6){
                                        echo '?';
                                  }
                                  else{
                                    echo $value->animals;
                             }?>
                        </td>
                        <td><?php if($value->humans == 6){
                                        echo '?';
                                  }
                                  else{
                                    echo $value->humans;
                             }?>
                        </td>
                        <td>
                            <a class="btn btn-block btn-info" href="{{ URL::to('toxicitylog/' . $value->id . '/edit') }}">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </section>
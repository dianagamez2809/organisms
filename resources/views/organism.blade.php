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
            <a class="btn btn-xl" href="{{ URL::to('organism/create') }}" style="float: right;margin-top: -100px;background-color: #32b159;
    border-color: #32b159;">New organism</a>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Organisms</h2>
                </div>
            </div>
            
            <div class="row text-center"></div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Accession Number</th>
                    <th>Valid</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($organisms as $key => $value)
                      <tr>
                        <td>{!! $value->organismName !!}</td>
                        <td>{!! $value->accessNumber !!}</td>
                        <td>{!! $value->valid !!}</td>
                        <td>
                            <a class="btn btn-block btn-info" href="{{ URL::to('organism/' . $value->id . '/edit') }}">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </section>
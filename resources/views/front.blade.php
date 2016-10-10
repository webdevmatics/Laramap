@extends('layouts.master')

@section('content')

    <div class="container text-center">

        <h2>Laramap</h2>

        <div id="map">

        </div>
        <br>

        {!! Form::open(['url'=>'/getLocationCoords','id'=>'searchGirls']) !!}

        {!! Form::label('district','District') !!}

         {!!Form::select('district', $districts,null,['id'=>'district']) !!}



        <div id="city">

        </div>

        {!! Form::submit('Find',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}

        <br>
        <h4>Name of Girls</h4>
        <hr>
          <ul id="girlsResult">

          </ul>
    </div>


@endsection
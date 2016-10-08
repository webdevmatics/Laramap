@extends('layouts.master')

@section('content')

    <div class="container text-center">

        <h2>Laramap</h2>

        <div id="map">

        </div>
        <br>

        {!! Form::open([]) !!}

        {!! Form::label('district','District') !!}

         {!!Form::select('district', $districts,null,['id'=>'district']) !!}



        <div id="city">

        </div>

        {!! Form::close() !!}

    </div>


@endsection
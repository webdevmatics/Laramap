@extends('layouts.master')

@section('content')

    <div class="container text-center">

        <h2>Laramap</h2>

        <div id="map">

        </div>
        <br>

        {!! Form::open(['url'=>'/getLocationCoords','id'=>'searchGirls']) !!}

        {!! Form::label('district','District') !!}

         {{-- {!!Form::select('district', $districts,null,['id'=>'district']) !!} --}}
        <select style="width: 150px" name="location" id="locationSelect"></select>


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

@section('js')

<script>
    $(document).ready(function(){
        $('#locationSelect').select2({
            placeholder:"Select and Search",
            ajax:{
                url:"/api/searchCity",
                type:"POST",
                dataType:"json",
                delay:250,
                data:function(params){
                    return{
                    locationVal:params.term,
                };
                },

                processResults:function(data){
                    return{
                        results:$.map(data.items,function(val,i){
                            return {id:id, text:val};
                        })
                    }
                }

            }


        });
    });
</script>

@endsection
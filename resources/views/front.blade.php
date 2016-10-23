@extends('layouts.master')

@section('content')
<div class="container text-center">
    <h2>
        Laramap
    </h2>
    <div id="map">
    </div>
    <br>
        {!! Form::open(['url'=>'/getLocationCoords','id'=>'searchGirls']) !!}

        {!! Form::label('district','Location') !!}
        <select style="width: 150px" name="district" id="district"></select>
			{{-- {!!Form::select('district', $districts,null,['id'=>'district']) !!} --}}
        
        <br> <br>
            {!! Form::submit('Find',['class'=>'btn btn-success btn-sm ']) !!}
  
        {!! Form::close() !!}
            <br>
                <h4>
                    Name of Girls
                </h4>
                <hr>
                    <ul id="girlsResult">
                    </ul>
                </hr>
            </br>
        </br>
    </br>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {


  $("#district").select2({
  	placeholder:"Select and search",
    ajax: {
    url: "/api/searchCity",
    type:"POST",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
      };
    },
    processResults:function(data){
        return{
            results:$.map(data.items,function(val,i){
                return { id:val, text:val };
            })
        }
    }
   
  },
 
  	});

}); //doconload
</script>
@endsection

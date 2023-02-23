@extends('layouts.mydash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Make Your Short Link</h3></div>

                <div class="card-body text-center">
                 <form action="{{url('makeshortlink')}}" method="post" id="myForm">
                    @csrf
                    <input type="text" name="url" id="url"  >

                    <input type="hidden" name="compain_id" value="{{$compain_id}}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="submit" value="Make Short Link" id="makelink">
                    
                 </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body text-center">
              
@if ($lastShortLink == null)
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label"><h3>Your Last Generated Link In Compain #{{$id}}</h3></label>
    <textarea class="form-control" id="lastshortlink" rows="1" style="color:blue"></textarea>
  </div>
  <div class="mb-3 row">
    <label for="destination_url" class="col-sm-4 col-form-label"><h5>Main Destination Url</h5></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="destination_url" style="color:blue" value="">
    </div>
</div>
 
      
  @else
  <script>
  let myinput = document.getElementById('url');
  myinput.value ="{{$lastShortLink->destination_url}}"

  myinput.addEventListener('focus',function(){

    myinput.value =""

});
</script>
  <div class="mb-3 row">
    <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label"><h6>Your Last Generated Link In Compain #{{$lastShortLink->compain_id}}</h6></label>
    <div class="col-sm-8">
    <p  id="lastshortlink" style="color:blue">{{$lastShortLink->default_short_url}}</p>

  </div>
  </div>
  <div class="mb-3 row">
    <label for="destination_url" class="col-sm-4 col-form-label"><h5>Main Destination Url</h5></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="destination_url" style="color:blue" value="{{$lastShortLink->destination_url}}">
    </div>
</div>
  @endif


            
                </div>
        </div>
    </div>
    </div>

  <h4 class="text-center " style="margin-top: 30px"><a href="{{url('/clientdashboard')}}" class="btn btn-primary">Back To Dashboard</a></h4>
  <script src="{{asset('js/main.js')}}"></script>

@endsection

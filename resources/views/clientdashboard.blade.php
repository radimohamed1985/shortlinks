@extends('layouts.app')
@section('content')
    


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}


</style>
</head>
<body>

<div class="sidenav">
  <a href="{{url('home/1')}}">Compain #1</a>
  <a href="{{url('home/2')}}">Compain #2</a>
  <a href="{{url('home/3')}}">Compain #3</a>
  <a href="{{url('home/4')}}">Form 1</a>
  <a href="{{url('home/5')}}">Form 2</a>
  <a href="{{url('home/6')}}">Form 3</a>
  <a href="{{url('report')}}">Report</a>
  <a href="{{url('myleads')}}">MyLeads</a>

</div>

<div class="main text-center">
  <h2>Welcome To Short Link WebSite</h2>
  
</div>
   
</body>
</html> 

@endsection
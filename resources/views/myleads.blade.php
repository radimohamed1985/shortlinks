@extends('layouts.app')
@section('content')
<div class="container" id="downloadarea">
    {{-- <h4 class="text-left " style="float:right"><a href="" class="btn btn-primary print" style="float:right">Print Report</a></h4> --}}

<table class="table table-bordered">
    <thead class="table-dark">
        <td>id</td>
        <td>Date</td>
        <td>name</td>
        <td>phone</td>
        <td>email</td>
        <td>address</td>
        <td>ip</td>
        <td id="print">
            <a href="" class="btn btn-primary print" style="float:right">Print Report</a>
            <a href="" class="btn btn-primary Download" style="float:right">Download Report</a>
        </td>
    </thead>
    <tbody>
        @foreach ( $myleads as $lead)
        <tr>
        <td>{{$lead->id}}</td>
        <td>{{$lead->created_at}}</td>
        <td >{{$lead->name}}</td>
        <td >{{$lead->phone}}</td>
        <td >{{$lead->email}}</td>
        <td >{{$lead->address}}</td>
        <td >{{$lead->ip}}</td>
        {{-- @if ($compain->compain_id ==1|$compain->compain_id ==2|$compain->compain_id ==3)
        <td colspan="2">Short Link</td>
        @else
        <td colspan="2">Form Link </td>

        @endif --}}
    </tr>
        @endforeach
    </tbody>
</table>
</div>

<h4 class="text-center " style="margin-top: 30px"><a href="{{url('/clientdashboard')}}" class="btn btn-primary" >Back To Dashboard</a></h4>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>

    let printing =document.querySelector('.print')
    let printingtab =document.querySelector('#print')
    printing.addEventListener('click',function(e){
        e.preventDefault();
        printingtab.classList.add('hidden')

        window.print();

    })
    
    let Download =document.querySelector('.Download')
    let Downloadtab =document.querySelector('#print')
    Download.addEventListener('click',function(e){
        e.preventDefault();
        Downloadtab.classList.add('hidden')
        window.jsPDF = window.jspdf.jsPDF;

var doc = new jsPDF();
window.html2canvas = html2canvas;

// Source HTMLElement or a string containing HTML.
var elementHTML = document.querySelector("#downloadarea");
doc.html(elementHTML, {
    callback: function(doc) {
        // Save the PDF
        doc.save('sample-document.pdf');
    },
    x: 15,
    y: 15,
    width: 170, //target width in the PDF document
    windowWidth: 650 //window width in CSS pixels
});

    })
</script>

@endsection
@extends('layouts.template')

@section('content')
{{-- Content Start --}}
<section name="content">
   <div class="container mt-5" style="min-height: 70vh">
      <div class="row">
         <div class="col">
            <h3>Film Details</h3>
         </div>
      </div>
      <div class="row mt-4">
         @if($film['Response'] == 'True')
         <div class="container d-md-flex">
            <div class="col-md-3">
               <img src="{{ $film['Poster'] }}">
            </div>
            <div class="col-md-6">
               <ul class="list-group">
                  <li class="list-group-item"><strong>Title: </strong> {{ $film['Title'] }}</h4></li>
                  <li class="list-group-item"><strong>Director: </strong> {{ $film['Director'] }} </li>
                  <li class="list-group-item"><strong>Actors: </strong> {{ $film['Actors'] }} </li>
                  <li class="list-group-item"><strong>Writer: </strong> {{ $film['Writer'] }} </li>
                  <li class="list-group-item"><strong>Plot: </strong> <br> {{ $film['Plot'] }} </li>
                  <li class="list-group-item"><strong>Price: </strong> {{ 'Rp '. $film['imdbVotes'] }} </li>
               </ul><br>
               <a href="/checkout/{{ $film['imdbID'] }}" class="btn btn-primary">Buy this film</a>
            </div>
         </div>
         @else
         <div class="container">
            <div class="row">
               <div class="col" style="min-height: 60vh">
                  <h3>No film found</h3>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
</section>
{{-- Content End --}}
@endsection
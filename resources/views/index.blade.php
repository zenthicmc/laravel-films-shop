@extends('layouts.template')

@section('content')
{{-- Content Start --}}
<section name="content">
   <div class="container mt-5">
      <div class="row">
         <div class="col">
            <h3>Films</h3>
         </div>
      </div>
      <div class="row mt-2">
         <div class="col-md-5">
            <div class="input-group mb-3">
               <input type="text" class="form-control search-input" name="title" placeholder="Search Movie...." required>
               <button class="btn btn-primary search-button" onclick="search();" type="submit">Search</button>
            </div>
         </div>
      </div>
      <div class="row mt-4">
         @if($films != false)
            @foreach ($films as $film)
               <div class="col-md-3 my-3">
                  <div class="card" style="width: 18rem;">
                     <img src="{{ $film['Poster'] }}" class="card-img-top" alt="{{ $film['Title'] }}">
                     <div class="card-body">
                     <h5 class="card-title">{{ $film['Title'] }}</h5>
                     <h6 class="card-subtitle mb-2 text-muted">{{ $film['Year'] }}</h6>
                     <a href="/film/{{ $film['imdbID'] }}" class="btn btn-primary mt-2">See more</a>
                     </div>
                  </div>
               </div>
            @endforeach
         @elseif($films == false)
            <div class="col-md-12" style="min-height: 50vh">
               <h3>No films found</h3>
            </div>
         @endif
      </div>
   </div>
</section>
{{-- Content End --}}
@endsection

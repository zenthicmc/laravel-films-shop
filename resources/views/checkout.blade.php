@extends('layouts.template')

@section('content')
{{-- Content Start --}}
<section name="content">
   <div class="container mt-5">
      <div class="row">
         <div class="col">
            <h3>Choose Your Payment Method</h3>
         </div>
      </div>
      <div class="row mt-4">
         @if($film['Response'] == 'True')
         <div class="container d-md-flex">
            <div class="col-md-3">
                <img src="{{ $film['Poster'] }}">
                <div class="p-0 mt-2" style="padding: 0;margin: 0;">
                    <label><strong>Title: </strong>{{ $film['Title'] }}</label><br>
                    <label><strong>Price: </strong>{{ 'Rp '. $film['imdbVotes'] }}</label>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-2">
                @foreach ($payment_channels as $payment)
                    @if($payment->active == true)
                        <form method="POST" action="{{ route('transaction.store') }}">
                        @csrf
                           <input type="hidden" name="id" value="{{ $film['imdbID'] }}">
                           <input type="hidden" name="method" value="{{ $payment->code }}">
                           <button type="submit" class="col mt-5" style="border: none;background-color: white;">
                              <div class="card" style="width: 150px;height: 150px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;;border: none;cursor: pointer;">
                                 <img class="m-auto mt-3" src="{{ $payment->icon_url }}" alt="{{ $payment->name }}" class="card-img-top" style="width: 120px;height: 50px;">
                                 <div class="card-body">
                                    <p class="text-center">{{ $payment->name }}</p>
                                 </div>
                              </div>
                           </button>
                        </form>
                    @endif
                @endforeach
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
@extends('layouts.template')

@section('content')
{{-- Content Start --}}
<section name="content">
   <div class="container" style="min-height: 70vh;">
      <div class="row mt-5 d-flex justify-content-around">
         <div class="col-md-4 mt-3 mb-3">
            <div class="text-center">
               <img src="{{ $detail->order_items[0]->image_url }}" class="img-thumbnail" alt="{{ $detail->order_items[0]->name }}">
            </div>
         </div>
         <div class="col-md-6 mt-3 mb-3">
            <div class="box">
               <div class="d-flex justify-content-between">
                  <p class="t-secondary">TRANSACTION DETAIL</p>
                  <p class="t-black">#{{ $detail->reference }}</p>
               </div>
               <h3 class="fw-bolder">Rp. {{ number_format($detail->amount) }}</h3>
               @if($detail->status == 'PAID')
                  <div class="paid fw-bolder text-center pt-1 mt-4">{{ $detail->status }}</div>
               @else
                  <div class="unpaid fw-bolder text-center pt-1 mt-4">{{ $detail->status }}</div>
               @endif
            </div>
            <a href="{{ $detail->checkout_url }}" class="btn btn-success mt-3" style="width: 100%">PAY WITH {{ strtoupper($detail->payment_name) }}</a>
         </div>
      </div>
   </div>
</section>
{{-- Content End --}}
@endsection
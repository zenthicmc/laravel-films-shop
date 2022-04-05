{{-- Nav Start --}}
<nav class="navbar navbar-light bg-dark">
   <div class="container">
      <a class="navbar-brand text-white" href="/"><h3>Films Store</h3></a>
      <div class="col-md-2">
         @if(!Auth::check())
            <a href="{{ route('login') }}" class="navbar-brand text-white">Login</a>
            <a href="{{ route('register') }}" class="navbar-brand text-white">Register</a>
         @else
            <a href="{{ route('dashboard') }}" class="navbar-brand text-white">Dashboard</a>
         @endif
      </div>
   </div>
</nav>
{{-- Nav End --}}
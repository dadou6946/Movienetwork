
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      
      <h5 class="my-0 mr-md-auto font-weight-normal">
        Movie network <img src="/images/clapperboard.png" alt="Movie network">
      </h5>

      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{url('/')}}">Tous les films</a>
        <a class="p-2 text-dark" href="{{url('/')}}">Tous les membres</a>
        @if(Auth::check())
          <a class="p-2 text-dark" href="{{'/films/create'}}">Ajouter un film</a>
        @endif
        {{-- <a class="p-2 text-dark" href="#">Lien4</a> --}}
      </nav>
      <div class="ml-auto">
        @if(!Auth::check())
          <a class="p-2 text-dark" href="{{url('/register')}}">Créer un compte</a>
          <a class="btn btn-outline-primary" href="{{url('/login')}}">Connection</a>
        @endif
        @if(Auth::check())
          <span class="p-2 text-dark">{{ Auth::user()->name }}</span>
          <a href="{{url('/logout')}}">Se déconnecter</a>
        @endif
      </div>
    </div>
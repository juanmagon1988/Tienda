


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand main-title" href="{{ route('home') }}">Hay equipo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <ul class="navbar-nav mr-right">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart"></i></a>
      </li>
    @include('store.partials.menu-user')

      
      <li class="nav-item">
        <a class="nav-link" href="#">Conocenos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
      </li>




      
    </ul>
    
  </div>
  
</nav>
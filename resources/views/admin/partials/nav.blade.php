<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand main-title" href="{{ route ('home')}}">Hay equipo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <ul class="navbar-nav mr-right">
      
      @include('store.partials.menu-user')

      
      <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Pedidos</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>




      
    </ul>
    
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('products.index') }}">My Shop</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
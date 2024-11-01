<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img class="main-sidebar-img" src="/img/logo_01.png" alt="">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" x-ref="username">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Tablero
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/api/apicontroller" class="nav-link {{ request()->is('api.apicontroller') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Probar Api
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/pasarela" class="nav-link {{ request()->is('pasarela') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pasarela
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('listMetodosPagos') }}" class="nav-link {{ request()->is('listMetodosPagos') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Métodos de Pagos
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('listComercios', 0) }}" class="nav-link {{ request()->is('listComercios') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Afiliado / Comercios
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('listMetodosPagosC', 0) }}" class="nav-link {{ request()->is('listMetodosPagosC') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Comercio / Métodos de Pagos
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('listTransacciones', 0) }}" class="nav-link {{ request()->is('listTransacciones') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Transacciones
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('MakePayment', 0) }}" class="nav-link {{ request()->is('MakePayment') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Hacer Operacion
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Messages
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a x-ref="profileLink" href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>

        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

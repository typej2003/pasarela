<aside class="main-sidebar sidebar-bg-primary elevation-4">
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
              Escritorio
            </p>
          </a>
        </li>
        <!-- PROBAR RECURSOS -->
        
        <!-- Admin -->
        @if(auth()->user()->role == 'admin')
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-solid fa-building"></i>  
              <p>
                Comercios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('listComercios', 1) }}" class="nav-link {{ request()->is('listComercios') ? 'active' : '' }}">
                  <i class="fas fa-solid fa-building"></i> 
                  <p>
                    Todos Comercios
                  </p>
                </a>
              </li>              
              @foreach(auth()->user()->showComercios() as $comercio)  
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      {{$comercio->name}}
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">

                    <li class="nav-item">
                      <a href="{{ route('showPasarela',  $comercio->id) }}" class="nav-link {{ request()->is('showPasarela') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Pasarela
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('listComercios',  $comercio->id) }}" class="nav-link {{ request()->is('listComercios') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Configurar
                        </p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="{{ route('listMetodosPagosC', $comercio->id) }}" class="nav-link {{ request()->is('listMetodosPagosC') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                          Métodos de Pagos
                        </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ route('listTransacciones', $comercio->id) }}" class="nav-link {{ request()->is('listTransacciones') ? 'active' : '' }}">
                      <i class="fa fa-solid fa-file-invoice-dollar"></i>
                        <p>
                          Transacciones
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>
              @endforeach
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
        @endif
        @if(auth()->user()->role == 'afiliado')
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-solid fa-building"></i>  
              <p>
                Comercios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('listComercios', 1) }}" class="nav-link {{ request()->is('listComercios') ? 'active' : '' }}">
                  <i class="fas fa-solid fa-building"></i> 
                  <p>
                    Todos Comercios
                  </p>
                </a>
              </li>
              
              @foreach(auth()->user()->showComercios() as $comercio)  
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      {{$comercio->name}}
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">

                    <li class="nav-item">
                      <a href="{{ route('showPasarela',  $comercio->id) }}" class="nav-link {{ request()->is('showPasarela') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Pasarela
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('listEmployesComercio', $comercio->id) }}" class="nav-link {{ request()->is('listEmployesComercio') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-building-user"></i>
                        <p>
                          Empleados
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('listComercios',  $comercio->id) }}" class="nav-link {{ request()->is('listComercios') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Configurar
                        </p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="{{ route('listMetodosPagosC', $comercio->id) }}" class="nav-link {{ request()->is('listMetodosPagosC') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                          Métodos de Pagos
                        </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ route('listTransacciones', $comercio->id) }}" class="nav-link {{ request()->is('listTransacciones') ? 'active' : '' }}">
                      <i class="fa fa-solid fa-file-invoice-dollar"></i>
                        <p>
                          Transacciones
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>
              @endforeach              
            </ul>
          </li>

        @endif

        @if(auth()->user()->role == 'cliente')
          
        @endif
        <!-- CONFIGURACION -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-list"></i>
            <p>
              Lista
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('listMetodosPagos') }}" class="nav-link {{ request()->is('listMetodosPagos') ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-list"></i>
                <p>
                  Sub Lista
                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-item">
          <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Messages
            </p>
          </a>
        </li> -->

        <li class="nav-item">
          <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Configuración
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a x-ref="profileLink" href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Perfil
            </p>
          </a>
        </li>

        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Salir
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

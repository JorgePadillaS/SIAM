<div id="app">
  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
      <div class="navbar-item has-control">
        <div class="control"><input placeholder="Search everywhere..." class="input"></div>
      </div>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
      </a>
    </div>
    <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
          <a class="navbar-link is-arrowless">
            <span class="icon"><i class="mdi mdi-menu"></i></span>
            <span>Sample Menu</span>
            <span class="icon">
            <i class="mdi mdi-chevron-down"></i>
          </span>
          </a>
          <div class="navbar-dropdown">
            <a href="profile.html" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-settings"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-email"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Log Out</span>
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
          <a class="navbar-link is-arrowless">
            <div class="is-user-avatar">
              <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe">
            </div>
            <div class="is-user-name"><span>John Doe</span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a href="profile.html" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-settings"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-email"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Log Out</span>
            </a>
          </div>
        </div>
        <a href="https://justboil.me/bulma-admin-template/free-html-dashboard/" title="About" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
          <span>About</span>
        </a>
        <a title="Log out" class="navbar-item is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span>Log out</span>
        </a>
      </div>
    </div>
  </nav>
  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>Admin</b> One HTML</span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li>
          <a href="index.php" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Módulos</p>
      <ul class="menu-list">
        <li>
          <a href="Empleado.php" class="has-icon">
            <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Funcionarios</span>
          </a>
        </li>
        <li>
          <a href="programas.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Programas</span>
          </a>
        </li>
        <li>
          <a href="vehiculos.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Vehiculos</span>
          </a>
        </li>
        <li>
          <a class="has-icon has-dropdown-icon">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Combustible</span>
            <div class="dropdown-icon">
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </div>
          </a>
          <ul>
            <li>
              <a href="combustible.php">
                <span>Tipos de Combustible</span>
              </a>
            </li>
            <li>
              <a href="compra_combustible.php">
                <span>Compra de Combustible</span>
              </a>
            </li>
            <li>
              <a href="dispensacion_combustible.php">
                <span>Dispensar Combustible</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <p class="menu-label">Ayudas</p>
      <ul class="menu-list">
        <li>
          <a href="https://github.com/vikdiesel/admin-one-bulma-dashboard" target="_blank" class="has-icon">
            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
            <span class="menu-item-label">Manual de Uso por modulo</span>
          </a>
        </li>
        <li>
          <a href="https://justboil.me/bulma-admin-template/free-html-dashboard/" class="has-icon">
            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
            <span class="menu-item-label">Ayuda</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
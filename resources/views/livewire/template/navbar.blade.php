 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ route('welcome') }}">
            <h5 class="text-white">MutabaahQ</h5>
            <img src="assets/images/logo-light.svg" alt="logo-light" class="logo-light">
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="logo" /></a>
          
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" id="hamburgerBtn">
            <span class="icon-menu"></span>
          </button>
        </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
          
          <ul class="navbar-nav navbar-nav-right">
           

           
            <li class="nav-item dropdown user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ms-2" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="Profile image"> <span class="font-weight-normal"> {{ Auth()->user()->name }}</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                
              <a class="dropdown-item" href="{{ route('welcome') }}"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu" id="hamburgerIcon"></span>
          </button>
        </div>
        
      </nav>
      <script>
  document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("hamburgerBtn");
    const icon = document.getElementById("hamburgerIcon");

    btn.addEventListener("click", function () {
      icon.classList.toggle("icon-menu");
      icon.classList.toggle("icon-close");
    });
  });
</script>

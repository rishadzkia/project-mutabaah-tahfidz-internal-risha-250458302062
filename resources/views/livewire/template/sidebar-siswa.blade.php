  <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item navbar-brand-mini-wrapper">
              <a class="nav-link navbar-brand" href="{{ route('welcome') }}"></a>
            </li>
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="profile image">
                  
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth()->user()->name }}</p>
                  <p class="designation">{{ Auth()->user()->role }}</p>
                </div>
                
               
              </a> 
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span> 
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{ route('siswa.dashboard') }}" wire:navigate> 
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Siswa</span></li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse"  href="{{ route('siswa.show-hafalan') }}" wire:navigate aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Input Hafalan</span>
                <i class="icon-note menu-icon"></i> 
              </a> 
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse"  href="{{ route('siswa.show-komentar') }}" wire:navigate aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Pengumuman</span>
                <i class="icon-bell menu-icon"></i>
              </a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse"  href="{{ route('siswa.show-murottal') }}" wire:navigate aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Murottal Surat Pilihan</span>
                <i class="icon-control-play menu-icon"></i>
              </a>
              
            </li>
            
           
           
          </ul>
        </nav>
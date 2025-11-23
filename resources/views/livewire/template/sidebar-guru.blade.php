  <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item navbar-brand-mini-wrapper">
              <a class="nav-link navbar-brand" href="index.html"><h2>MutabaahQ</h2></a>
            </li>
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="profile image">
                  
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
              <a class="nav-link" href="{{ route('guru.dashboard') }}" wire:navigate>
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Guru</span></li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse"  href="{{ route('guru.hafalan') }}" wire:navigate aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Hafalan Siswa</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="{{ route('guru.responseHafalan') }}" wire:navigate aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Response Hafalan Siswa</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Siswa Tertanda</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="{{ route('guru.pengumuman') }}" wire:navigate aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Buat Pengumuman</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              
            </li>
           
           
          </ul>
        </nav>
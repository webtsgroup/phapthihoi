<?php
  use Cake\Routing\Router;
  use Cake\I18n\I18n;
  I18n::locale('en_US');
?>
<!-- aside -->
<div id="aside" class="app-aside modal fade nav-dropdown">
  <!-- fluid app aside -->
  <div class="left navside grey dk" data-layout="column">
    <div class="navbar no-radius">
      <!-- brand -->
      <a href="/" class="navbar-brand md">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
          <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>
          <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>
          <circle cx="24" cy="24" r="10" fill="#ffffff"/>
          <circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>
          <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
          <circle cx="24" cy="24" r="3" fill="#000000"/>
        </svg>

        <img src="images/logo.png" alt="." class="hide">
        <span class="hidden-folded inline">pulse</span>
      </a>
      <!-- / brand -->
    </div>
    <div data-flex class="hide-scroll">
        <nav class="scroll nav-stacked nav-active-primary">

          <ul class="nav" data-ui-nav>
            <!-- <li class="nav-header hidden-folded">
              <span class="text-xs text-muted">Main</span>
            </li> -->
            <li>
              <a href="/als">
                <span class="nav-icon">
                  <i class="material-icons">
                    play_circle_outline
                  </i>
                </span>
                <span class="nav-text"><?=__('Nghe pháp âm', true)?></span>
              </a>
            </li>
            <li>
              <a href="/n">
                <span class="nav-icon">
                  <i class="material-icons">
                    sort
                  </i>
                </span>
                <span class="nav-text"><?=__('Tải về', true)?></span>
              </a>
            </li>
            <li>
              <a href="/b">
                <span class="nav-icon">
                  <i class="material-icons">
                    trending_up
                  </i>
                </span>
                <span class="nav-text"><?=__('Ebooks - Truyện Tranh - Kiến Thức', true)?></span>
              </a>
            </li>
            <li>
              <a href="/c">
                <span class="nav-icon">
                  <i class="material-icons">
                    portrait
                  </i>
                </span>
                <span class="nav-text"><?=__('Phật Sự', true)?></span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="nav-icon">
                  <i class="material-icons">
                    portrait
                  </i>
                </span>
                <span class="nav-text"><?=__('Trợ Duyên - Về hội', true)?></span>
              </a>
            </li>


            <li class="nav-header hidden-folded m-t">
              <span class="text-xs text-muted">Your collection</span>
            </li>
            <li>
              <a data-toggle="modal" data-target="#search-modal">
                <span class="nav-icon">
                  <i class="material-icons">
                    search
                  </i>
                </span>
                <span class="nav-text">Search</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
    <div data-flex-no-shrink>
      <div class="nav-fold dropup">
        <a data-toggle="dropdown">
            <span class="pull-left">
              <img src="images/a3.jpg" alt="..." class="w-32 img-circle">
            </span>
            <span class="clear hidden-folded p-x p-y-xs">
              <span class="block _500 text-ellipsis">Rachel Platten</span>
            </span>
        </a>
        <div class="dropdown-menu w dropdown-menu-scale ">
          <a class="dropdown-item" href="profile.html#profile">
            <span>Profile</span>
          </a>
          <a class="dropdown-item" href="profile.html#tracks">
            <span>Tracks</span>
          </a>
          <a class="dropdown-item" href="profile.html#playlists">
            <span>Playlists</span>
          </a>
          <a class="dropdown-item" href="profile.html#likes">
            <span>Likes</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="docs.html">
            Need help?
          </a>
          <a class="dropdown-item" href="signin.html">Sign out</a>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- / -->

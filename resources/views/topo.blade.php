 <header class="main-header">
     <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MA</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MATERIAL</b>META</span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <span class="hidden-xs">{{ Auth::user()->name }}
              
              </span>
              <i class="fas fa-chevron-down">
                
              </i>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">

                <p>
                   {{ Auth::user()->email }}
                  <small></small>
                </p>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-md-6">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <button type="button" class="btn btn-outline-secondary">
                        {{ __('Sair') }}
                         <i class="fas fa-share-square"></i>
                        
                      </button>
                  </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
                </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>   
    

    </nav>
  </header> 
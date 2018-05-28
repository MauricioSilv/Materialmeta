
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- /.search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="pesquisa" value="" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
            <a href="/inicio">
                <i class="fas fa-home"></i>
                <span>Início</span>
            </a>
        </li>
        

        
        @if(Auth::user()->perfil !== 'professor')
        <li>
            <a href="/materiais">
                <i class="fas fa-archive"></i>
                <span>Materiais</span>
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-check-circle"></i>
            <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li>
            <a href="/estadomaterial">
                <i class="far fa-circle"></i>
                <span>Estado do Material</span>
            </a>
        </li>
        <li>
            <a href="/tipomateriais">
                <i class="far fa-circle"></i>
                <span>Tipo do Material</span>
            </a>
        </li>
            
          </ul>
        </li>
        <li>
         <li>
            <a href="{{ action('EmprestimoController@index') }}">
                <i class="far fa-thumbs-up"></i>
                <span>Emprestimos</span>
            </a>
        </li>
        
        
        <li>
            <a href="/professors">
                <i class="fas fa-users"></i>
                <span>Professores</span>
            </a>
        </li>
        @else
         <li>
            <a href="/emprestimos">
                <i class="far fa-thumbs-up"></i>
                <span>Emprestimos</span>
            </a>
        </li>

        @endif
      {{--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
      </ul>
      --}}
    </section>
    <!-- /.sidebar -->
  </aside>
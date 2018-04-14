<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>MaterialMETA</title>
	 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('bootstrap.layout')
 <style type="text/css">

    .main-header .sidebar-toggle:before {
    content: '';
}

</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!--aqui entra o topo-->
  @include('topo')
  <!--aqui entra o lado esquerdo (aside)-->
  @include('ladoE')
  <!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    
    @yield('content-header')
    
    <div class="content">
        @yield('conteudo')
      
    </div>

  </div>

  <!--RODAPÉ-->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  </div>    
 @include('bootstrap.js')
</body>
</html>
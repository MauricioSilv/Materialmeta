<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>MaterialMeta</title>
	 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="icon" href="img/foto.png"  type = "imagem/png">
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
  @include('ladoleft')
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
      <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Admin</a>.</strong> 
  </footer>
  </div>    
 @include('bootstrap.js')
</body>
</html>
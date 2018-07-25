<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Custom styles for this template -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>

  <body>
<style>
  nav{
    font-weight: bold;
    background: white;
    border:white;
  }
  a{ color: inherit; }
  .content-page{
    margin-top: 50px;
  }
</style>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">GA Recompensas</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#">Recompensas</a></li>
                  <li class="active"><a href="#">Historial</a></li>
                  <li class="active"><a href="#">Ayuda </a></li>

                  <li class="active">
                    <a href="#"><span class="glyphicon glyphicon-shopping-cart">0</span></a>
                  </li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Luis Manuel Rojo</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Configuracion</a></li>
                    <li><a href="#">Alta Productos</a></li>
                    <li class="divider"><!-- division --></li>
                    <li><a href="#">Puntos: $ 10000</a></li>
                    <li><a href="#exit">Salir</a></li>
                  </ul>
                  </li>
              </ul>
              <form class="navbar-form navbar-right search-form" role="search">
                <input type="text" class="form-control" placeholder="Buscar Producto" />
              </form>
            </div>
          </div>
    </nav>

    <!-- Page Content -->
    <div class="content-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="<?php echo base_url()?>assets/img/banner1.jpg">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="<?php echo base_url()?>assets/img/banner4.jpg">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="<?php echo base_url()?>assets/img/banner3.jpg">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="row">
                <?php foreach($productos as $value){?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="col-item">
                        <div class="photo">
                            <img src="<?php echo base_url()?>assets/img/amazon.jpg" class="img-responsive"/>
                        </div>
                        <div class="card-body">
                            <div class="info">
                                <div class="col-md-12">
                                    <label class="card-title"><?php echo $value['modelo'];?></label>
                                </div>
                                <div class="separator clear-left clearfix">
                                    <p class="btn-add price-p">
                                        <a class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>Agregarr</a>
                                    </p>
                                    <p class="pricetext"><?php echo "$ ".$value['precio'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <!-- /.row -->

          </div>
          <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

      </div>
    </div>
    <!-- /.container -->
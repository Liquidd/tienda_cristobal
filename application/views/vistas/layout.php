<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GA | Recompensas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <h1>navbar</h1>
    </nav>
    <header>
        <h1>header</h1>
    </header>
    <div class="container">
        <?php echo $content;?>
    </div>
    <footer>
        <div class="container">
            <div class="row">    
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <span class="logo">LOGO</span>
                </div>            
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <ul class="menu">
                        <span>Menu</span>    
                        <li>
                            <a href="#">Home</a>
                        </li>                           
                        <li>
                            <a href="#">About</a>
                        </li>                           
                        <li>
                            <a href="#">Blog</a>
                        </li>                           
                        <li>
                            <a href="#">Gallery </a>
                        </li>
                    </ul>
                </div>       
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <ul class="menu">
                        <span>Contact</span>       
                        <li>
                            <a href="#">Phone</a>
                        </li>
                        <li>
                            <a href="#">Adress</a>
                        </li> 
                        <li>
                            <a href="#">Email</a>
                        </li> 
                    </ul>
                </div>       
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <ul class="adress">
                        <span>Adress</span>    
                        <li>
                            <p>Lorem ipsum dolor sit amet, vero omnis vocibus</p>
                        </li>
                        <li>
                            <p>+90 1234 56789</p>
                        </li>
                        <li>
                            <p>info@gmail.com</p>
                        </li>
                    </ul>
                </div>           
            </div> 
        </div>
    </footer>
 
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');

body{
    font-family: 'Roboto', sans-serif;
}

footer{
     background-color: #f5f5f5;
     padding:30px 0px; 
}	       

.search-text{
    background-color: #f5f5f5;
	padding-top:60px;
	padding-bottom:60px;
}
	
.search-text .input-search{
	height:45px;
	width:40%;
	padding-left:20px;
    color:#333;
} 

.search-text .btn-search{
    background: #545454;
    font-family:Roboto;
    border:none;
	color:#FFF;
	height: 45px;
    width: 80px;
}

.search-text h4{
    color:#888582;
    font-weight: 700;
}

.logo{
    color:#888582;
    font-weight:800;
    font-size:30px;
}

.adress , .menu{
    list-style: none;    
}

.adress span , .menu span{
   color:#888582; 
   font-weight: 800; 
   border-bottom: 1px solid #c7c7c7; 
   padding-bottom: 10px; 
   margin-bottom: 20px;
   display: block;
   text-transform: uppercase;
   font-size: 16px;
   letter-spacing: 3px;
}

.adress p , .menu li a {
    color:#888582;
    letter-spacing: 2px;
    font-size:15px;
    text-decoration:none;
}

</style>
<div class="container">
    <div class="tabs">
		<div class="row">
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked flex-column">
					<li class="active"><a href="#tab_a" data-toggle="pill">TAB 1</a></li>
					<li><a href="#tab_b" data-toggle="pill">TAB 2</a></li>
					<li><a href="#tab_c" data-toggle="pill" id="alta">Alta de Productos</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div class="tab-content">
					<div class="tab-pane active" id="tab_a">
							<h3>First tab with soft transitioning effect.</h3>
							<p>American Builders Inc. is your full service general contractor. We have been helping 
								clients throughout Eastern North Carolina with their construction needs since 1996.
								We take pride in understanding our clients' needs, making their construction experience 
								as worry free as possible and only delivering a finished product that will withstand the
							test of time. </p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod 
							bibendum laoreet.</p>
					</div>
					<div class="tab-pane" id="tab_b">
							<h3>Second tab with soft transitioning effect.</h3>
							<p>We maintain a reputation for effective communication and collaboration between our 
								team and clients to minimize surprises and ensure precise project delivery. Lorem ipsum 
								dolor sit amet, consectetur adipiscing elit. Aenean euismod 
								bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra 
								justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque 
							penatibus et magnis dis parturient montes.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod 
							bibendum laoreet.</p>
					</div>
					<div class="tab-pane" id="tab_c">
                        <h3>Third tab with soft transitioning effect.</h3>
                        <p>
                            <div class="col-md-3">
                                <form>
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input type="text" class="form-control" id="system-search" placeholder="Search for" required>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-light"><i class="fas fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </p>
                        <div class="col-md-10">
                            <table class="table table-list-search" id="table_productos">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                        <th>Subcategoria</th>
                                        <th>Precio</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
            </div>
	    </div>
    </div>
</div>
<style>
    .tabs{
    background-color:#f5f5f5;
    padding-top:30px;
    padding-bottom:30px;
    }
    .tabs .tab-pane{
    margin-left:20px;
    }

    .tabs h3{
    font-size:20px;
    margin-top:10px;
    margin-bottom:60px;
    }

    .tabs p{
    font-size:14px;
    }

    .tabs a{
    font-size:15px;
    font-family:OpenSans,sans-serif;
    font-weight:700;
    color:#fff;
    padding:30px;
    }

    .tabs li{
    background-color:#333;
    margin-top:1px;
    text-align:center;
    height:110px;
    width:110px;
    padding-top:45px;
    -webkit-border-radius:3px;
    border-radius:3px;
    }

    .tabs li.active{
    background-color:#ff8b38;
    }
</style>
<script>
    $(function() {
	    var $a = $(".tabs li");
	    $a.click(function() {
		    $a.removeClass("active");
		    $(this).addClass("active");
	    });
    });
    $(document).ready(function() {

        var activeSystemClass = $('.list-group-item.active');

        //something is entered in search form
        $('#system-search').keyup( function() {
        var that = this;
            // affect all table rows on in systems table
            var tableBody = $('.table-list-search tbody');
            var tableRowsClass = $('.table-list-search tbody tr');
            $('.search-sf').remove();
            tableRowsClass.each( function(i, val) {
            
                //Lower text for case insensitive
                var rowText = $(val).text().toLowerCase();
                var inputText = $(that).val().toLowerCase();
                if(inputText == ''){
                    $('.search-query-sf').remove();
                }

                if( rowText.indexOf( inputText ) == -1 )
                {
                    //hide rows
                    tableRowsClass.eq(i).hide();
                    
                }
                else
                {
                    $('.search-sf').remove();
                    tableRowsClass.eq(i).show();
                }
            });
            //all tr elements are hidden
            if(tableRowsClass.children(':visible').length == 0)
            {
                tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        console.log("inicio 3");
        console.log(base_url);
        $("#alta").click(function(){
            $('#table_productos tbody').html('');
            $.post(base_url+'productos/lista_productos', function(respuesta){
                console.log(respuesta);
            var datos = JSON.parse(respuesta);
            $.each(datos, function(i, val){
                $("#table_productos tbody").append('<tr>'+
                    '<td>'+'<span class="icon-wrap text-primary"><i class="far fa-file-image"></i></span>'+
                    '<td>'+ val.modelo+'</td>'+
                    '<td>'+ val.marca +'</td>'+
                    '<td>'+ val.categoria +'</td>'+
                    '<td>'+ val.subcategoria +'</td>'+
                    '<td>'+ val.precio +'</td>'+
                    '<td>'+
                    '<button type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>'+
                    '<button type="button" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>'+
                    '</td></tr>');        
                });        
            });
        });
    });
</script>
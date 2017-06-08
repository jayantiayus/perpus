<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Perpustakaan</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="<?php echo base_url('') ?>assets/DataTables/datatables.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<!--header-->
<div class="navbar navbar-default">
                <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Polinema</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url('home_admin');?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						 <li class="active"><a href="<?php echo site_url('kategori');?>"><i class="glyphicon glyphicon-home"></i>Kategori</a></li>
                     
                    </ul>

                    <div class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('web/cari_buku');?>" method="post">
                            <div class="form-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari Buku">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
                  
                        </form>
                    </div>

                </div><!--/.nav-collapse -->
                </div>
            </div>
 

                    <!--LIST TABEL-->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php echo form_open('kategori/update/'.$this->uri->segment(3)); ?>
								<legend>Edit Data Kategori</legend>
								<?php echo validation_errors(); ?>
								
								<div class="form-group">
									<label for="">ID Kategori</label>
									<input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="input field" value="<?php echo $kategori[0]->id_kategori ?>">
								</div>
								
								
								<div class="form-group">
									<label for="">Nama Kategori</label>
									<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="input field" value="<?php echo $kategori[0]->nama_kategori ?>">
								</div>
								
								<br>
								<div>
									<button type="submit" class="btn btn-primary">Simpan</button>
									<?php echo form_close(); ?>
								</div>
	
								



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="<?php echo base_url('') ?>assets/DataTables/datatables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script>
            $(document).ready(function(){
                $('#example').DataTable();
            });
        </script>
	</body>
</html>
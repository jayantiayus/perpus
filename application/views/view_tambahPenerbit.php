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

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <?php echo form_open_multipart('penerbit/create/'.$this->uri->segment(3)); ?>
                                                <legend>Tambah Data Penerbit</legend>
                                                <?php echo validation_errors(); ?>

                                                <?php if ($this->session->flashdata('pesan')): ?>
                                                    <div class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <?php echo  $this->session->flashdata('pesan') ?>
                                                    </div>  
                                                <?php endif ?> 
                                                
                                                <div class="form-group">
                                                    <label for="">Kode Penerbit</label>
                                                    <input type="text" class="form-control" id="kode_penerbit" name="kode_penerbit" placeholder="Input field" >
                                                
                                                    <label for="">Nama Penerbit</label>
                                                    <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Input field" >
                                                </div>
                                            
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
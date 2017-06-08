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

<!-- sidebar-->
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
<div class="container-fluid">
<div class="row content">
<div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" ><span class="glyphicon glyphicon-folder-close">
                                        </span> Master</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-success"></span> <a href="<?php echo site_url('buku');?>">Data Buku</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('kategori');?>">Data Kategori</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('Anggota');?>">Data Anggota</a>
                                                </td>
                                            </tr>
                                        
                                             <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('penerbit');?>">Data Penerbit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('pengarang');?>">Data Pengarang</a>
                                                </td>
                                            </tr>

                                            

                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" ><span class="glyphicon glyphicon-folder-close">
                                        </span> Transaksi</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('peminjaman');?>">Data Peminjaman</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('pengembalian');?>">Data Pengembalian</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>    

                            </div>
                            </div>

<!--Logout -->
<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('login/logout');?>"><span class="glyphicon glyphicon-off">
                            </span> Logout</a>
                        </h4>
                    </div>
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
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
 

                    <!--LIST TABEL-->
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<h1>Daftar Buku</h1>

						 <?php if ($this->session->flashdata('pesan')): ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo  $this->session->flashdata('pesan') ?>
							</div>	
						<?php endif ?> 

						<div class="table-responsive">
						
							
							<table class="table table-bordered table-hover">
								
									<tr>
										<th>Kode Buku</th>
										<th>Cover</th>
										<th>Judul</th>
										<th>Kategori</th>
										<th>Penerbit</th>
										<th>Pengarang</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($buku_list as $key) { ?>
									<tr>
										<td><?php echo $key->kode_buku ?></td>
										<td><img width="100" height="150" src="<?=base_url()?>assets/upload/<?=$key->foto?>"></td>
										<td><?php echo $key->judul ?></td>
										<td><?php echo $key->nama_kategori ?></td>
										<td><?php echo $key->nama_penerbit ?></td>
										<td><?php echo $key->nama_pengarang ?></td>
										<td>
										      <a href="<?php echo site_url('buku/update/').$key->kode_buku ?>" type="button" class="btn btn-warning">Edit<i class="glyphicon glyphicon-edit"></i>
                                              </a>

										      <a href="<?php echo site_url('buku/delete/').$key->kode_buku ?>" type="button" class="btn btn-danger" onClick="JavaScript: return confirm('Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i>Delete
                                              </a>
										</td>
									</tr>

								<?php } ?>
								<tr>
									<a href="<?php echo site_url('buku/create/')?>" type="button" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"> </i>Tambah
                                    </a>
									<br>
								</tr>
                                <br>
								</tbody>
							</table>
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
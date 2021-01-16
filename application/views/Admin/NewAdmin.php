<?php
if (isset($this->session->userlogin)==FALSE) {
redirect(); //= memanggil routes nya boleh di isi redirect('signin/login')
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- icon title -->
    <link rel="icon" href="<?php echo base_url('koperasi.jpg') ?>" type="image/ico" />
	<title>Input Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- untuk hape -->
	<meta http-equiv="content-Language" content="en-us">
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo base_url('image/era.jpg') ?>" type="image/ico" />
	<script src="<?php echo base_url('assets/DataTables/datatables.min.js') ?>"></script>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/jqvmap/jqvmap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/daterangepicker/daterangepicker.css');?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/summernote/summernote-bs4.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- AutoComplete  -->
  <link rel="stylesheet" href="<?php echo base_url('assets/jquery/jquery-ui.css');?>">
</head>
<!-- Menu atas  -->
<?php $this->load->view('Navbar'); ?>
<!-- Menu Samping -->
  <?php $this->load->view('Aside'); ?>

<body class="nav-md">
		<div class="container body">
			<div class="main_container">
		        <div class="content-wrapper">
                    <section class="content">
                      <div class="container-fluid">
                        <div class="col-sm-12">
                            <!-- untuk isi -->
                            <div class="panel panel-info">
                                <div class="panel-heading">Formulir Input Admin</div><br>
                                    <div class="panel-body">
                                                    <?php if (isset($pesan)) {?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"> X </button>
                                                            <h4>Peringatan</h4>
                                                            <?php echo $pesan; ?>
                                                        </div>
                                                        <?php 
                                                                            } ?>
                                            <!-- awal pembuatan form -->
                                    <form class="form-horizontal" action="<?php echo base_url('CAdmin/saveT') ?>" method="POST" name="formbook" enctype="multipart/form-data">
                                      <div class="row">
                                          <div class="col-sm">
                                            
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Username</label>
                                                <div class="col-sm-2">
                                                <input type="text" name="username" id="username" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">No Nasabah</label>
                                                <div class="col-sm-2">
                                                <input type="text" name="nasabah" id="nasabah" required>
                                                <button id="btnPop" type="button" class="btn btn-info btn-xs btn_PP">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label class="col-sm-3 control-label">Email</label>
                                                    <div class="col-sm-2">
                                                    <input name="email" id="email" required>
                                                    </div>
                                                </div>
                                         
                                            
                                            </div>
                                
                                        <div class="col-sm">
                                             
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Nama Depan</label>
                                                    <div class="col-sm-2">
                                                    <input type="text" name="depan" id="depan" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Nama Belakang</label>
                                                    <div class="col-sm-2">
                                                    <input type="text" name="belakang" id="belakang" onkeypress ="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Password</label>
                                                    <div class="col-sm-2">
                                                    <!-- <input type="text" name="ket" onkeypress =""> -->
                                                    <input name="Pass" id="Pass" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Hak Akses</label>
                                                    <div class="col-sm-5">
                                                    <select  class="form-control " id="akses" name="akses" required>
                                                    <option value="">Pilih Hak Akses</option> 
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-2 control-label"></label>
                                                        <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary" name="proses" value="proses"><span class="glyphicon glyphicon-save"></span>Simpan</button>
                                                        </div>
                                                </div>                                  
                                              
                                                
                                        </div>
                                   
                                          
                              
                                  <!-- Tutup Form -->
                                        </div>           
                                      </form>                                      
                                        
                                                
                                      </div>
                                  </div>
                              </div>
            
                    
                    
                    
                        </div>
                      </div>
                    </section>
                </div>
          </div>     
      </div>
	  <!-- footer -->
      <?php $this->load->view('Footer'); ?>		  

</body>

           <!--pop up nomor nasabah  -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Nasabah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                      <div style="overflow: auto;">
                        <table class="table" id="tb_PP">
                         <thead>
                            <th>No.</th>
                            <th>No Nasabah</th>
                            <th>Nama Nasabah</th>
                            <th>Jenis Kelamin</th>
                            <th>Identitas</th>

                         </thead>
                         <tbody>
                          <?php 
                            $n=0;
                            foreach ($datanasa->result() as $row) {
                              $n++;
                              ?>
                                <tr>
                                <td><?php echo $n; ?></td>
                                <td><span><?php echo $row->nomor_nasabah; ?></span></td>
                                <td><span><?php echo $row->nama_nasabah; ?></span></td>
                                <td><span><?php echo $row->jenis_kelamin; ?></span></td>
                                <td><span><?php echo $row->type_identitas; ?></span></td>
                                
                                <td>
                                  <button  class="btn btn-danger btn_pilih"><i class=""></i>SELECT</buttton>
                                </td>

                                </tr>
                                
                                
                                <?php }
                          ?>
                         </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>


<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/demo.js')?>"></script>
    
</html>
<script type="text/javascript">
         $("#btnPop").click(function(){
            $("#myModal").find(".modal-dialog").css({width:'800'});
            $('#myModal').modal('show');
            })

            $(".btn_pilih").click(function(){
            alert('aa');
            // index=$(this).parent().parent().index();
            // NoNasabah=$("#tb_PP tbody tr:eq("+index+") td:nth-child(4) span").text();
            // nama=$("#tb_PP tbody tr:eq("+index+") td:nth-child(5) span").text();

            // $("#nasabah").val(NoNasabah);
            // // $("#nama").text(nama);
           
            // $("#myModal").modal("hide");
            })
                      
		function hanyaAngka(evt) {
				// alert('a');
				  var charCode = (evt.which) ? evt.which : event.keyCode;
				   if (charCode > 31 && (charCode < 48 || charCode > 57))
		 
				    return false;
				  return true;
				}
				function hanyaChar(evt){
				// alert('a');

					 var charCode = (evt.which) ? evt.which : event.keyCode;
			         if ((charCode < 65) || (charCode == 32))
			            return false;        
			         return true;
				}

</script>



<!-- <?php if (isset($pesan)) {?>
<?php if($pesan !== ""){ ?>
	<label id="pesan"><?php echo $pesan; ?></label>
	<script type="text/javascript">
		$(document).ready(function(){
			var pesan = $("label#pesan").text();
			$.alert({
			    title: 'Duplicate!',
			    content: pesan,
			});
		});
	</script>

<?php } } ?> -->


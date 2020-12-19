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
                                    <form class="form-horizontal" action="<?php echo base_url('CAdmin/updateT') ?>" method="POST" name="formbook" enctype="multipart/form-data">
                                      <div class="row">
                                          <div class="col-sm">
                                            
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Username</label>
                                                <div class="col-sm-2">
                                                <input type="hidden" name="loginid" id="loginid" value="<?php echo $data->login_id; ?>" readonly >
                                                <input type="text" name="username" id="username" value="<?php echo $data->username; ?>" readonly disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">No Nasabah</label>
                                                <div class="col-sm-2">
                                                <input type="text" name="nasabah" id="nasabah" value="<?php echo $data->nomor_nasabah; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label class="col-sm-3 control-label">Email</label>
                                                    <div class="col-sm-2">
                                                    <input name="email" id="email" value="<?php echo $data->email; ?>">
                                                    </div>
                                                </div>
                                         
                                            
                                            </div>
                                
                                        <div class="col-sm">
                                             
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Nama Depan</label>
                                                    <div class="col-sm-2">
                                                    <input type="text" name="depan" id="depan" value="<?php echo $data->namadepan; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Nama Belakang</label>
                                                    <div class="col-sm-2">
                                                    <input type="text" name="belakang" id="belakang" value="<?php echo $data->namabelakang; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Password</label>
                                                    <div class="col-sm-2">
                                                    <!-- <input type="text" name="ket" onkeypress =""> -->
                                                    <input name="Pass" id="Pass" value="<?php echo $data->PASSWORD; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Hak Akses</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" name="hak" id="hak" value="<?php echo $data->hak_akses; ?>" readonly disabled>
                                                    <select  class="form-control " id="akses" name="akses">
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
                                                        <!-- <a href="<?//php echo base_url('CAdmin'); ?>">
                                                        <button type="cancel" class="btn btn-danger" name="cancel" value="cancel"><span class="glyphicon glyphicon-back"></span>Cancel</button>
                                                        </a> -->
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
            $('#tgl').on('change', function() {
                tgl=$('#tgl').val();
                var bln = new Date(tgl).getMonth();

                $('#bln').val(bln);
            });

        $( "#nomor" ).autocomplete({
                source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url: "<?=base_url()?>CTabungan/autocomp",
                    type: 'post',
                    dataType: "json",
                    data: {
                    term: request.term
                    },
                    success: function( data ) {
                        // console.log(data);
                        response( data );
                    }
                });
                },
                select: function (event, ui) {
                // Set selection
                //   $('#no_pengajuan').val(ui.item.label); // display the selected text
                $('#nomor').val(ui.item.value); // save selected id to input
                $.ajax({
                    url: "<?php echo base_url(''); ?>" + 'CTabungan/get_nasabah/' + ui.item.value,
                    type: "post",
                    dataType: "json",
                    success:function(data){
                        console.log(data);
                        $("#nomor").val(data.nomor_nasabah);
                        $("#nomorL").text(data.nama_nasabah);
                    }
                })
                return false;

                }
            }); 
                    function bacaGambar(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                    
                        reader.onload = function (e) {
                            $('#preview').attr('src', e.target.result);

                        }
                    
                        reader.readAsDataURL(input.files[0]);
                    }
                    }
                    function ReviewPic(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                    
                        reader.onload = function (e) {
                            $('#preview1').attr('src', e.target.result);

                        }
                    
                        reader.readAsDataURL(input.files[0]);
                    }
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


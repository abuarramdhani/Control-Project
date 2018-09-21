<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Control Of Activity PT.TBS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/3.3.6.bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/1.12.2.bootstrap-select.min.css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Welcome Back, <?php echo $this->session->userdata('ses_nama');?>! As <?php echo $this->session->userdata('akses');?></a>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <?php $this->load->view('menu');?>

            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header"><center>OPERASIONAL FORM</center></h1>
                <div  style="padding-bottom: 10px">
                    <a href="<?php echo base_url()."index.php/pagecontrol/dashOP"?>"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left  "></i>  BACK</button></a>
                </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-offset-2">
                                <div class="col-lg-8">
                                    <form role="form" method="post" action="<?php echo base_url()."index.php/pagecontrol/simpanOP"; ?>">
                                   		 <div class="form-group">
                                         <?php foreach ($editop as $p) { ?>
                                            <label>IMO</label>
                                            <input type="text" class="form-control" value="<?php echo $p->IMO ?>" name="IMO" >
                                        </div>
                                        <div class="form-group">
                                            <label>No. & Size Container</label>
                                            
                                            <select name="no_container" id="no_container" class="form-control selectpicker" data-live-search="true" multiple >
                                            <option selected="selected" ><?php echo $p->no_container ?> </option>
                                            <?php foreach ($nocon as $c) { ?>
                                            <option value="<?php echo $c->no_container?>  <?php echo $c->size?>"><?php echo $c->no_container?>  <?php echo $c->size?></option>
                                            <?php } ?>
                                            </select>
                                            <input type="hidden" name="hidden_nocon" id="hidden_nocon">
                                            <p class="help-block">Type No. Container...</p>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Shipment</label>
                                            <input type="text" class="form-control" value="<?php echo $p->no_shipment ?>" name="no_shipment" >
                                        </div>
                                        <div class="form-group">
                                            <label>No. Seal</label>
                                            <input type="text" class="form-control" name="no_seal" value="<?php echo $p->no_seal ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Full / Empty</label>
                                            <input type="text" class="form-control" name="full_empty" value="<?php echo $p->full_empty ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Stuffing Date</label>
                                            <input type="text" class="form-control" name="stuff_date" value="<?php echo $p->stuff_date ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Origin Town</label>
                                            <input type="text" class="form-control" name="origin_town" value="<?php echo $p->origin_town ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Delivery Date (ETD)</label>
                                            <input type="Date" class="form-control" name="deliv_date" value="<?php echo $p->deliv_date ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Destination Town</label>
                                            <input class="form-control" name="dest_town" value="<?php echo $p->dest_town ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Vessel Name</label>
                                            <input class="form-control" name="vessel_name" value="<?php echo $p->vessel_name ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Arrive At Destination (ETA)</label>
                                            <input type="date" class="form-control" name="arv_at_dest" value="<?php echo $p->arv_at_dest ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Unload At Conc</label>
                                            <input class="form-control" type="date" name="unload_at_conc" value="<?php echo $p->unload_at_conc ?>">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>

                                        <?php } ?>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.col-lg- -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>assets/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url()?>assets/3.1.0.jquery.min.js" ></script>

    <script src="<?php echo base_url()?>assets/3.3.7.bootstrap.min.js" ></script>

    <script src="<?php echo base_url()?>assets/1.12.2.bootstrap-select.min.js" ></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function(){
        $('.selectpicker').selectpicker();

        $('#no_container').change(function(){
        $('#hidden_nocon').val($('#no_container').val());
        });

        $('#multiple_select_form').on('submit', function(event){
        event.preventDefault();
        if($('#no_container').val() != '')
            {
                var form_data = $(this).serialize();
                $.ajax({
                url:"<?php echo base_url('index.php/pagecontrol/insertno_con')?>",
                method:"POST",
                data:form_data,
                success:function(data)
            {
             $('#hidden_nocon').val('');
             $('.selectpicker').selectpicker('val', '');
             alert(data);
            }
           })
          }
          else
          {
           alert("Please select no container");
           return false;
          }
         });
        });
    </script>

</body>

</html>

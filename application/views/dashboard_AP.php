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

    <!-- Data Tables CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css_table/jquery.dataTables.css"> -->

<!-- cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css -->
</head>

<body>
<style>
.dtHorizontalExampleWrapper {
  max-width: 600px;
  margin: 0 auto;
}
#dtHorizontalExample th, td {
  white-space: nowrap;
}
</style>
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
                    <h1 class="page-header"><center>CONTROL OF ACTIVITY PT.TBS</center></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Keterangan Warna : <br>
                            <div class="col-md-6">
                            <img src="<?php echo base_url(); ?>assets/image/agen.jpg" width=30px> Agen 
                            <br><img src="<?php echo base_url(); ?>assets/image/genset.jpg" width=30px> Genset
                            <br><img src="<?php echo base_url(); ?>assets/image/ship.jpg" width=30px> Ship
                            <br><img src="<?php echo base_url(); ?>assets/image/thc.jpg" width=30px> THC
                            </div>
                            <div class="col-md-6">
                            <br><img src="<?php echo base_url(); ?>assets/image/handling.jpg" width=30px> Handling
                            <br><img src="<?php echo base_url(); ?>assets/image/plug.jpg" width=30px> Plug
                            <br><img src="<?php echo base_url(); ?>assets/image/lain.jpg" width=30px> Lain
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-lg-12">
                <div class="col-md-offset-11" style="padding-bottom: 10px">
                    <a href="<?php echo base_url()."index.php/pagecontrol/formAP"?>"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>  ADD</button></a>
                </div>
                     <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Data AP Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <div class="table-responsive-sm">
                            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>IMO</th>
                                        <th style="background-color: khaki">Name AGEN</th>
                                        <th style="background-color: khaki">Invoice AGEN</th>
                                        <th style="background-color: khaki">Invoice AGEN date</th>
                                        <th style="background-color: khaki">Payment AGEN</th>
                                        <th style="background-color: khaki"></th>
                                        <th style="background-color: khaki">Payment Date AGEN</th>

                                        <th style="background-color: lavender">Rental GENSET</th>
                                        <th style="background-color: lavender">Invoice GENSET</th>
                                        <th style="background-color: lavender">Invoice GENSET date</th>
                                        <th style="background-color: lavender">Payment GENSET</th>
                                        <th style="background-color: lavender"></th>
                                        <th style="background-color: lavender">Payment Date GENSET</th>

                                        <th style="background-color: lightsteelblue">Name SHIP</th>
                                        <th style="background-color: lightsteelblue">Invoice SHIP</th>
                                        <th style="background-color: lightsteelblue">Invoice SHIP date</th>
                                        <th style="background-color: lightsteelblue">Payment SHIP</th>
                                        <th style="background-color: lightsteelblue"></th>
                                        <th style="background-color: lightsteelblue">Payment Date SHIP</th>

                                        <th style="background-color: lightpink">Invoice THC</th>
                                        <th style="background-color: lightpink">Invoice THC date</th>
                                        <th style="background-color: lightpink">Payment THC</th>
                                        <th style="background-color: lightpink"></th>
                                        <th style="background-color: lightpink">Payment Date THC</th>

                                        <th style="background-color: moccasin">Invoice HANDLING</th>
                                        <th style="background-color: moccasin">Invoice HANDLING date</th>
                                        <th style="background-color: moccasin">Payment HANDLING</th>
                                        <th style="background-color: moccasin"></th>
                                        <th style="background-color: moccasin">Payment Date HANDLING</th>

                                        <th style="background-color: palegreen">Invoice PLUG</th>
                                        <th style="background-color: palegreen">Invoice PLUG date</th>
                                        <th style="background-color: palegreen">Payment PLUG</th>
                                        <th style="background-color: palegreen"></th>
                                        <th style="background-color: palegreen">Payment Date PLUG</th>

                                        <th style="background-color: plum">Invoice LAIN</th>
                                        <th style="background-color: plum">Invoice LAIN date</th>
                                        <th style="background-color: plum">Payment LAIN</th>
                                        <th style="background-color: plum"></th>
                                        <th style="background-color: plum">Payment Date LAIN</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($dataAP as $ap) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $ap->IMO ?></td>
                                        <td><?php echo $ap->name_ag ?></td>
                                        <td><?php echo $ap->inv_ag ?></td>
                                        <td><?php echo $ap->inv_ag_date ?></td>
                                        <td><?php echo $ap->pay_ag ?></td>
                                        <td><a href="detAgen/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_ag ?></td>
                                        
                                        <td><?php echo $ap->rent_genset ?></td>
                                        <td><?php echo $ap->inv_genset ?></td>
                                        <td><?php echo $ap->inv_genset_date ?></td>
                                        <td><?php echo $ap->pay_genset ?></td>
                                        <td><a href="detGenset/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_genset ?></td>
                                        
                                        <td><?php echo $ap->name_ship ?></td>
                                        <td><?php echo $ap->inv_ship ?></td>
                                        <td><?php echo $ap->inv_ship_date ?></td>
                                        <td><?php echo $ap->pay_ship ?></td>
                                        <td><a href="detShip/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_ship ?></td>

                                        <td><?php echo $ap->inv_thc ?></td>
                                        <td><?php echo $ap->inv_thc_date ?></td>
                                        <td><?php echo $ap->pay_thc ?></td>
                                        <td><a href="detTHC/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_thc ?></td>

                                        <td><?php echo $ap->inv_handl ?></td>
                                        <td><?php echo $ap->inv_handl_date ?></td>
                                        <td><?php echo $ap->pay_handl ?></td>
                                        <td><a href="detHandl/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_handl ?></td>

                                        <td><?php echo $ap->inv_plug ?></td>
                                        <td><?php echo $ap->inv_plug_date ?></td>
                                        <td><?php echo $ap->pay_plug ?></td>
                                        <td><a href="detPlugap/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_plug ?></td>

                                        <td><?php echo $ap->inv_lain ?></td>
                                        <td><?php echo $ap->inv_lain_date ?></td>
                                        <td><?php echo $ap->pay_lain ?></td>
                                        <td><a href="detLain/<?php echo $ap->IMO; ?>">details</a></td>
                                        <td><?php echo $ap->date_lain ?></td>
                                        <td>
                                        <a href="editAP/<?php echo $ap->IMO; ?>"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></button> </a>  
                                        </td>
                                    </tr>  
                                    <?php } ?>
                                             
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>

                <!-- /.col-lg-6 -->
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

    <!-- Data Tables JQuery  -->
    <!-- <script type="text/javascript" charset="utf8" src="<?php echo base_url()?>assets/js_table/jquery.dataTable.js"></script> -->

    <!-- Page-Level Data Tables Scripts - Tables - Use for reference -->
   <!--  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        });
    </script> -->

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function () {
  $('#dtHorizontalExample').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
});
    // $(document).ready(function() {
    //     $('#dataTables-example').DataTable({
    //         responsive: true
    //     });
    // });
    </script>

</body>

</html>

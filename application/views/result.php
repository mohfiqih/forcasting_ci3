<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <title>Data Forcasting CodeIgniter 3 </title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
     <link rel="stylesheet" type="text/css" href="assets/style.css">
     <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
     <!-- partial:index.partial.html -->
     <header class="header">
          <div class="header-content responsive-wrapper">
               <div class="header-logo">
                    <a href="#" style="text-decoration: none;color: black;">
                         <div>
                              <img src="https://assets.codepen.io/285131/untitled-ui-icon.svg" />
                         </div>
                         <h5 style="margin-left: 10px;margin-top: 7px;">UAS Forecasting</h5>
                         <!-- <img src="https://assets.codepen.io/285131/untitled-ui.svg" /> -->
                    </a>
               </div>
               <div class="header-navigation">
                    <nav class="header-navigation-links">
                    </nav>
                    <div class="header-navigation-actions">
                         <a href="" style="text-decoration: none;color: black;">Moh. Fiqih Erinsyah</a>
                         <a href="#" class="avatar">
                              <img src="https://assets.codepen.io/285131/hat-man.png" alt="" />
                         </a>
                    </div>
               </div>
               <a href="#" class="button">
                    <i class="ph-list-bold"></i>
                    <span>Menu</span>
               </a>
          </div>
     </header>
     <div class="row">
          <div class="col-md-12" style="margin-top: 0px!important">
               <div class="responsive-wrapper">
                    <div class="content-header">
                         <div class="content-header-intro">
                              <h2>Data Forecasting</h2>
                              <p>Rumus :</p>
                              <div class="row">
                                   <div class="col-md-3">
                                        <p>α = 0.2<br />1-α = 0.8</p>

                                   </div>
                                   <div class="col-md-4">
                                        <p>MAD = Y - Y'<br />MSE = (Y - Y')^2 <br />MAPE = (Y - Y')/Y</p>
                                   </div>
                                   <div class="col-md-4">
                                        <p>Y' = <br /> Nilai asli * α + (1-α) * Nilai Asli pertama</p>
                                   </div>
                              </div>
                         </div>
                         <div class="content-header-actions">
                              <a href="#" class="button">
                                   <i class="ph-faders-bold"></i>
                                   <span>Filters</span>
                              </a>
                              <a href="#" class="button" style="text-decoration: none;">
                                   <span>+ Coba Predict</span>
                              </a>
                         </div>
                    </div>
                    <div class="card">
                         <div class="card-body">
                              <div style="overflow: auto;">
                                   <h5>Result :</h5>
                                   <?php foreach($hasil['data'] as $k=>$v) { ?>
                                   <br /><br />
                                   <p>Konstant (a) : <?= $k ?></p>
                                   <table class="table table-striped table-hover table-vcenter display">
                                        <thead>
                                             <tr>
                                                  <th>Periode</th>
                                                  <th>Nilai Sebenarnya</th>
                                                  <th>Forcast</th>
                                                  <!-- <th>MSE</th> -->
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach($v as $n => $val) { ?>
                                             <tr>
                                                  <td><?= $val['periode'] ?></td>
                                                  <td><?= $val['xt'] ?></td>
                                                  <td><?= $val['ft'] ?></td>
                                             </tr>
                                             <?php } ?>

                                        </tbody>
                                        <tfoot>
                                             <!-- <tr>
                                                  <th colspan="3">Root Mean Square Error (RMSE)</th>
                                                  <th><?= $hasil['total']['rmse'][$k] ?></th>
                                             </tr> -->
                                             <tr>
                                                  <th colspan="3">Mean Precentage Absolute Error (MSE)</th>
                                                  <th><?= $hasil['total']['mse'][$k] ?></th>
                                             </tr>
                                             <tr>
                                                  <th colspan="3">Mean Square Error (MAPE)</th>
                                                  <th><?= $hasil['total']['mape'][$k] ?></th>
                                             </tr>

                                             <!-- <tr>
                                                  <th colspan="3">Mean Absolute Error (MAE)</th>
                                                  <th><?= $hasil['total']['mae'][$k] ?></th>
                                             </tr> -->
                                        </tfoot>
                                   </table>
                                   <?php } ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div><br /><br />
     <!-- partial -->
     <script src='https://unpkg.com/phosphor-icons'></script>
     <script src="assets/script.js"></script>

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

     <script>
     $(document).ready(function() {
          $('#myTable').DataTable();
     });
     </script>


</body>

</html>

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
                              <p>Rumus : Konstan didapatkan dari total bulan dari tabel</p>
                              <?php 
							# deklarasi forcast
							# jumlah bulan ada 7 bulan (Januari 2003 - Juli 2003)
							$bulan = 7;
							$alpha = 2/($bulan+1); //0,25
							//Xt = (1 -a)
							$satu_alpha = 1-$alpha; // 0,75

						?>
                              <div class="row">
                                   <div class="col-md-4">
                                        <p>Konstant (α) = <?php echo $alpha; ?><br />1-α = <?php echo $satu_alpha; ?>
                                        </p>

                                   </div>
                                   <div class="col-md-4">
                                        <p>MAD = Y - Y'<br />MSE = (Y - Y')^2 <br />MAPE = (Y - Y')/Y</p>
                                   </div>
                                   <div class="col-md-4">
                                        <p>Y' = <br /> Data aktual * α + (1-α) * Data aktual</p>
                                   </div>

                              </div>
                         </div>
                         <!-- <div class="content-header-actions">
                              <a href="#" class="button">
                                   <i class="ph-faders-bold"></i>
                                   <span>Filters</span>
                              </a>
                              <a href="#" class="button" style="text-decoration: none;">
                                   <span>+ Coba Predict</span>
                              </a>
                         </div> -->
                    </div>
                    <div style="overflow: auto;">
                         <table class="table table-striped table-hover table-vcenter display" id="myTable">
                              <thead>
                                   <tr>
                                        <th width="10px" scope="col">No</th>
                                        <th width="120px" scope="col">Tanggal</th>
                                        <th width="125px" scope="col">Data Aktual</th>
                                        <th scope="col" width="125px">Forecast</th>
                                        <th scope="col">MAD</th>
                                        <th scope="col">MSE</th>
                                        <th scope="col" width="125px">MAPE</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php 
							$no = 0+1;

							# deklarasi forcast
							# jumlah bulan ada 7 bulan (Januari 2003 - Juli 2003)
							$bulan = 7;
							$alpha = 2/($bulan+1); //0,25
							//Xt = (1 -a)
							$satu_alpha = 1-$alpha; // 0,75

							foreach($data_forecast as $d){ 
								$total_data = 42;
								$Y = 180;
								$y1 = ($alpha*$Y);
								$y2 = ($satu_alpha*($d->banyakOrder));
								$data_sebelumnya = $y1+$y2;

								$mad = abs(($d->banyakOrder)-$data_sebelumnya);
								$mse = pow((($d->banyakOrder)-$data_sebelumnya), 2);
								$mape = abs((($d->banyakOrder)-$data_sebelumnya)/($d->banyakOrder));
								
								// $jumlah_mad = array_sum($mad);

								$rata_mad = 303 / 42;
								$rata_mse = 3049.375 / 42 ;
								$rata_mape = 2.19040615 / 42 ;
							?>
                                   <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $d->orderDate; ?></td>
                                        <td><?php echo $d->banyakOrder; ?></td>
                                        <td><?php echo $data_sebelumnya; ?></td>
                                        <td><?php echo $mad; ?></td>
                                        <td><?php echo $mse; ?></td>
                                        <td><?php echo $mape; ?>
                                        </td>
                                   </tr>
                                   <?php } ?>
                              </tbody>
                         </table><br />
                    </div><br /><br />
                    <table class="table table-striped table-hover table-vcenter display">
                         <thead>
                              <tr>
                                   <!-- <th width="10px" scope="col">No</th> -->
                                   <th scope="col">Rata-Rata MAD</th>
                                   <th scope="col">Rata-Rata MSE</th>
                                   <th scope="col">Rata-Rata MAPE</th>
                                   <th scope="col">Hasil MAPE</th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <td>
                                        <?php echo $rata_mad; ?> %
                                   </td>
                                   <td><?php echo $rata_mse; ?> %</td>
                                   <td><?php echo $rata_mape; ?> %</td>
                                   <td><?php echo $rata_mape*100; ?> %</td>
                              </tr>
                         </tbody>
                    </table>
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
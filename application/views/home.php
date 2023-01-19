<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <title>Home Forcasting CodeIgniter 3 </title>
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
     <main class="main">
          <div class="responsive-wrapper">

               <div class="content">
                    <div class="content-main">
                         <div class="card-grid">
                              <article class="card">
                                   <div class="card-header">
                                        <div>
                                             <span><img src="https://assets.codepen.io/285131/zeplin.svg" /></span>
                                             <h3>Tabel Forcast</h3>
                                        </div>
                                        <!-- <label class="toggle">
                                             <input type="checkbox" checked>
                                             <span></span>
                                        </label> -->
                                   </div>
                                   <div class="card-body">
                                        <p>Klik tabel forcast untuk melihat tabel.</p>
                                   </div>
                                   <div class="card-footer">
                                        <a href="<?php echo base_url('forecast/data'); ?>">Lihat Tabel</a>
                                   </div>
                              </article>

                         </div>
                    </div>
               </div>
     </main>
     <!-- partial -->
     <script src='https://unpkg.com/phosphor-icons'></script>
     <script src="assets/script.js"></script>

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>

<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=0.8"/>
        <title>iFJ Presence</title>
        <!--DASHBOARD-->
        <link rel="stylesheet" href="<?=base_url('asset/Dashboard/dashboard.css')?>">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--POPPER-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <!--BOOTSTRAP JAVA SCRIPT-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <!--DATATABLES-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <!--CHART JS-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
        
        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            }

            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
            }
        </style>
        <script>
            $(document).ready(function(){
                feather.replace()
            });
        </script>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shad☻ow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">iFJ Presence</a>
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=site_url('Admin/logout')?>">Sign out</a>
        </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?=$tab == 'dashboard' ? 'active' : ''?>" href="<?=site_url('Admin/dashboard')?>">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$tab == 'laporan' ? 'active' : ''?>" href="<?=site_url('Admin/laporan')?>">
                                <span data-feather="bar-chart-2"></span>
                                Laporan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
    
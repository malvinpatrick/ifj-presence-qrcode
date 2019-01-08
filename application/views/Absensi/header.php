<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=0.8"/>
        <title>iFJ Presence</title>
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
        <!--SWEET ALERT-->
        <script src="<?=base_url('asset/SweetAlert/sweetalert2.all.min.js')?>"></script>
        <link rel="stylesheet" href="<?=base_url('asset/SweetAlert/sweetalert2.min.css')?>">

        <style>
            body{
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            ul li a:hover{
                cursor:hand;
            }
            .header{
                text-align : center;
            }

        </style>
        <script>
            $(document).ready(function(){
                $('body').css('background-image', 'url(<?=base_url('asset/Image/background7.png')?>)');
            });
        </script>
    </head>
    <body>
        <!--MODAL CONFIRM-->
        <div class="modal fade" id="confirmAdminMasuk" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=site_url('Absensi/konfirmasiMasuk')?>">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <input name="submitKeluar" type="submit" class="btn btn-primary mt-2" value="Confirm">
                        </form>
                    </div>
                    <div class="modal-footer">
                        Konfirmasi admin untuk absen masuk
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmAdminKeluar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=site_url('Absensi/konfirmasiKeluar')?>">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <input name="submitKeluar" type="submit" class="btn btn-primary mt-2" value="Confirm">
                        </form>
                    </div>
                    <div class="modal-footer">
                        Konfirmasi admin untuk absen keluar
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 100px">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <a class="navbar-brand" href="#" style="width: 155px;padding: 0px">
                    <img src="<?=base_url('asset/Image/logo.png')?>" width="150px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarToggler" >
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="modal" data-target="#confirmAdminMasuk" hred="#">Absen Masuk</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="modal" data-target="#confirmAdminKeluar">Absen Keluar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=site_url('Absensi/registrasi')?>">Registrasi</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=site_url('Absensi/logout')?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

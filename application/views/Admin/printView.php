<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=0.8"/>
        <title>iFJ Presence Report</title>
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
        <!--SWEET ALERT-->
        <script src="<?=base_url('asset/SweetAlert/sweetalert2.all.min.js')?>"></script>
        <link rel="stylesheet" href="<?=base_url('asset/SweetAlert/sweetalert2.min.css')?>">
        
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
        <div class="container-fluid table-responsive mt-3">
            <h1 class="h2" style="text-align:center"><?=$headerLaporan?></h1>
            <h2 class="h4" style="text-align:center">Periode <?=$headerPeriode?></h1>
            <hr>
            <table class="table table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Jam Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($data); $i++) { ?>
                        <tr>
                            <td scope="col"><?= ($i + 1)?></td>
                            <td><?=$data[$i]->nama?></td>
                            <td><?=$data[$i]->nrp?></td>
                            <td><?=$data[$i]->tanggal?></td>
                            <td><?=$data[$i]->jam_masuk?></td>
                            <td><?=$data[$i]->jam_keluar?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
    <script>
        $(document).ready(function(){

        });
    </script>
</html>
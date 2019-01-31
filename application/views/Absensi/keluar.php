        <div class="container">
            <div class="row">
                <h2 class="display-4 mx-auto">Absensi Keluar</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="<?=site_url('Absensi/insertKeluar')?>" id="formKeluar">
                        <div class="form-group">
                            <label>NRP</label>
                            <input type="text" class="form-control" id="nrp" name='nrp' placeholder="9 digit NRP">
                            <small class="form-text text-muted">Masukkan 9 digit NRP</small>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                    <div class='mt-2 pt-2 border-top'>
                        <div class="form-group">
                            <h3 class="h5 text-center">Scan QR</h3>
                            <select id="deviceSelection" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <h3 class="h5 text-center">Mirror</h3>
                            <select id="mirrorSelection" class="form-control">
                                <option value="1">True</option>
                                <option value="0" selected>False</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <video width="50%" id="preview" class="mb-3"></video>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <table id="tabelAbsensiKeluar" class="table table-striped table-bordered bg-light" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Jam Keluar</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                document.getElementById("nrp").focus();

                //DATATABLE
                var table;
                function reloadTabel(){
                    $.ajax({
                        url : '<?=site_url('Absensi/fetchAbsensiKeluar')?>',
                        dataType : 'json',
                        method : 'post'
                    }).done(function(obj){
                        table = $('#tabelAbsensiKeluar').DataTable({
                            destroy : true,
                            data: obj,
                            columns: [
                                {
                                    "className":      'control',
                                    "orderable":      false,
                                    "data":           null,
                                    "defaultContent": ''
                                },
                                { data: 'nrp' },
                                { data: 'nama' },
                                { data: 'jam_masuk'},
                                { data: 'jam_keluar'}
                            ],
                            responsive: {
                                details: {
                                    type: 'column'
                                }
                            },
                            columnDefs: [ {
                                className: 'control',
                                orderable: false,
                                defaultContent: '',
                                targets:   0
                            } ],
                            paging:   false,
                            ordering: false,
                            info:     false,
                            fixedHeader: true,
                            scrollY:'50vh',
                        });                 
                    });
                }
                reloadTabel();

                //INSERT ABSENSI
                $('#formKeluar').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url : '<?=site_url('Absensi/insertKeluar')?>',
                        method : 'post',
                        dataType : 'json',
                        data : $("#formKeluar").serialize()
                    }).done(function(obj){
                        if(obj.status == true){
                            //SHOW ALERT SUCCESS
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: obj.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            reloadTabel();

                            //CLEAR
                            $('#formKeluar').find("input[type=text]").val("");
                        }else{
                            //SHOW ALERT ERROR
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: obj.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });
                });
            });
        </script>

        <!--QRCODE-->
        <script>
            $(document).ready(function(){
                let scanner = new Instascan.Scanner({ 
                    continuous: true,
                    video: document.getElementById('preview'),
                    mirror: false,
                    captureImage: false,
                    backgroundScan: false,
                    refractoryPeriod: 1000,
                    scanPeriod: 1
                });

                //GET RESULT SCANNER
                scanner.addListener('scan', function (content) {
                    $("#nrp").val(content);
                    $("#formKeluar").submit();
                });

                //SELECT CAMERA FOR THER FIRST
                Instascan.Camera.getCameras().then(function (cameras) {
                    var tempCamera; 
                    for(var i = 0 ; i < cameras.length ; i++){
                        $('#deviceSelection').append($("<option></option>").attr("value", i).text(cameras[i].name.toUpperCase())); 
                    }
                    
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });

                //CAMERA SELECT
                $('#deviceSelection').on('change', function() {
                    let index = this.value;
                    scanner.stop();
                    Instascan.Camera.getCameras().then(function (cameras) {
                        scanner.start(cameras[index]);
                    });
                });

                //MIRROR SELECT 
                $("#mirrorSelection").on('change', function() {
                    let index = this.value;
                    let mirror = null;
                    if(index == 1)
                        mirror = true;
                    else    
                        mirror = false;

                    scanner = new Instascan.Scanner({ 
                        continuous: true,
                        video: document.getElementById('preview'),
                        mirror: mirror,
                        captureImage: false,
                        backgroundScan: false,
                        refractoryPeriod: 1000,
                        scanPeriod: 1
                    });
                    Instascan.Camera.getCameras().then(function (cameras) {
                        scanner.start(cameras[0]);
                    });
                });
            });
        </script>
    </body>
</html>

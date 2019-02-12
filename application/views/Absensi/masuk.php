        <div class="container">
            <div class="row">
                <h2 class="display-4 mx-auto">Absensi Masuk</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="<?=site_url('Absensi/insertMasuk')?>" id="formMasuk">
                        <div class="form-group">
                            <label>NRP</label>
                            <input type="text" class="form-control" maxlength="9" id="nrp" name='nrp' placeholder="9 digit NRP">
                            <small class="form-text text-muted">Masukkan 9 digit NRP</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </form>
                    <div class='mt-2 pt-2 border-top'>						
						<div class="form-group">
                            <h3 class="h5 text-center">Scan QR</h3>
                            <select id="deviceSelection" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <h3 class="h5 text-center">Mirror Image</h3>
                            <select id="mirrorSelection" class="form-control">
                                <option value="1">True</option>
                                <option value="0" selected>False</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <video width="100%" id="preview" class="mb-3"></video>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <table id="tabelAbsensiMasuk" class="table table-striped table-bordered bg-light" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Jam Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--SCRIPT ABSEN-->
        <script>
            $(document).ready(function(){
                document.getElementById("nrp").focus();

                //DATATABLE
                var table;
                function reloadTabel(){
                    $.ajax({
                        url : '<?=site_url('Absensi/fetchAbsensiMasuk')?>',
                        dataType : 'json',
                        method : 'post'
                    }).done(function(obj){
                        table = $('#tabelAbsensiMasuk').DataTable({
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
                                { data: 'jam_masuk' }
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

				//NOTIFIKASI SUARA
				function soundNotification(frequency, type) {
					// Source: http://marcgg.com/blog/2016/11/01/javascript-audio/
					var context = new AudioContext();
					var o = context.createOscillator();
					var g = context.createGain();
					o.type = type;
					o.connect(g);
					o.frequency.value = frequency;
					g.connect(context.destination);
					o.start(0);
					g.gain.exponentialRampToValueAtTime(0.00001, context.currentTime+1);
				}			
				
                //INSERT ABSENSI
                $('#formMasuk').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url : '<?=site_url('Absensi/insertMasuk')?>',
                        method : 'post',
                        dataType : 'json',
                        data : $("#formMasuk").serialize()
                    }).done(function(obj){						
                        if (obj.status == true) {
                            //SHOW ALERT SUCCESS
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: obj.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
							soundNotification(440.0, 'sine');
                            reloadTabel();				
							
                            //CLEAR
                            $('#formMasuk').find("input[type=text]").val("");
                        } else {
                            //SHOW ALERT ERROR
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: obj.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
							soundNotification(261.6, 'square');
							setTimeout(function(){
								soundNotification(261.6, 'square');								
							}, 100);
                        }
                    });
                });
            });
        </script>

        <!--QRCODE-->
        <script>
            $(document).ready(function(){
                var scanner = new Instascan.Scanner({ 
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
                    $("#formMasuk").submit();
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

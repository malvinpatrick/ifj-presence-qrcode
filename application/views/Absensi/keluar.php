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
                            const toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                            });
                            toast({
                                type: 'success',
                                title: obj.message
                            })
                            reloadTabel();

                            //CLEAR
                            $('#formKeluar').find("input[type=text]").val("");
                        }else{
                            //SHOW ALERT ERROR
                            const toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                            });
                            toast({
                                type: 'error',
                                title: obj.message
                            })
                        }
                    });
                });
            });
        </script>
    </body>
</html>

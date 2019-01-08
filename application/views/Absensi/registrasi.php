        <div class="container">
            <div class="row">
                <h2 class="display-4 mx-auto">Registrasi Account iFJ</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 mx-auto bg-light" style="padding-top:10px">
                    <form method="post" action="<?=site_url('Absensi/insertRegis')?>" id="formRegis">
                        <div class="form-group">
                            <label>NRP</label>
                            <input type="text" class="form-control" id="nrp" name='nrp' placeholder="9 digit NRP" pattern="\d{9}" required >
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name='nama' placeholder="Nama Lengkap" style="text-transform:capitalize" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class='form-inline'>
                                <input type="number" min='1' max='31' class="form-control col-4" name='tanggal' placeholder="Tanggal" required>
                                <select name="bulan" class="form-control col-4" required>
                                    <option value=1>Januari</option>
                                    <option value=2>Febuari</option>
                                    <option value=3>Maret</option>
                                    <option value=4>April</option>
                                    <option value=5>Mei</option>
                                    <option value=6></option>Juni</option>
                                    <option value=7>Juli</option>
                                    <option value=8>Agustus</option>
                                    <option value=9>September</option>
                                    <option value=10>Oktober</option>
                                    <option value=11>November</option>
                                    <option value=12>Desember</option>
                                </select>
                                <input type="number" min='1980' max='2019' class="form-control col-4" name='tahun' placeholder="Tahun" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="pria" name="jk" class="custom-control-input" value="Pria" checked>
                                <label class="custom-control-label" for="pria">Pria</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="jk" id="wanita" class="custom-control-input" value="Wanita">
                                <label class="custom-control-label" for="wanita">Wanita</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select name="jurusan" class="form-control" required>
                                <option value=1>S1-Informatika</option>
                                <option value=2>S1-DKV</option>
                                <option value=3>S1-ELEKTRO</option>
                                <option value=4>S1-INDUSTRI</option>
                                <option value=5>S1-DESPRO</option>
                                <option value=6></option>D3-INFORMATIKA</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                //INSERT ABSENSI
                $('#formRegis').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url : '<?=site_url('Absensi/insertRegis')?>',
                        method : 'post',
                        dataType : 'json',
                        data : $("#formRegis").serialize(),
                        error: function (xhr, ajaxOptions, thrownError) {
                            //SHOW ALERT ERROR
                            const toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                            });
                            toast({
                                type: 'error',
                                title: xhr.responseText
                            })
                        }
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

                            //CLEAR
                            $('#formRegis').find("input[type=text]").val("");
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

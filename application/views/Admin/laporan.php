                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Laporan</h1>   
                    </div>
                    <div class='row px-4'>
                        <form class="col-12" id="formFilter">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Batas Atas</label>
                                    <input type="date" name="filterAtas" id="filterAtas" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Batas Bawah</label>
                                    <input type="date" name="filterBawah" id="filterBawah" class="form-control">
                                </div>
                                <input class='form-control btn btn-primary' type='submit' name='submit' value='Generate'>
                            </div>
                        </form>
                    </div>

                   
                    <div class='row px-5 pt-3 mt-4 border-top divResult' style="display:none">
                        <div class="col-10 text-center">
                            <h2 class="h3">Laporan Kehadiran Mahasiswa</h2>
                            <h3 class="h4 font-weight-light" id="headerPeriode"></h3>
                        </div>
                        <div class="btn-toolbar col-2 mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="exportLaporan">Export CSV</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="printLaporan">Print</button>
                            </div>
                        </div>
                    </div>
                    <!--CHART RESULT-->
                    <div class="my-3 pt-3 divResult" style="display:none">
                        <canvas id="myChart" width="100vh" height="20vh"></canvas>
                    </div>

                     <!--TABEL RESULT-->
                    <div class="my-3 pt-3 divResult" style="display:none">
                        <table id="tabelResult" class="table table-striped table-bordered bg-light" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){  
            /**
             * UNTUK FORMAT TODAY AWAL LOAD INPUT TYPE DATE */        
            $('main').find('input[type=date]').each(function(){
                var now = new Date();
                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                var today = now.getFullYear()+"-"+(month)+"-"+(day);
                $(this).val(today);                
            });

            var table;
            function showResult(){
                $.ajax({
                    url : '<?=site_url('Admin/fetchLaporan')?>',
                    data : $("#formFilter").serialize(),
                    dataType : 'json',
                    method : 'post'
                }).done(function(obj){
                    $("#headerPeriode").html(obj.periode);

                    //DRAW  using chart.js

                    //Seperate data and label from obj
                    let dataChart = obj.chart;
                    console.log(obj.chart);
                    var labels = dataChart.map(function(e) {
                        return e.tanggal;
                    });
                    var data = dataChart.map(function(e) {
                        return e.jumlah;
                    });

                    //Configuration to canvas
                    var ctx = document.getElementById("myChart").getContext("2d");
                    var config = {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Kehadiran',
                                data: data,
                                borderColor : '#00CCDE',
                                borderWidth : 3,
                                fill : false
                            }]
                        }
                    };
                    var chart = new Chart(ctx, config);

                    //FILL TABLE
                    //Init Datatable
                    table = $('#tabelResult').DataTable({
                        destroy : true,
                        data: obj.data,
                        columns: [
                            {
                                "className":      'control',
                                "orderable":      false,
                                "data":           null,
                                "defaultContent": ''
                            },
                            { data: 'nrp' },
                            { data: 'nama' },
                            { data: 'tanggal' },
                            { data: 'jam_masuk' },
                            { data: 'jam_keluar' }
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
                        }],
                        searching: false,
                    });                 
                });
            }

            $("#formFilter").submit(function(e){
                e.preventDefault();
                showResult();
                $(".divResult").slideDown(300);
            });

            //EXPORT CSV
            $("#exportLaporan").click(function(){
                let date1 = $('#filterAtas').val();
                let date2 = $('#filterBawah').val();

                window.location.href = "<?=site_url('Admin/exportCSV?date1=')?>" + date1 + '&date2=' + date2;
            });

            //PRINT
            $("#printLaporan").click(function(){
                let date1 = $('#filterAtas').val();
                let date2 = $('#filterBawah').val();
                let win = window.open("<?=site_url('Admin/print_laporan?date1=')?>" + date1 + '&date2=' + date2);
                if (win) {
                    //Browser has allowed it to be opened
                    win.focus();
                } else {
                    //Browser has blocked it
                    alert('Please allow popups for this website');
                }
            });
        });
    </script>
</html>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Data Hasil</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1><span class="table-project-n">Data</span> Hasil</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">
                                                    <center>No</center>
                                                </th>
                                                <th data-field="nis">
                                                    <center>NIS</center>
                                                </th>
                                                <th data-field="full_name">
                                                    <center>Nama Siswa</center>
                                                </th>
                                                <th data-field="jenis_kelamin">
                                                    <center>Jenis Kelamin</center>
                                                </th>
                                                <th data-field="jadwal">
                                                    <center>Jadwal</center>
                                                </th>
                                                <th data-field="alamat">
                                                    <center>Kelas Tujuan</center>
                                                </th>
                                                <th data-field="status">
                                                    <center>Status</center>
                                                </th>
                                                <th data-field="action">
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($data_hasil as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <center><?= $i++; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= $row['nis'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= $row['full_name'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center> <?= $row['jenis_kelamin'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                       <span class="badge badge-primary"> <?= date('d F Y', strtotime($row['jadwal']))  ?></span>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center><?= $row['nama_kelas'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                                $date = getDatesFromRange(date('Y-m-d'),$row['jadwal']);
                                                            ?>
                                                            <?php if ($row['status_pemberitahuan'] == 2 ) { ?>
                                                                <?php if(count($date) >= 1){ ?>
                                                                    <span class="badge badge-warning">Belum Dinilai</span>
                                                                <?php }else{ ?>
                                                                        <span class="badge badge-danger">Diskualifikasi/Gagal</span>
                                                                <?php } ?>
                                                            <?php } else if($row['status_pemberitahuan'] == 3 || $row['status_pemberitahuan'] == 4) { ?>
                                                                <span class="badge badge-success">Sudah Dinilai</span>
                                                            <?php } ?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                           
                                                            <?php if ($row['status_pemberitahuan'] == 3 || $row['status_pemberitahuan'] == 4) { ?>
                                                                <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Lihat Hasil">
                                                                    <button onClick="get_hasil('<?= base_url() ?>','<?= $row['id_pendaftaran'] ?>')" data-toggle="modal" data-target="#modalgethasil" type="button" class="btn btn-outline-success btn-circle btn-icon">
                                                                        <i class="fa fa-clipboard"></i></button>
                                                                </span>
                                                            <?php }else if(count($date) >= 1){ ?>
                                                                <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Input Nilai">
                                                                    <button onClick="add_jadwal1('<?= base_url() ?>jadwal/add_jadwal','<?= $row['id_user'] ?>')" data-toggle="modal" data-target="#modalinput" type="button" class="btn btn-outline-primary btn-circle btn-icon">
                                                                        <i class="fa fa-edit"></i></button>
                                                                </span>
                                                            <?php } ?> 
                                                        </center>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalinput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span> -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="myTabContent" style="margin-top: 30px;" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <form action="<?= base_url() ?>hasil/normalisasi" method="post">
                                        <div class="row" style="margin-bottom:25px;">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Input Nilai Test Tertulis</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value=""  required name="tertulis" id="tertulis" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Input Nilai Test Wawancara</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value="" required name="wawancara" id="wawancara" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                    Keterangan : <br>
                                                        nilai sangat bagus : 90 - 100 <br>
                                                        nilai bagus : 70 - 90 <br> 
                                                        nilai cukup : 50 - 70 <br>
                                                        nilai kurang : 30 - 50 <br>
                                                        nilai sangat kurang : 10 - 30 <br> 

                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_user" id="id_user">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="button" class="btn btn-primary">Submit</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Keluar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalgethasil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title1">Detail Nilai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span> -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="myTabContent" style="margin-top: 30px;" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <form action="" method="post">
                                        <div class="row" style="margin-bottom:25px;">
                                            <div class="col-md-12">
                                            <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nilai Matematika</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value="" readonly  required name="mtk1" id="mtk1" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nilai Bahasa Indonesia</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value="" readonly  required name="bindo1" id="bindo1" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nilai Bahasa Inggris</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value="" readonly  required name="binggris1" id="binggris1" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nilai Test Tertulis</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value="" readonly  required name="tertulis1" id="tertulis1" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nilai Test Wawancara</label>

                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <input type="text" value="" readonly required name="wawancara1" id="wawancara1" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                    Keterangan : <br>
                                                        nilai sangat bagus : 90 - 100 <br>
                                                        nilai bagus : 70 - 90 <br> 
                                                        nilai cukup : 50 - 70 <br>
                                                        nilai kurang : 30 - 50 <br>
                                                        nilai sangat kurang : 10 - 30 <br> 

                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_user1" id="id_user1">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-primary">Keluar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            function get_hasil(base_url,id_pendaftaran){
                $.ajax({
                    type : "GET",
                    dataType:'HTML',
                    url : base_url + 'dashboard/getHasil/'+id_pendaftaran,
                    success : function(response){
                        let data = JSON.parse(response);
                        document.getElementById('mtk1').value = data.mtk;
                        document.getElementById('bindo1').value = data.bindo;
                        document.getElementById('binggris1').value = data.bingg;
                        document.getElementById('tertulis1').value = data.tes;
                        document.getElementById('wawancara1').value = data.wawancara;
                    }   
                })

                

            }
                function add_jadwal1(base_url,id_user) {
                    document.getElementById("modal_title").innerHTML = "Form Penilaian";
                    document.getElementById("id_user").value = id_user;
                    document.getElementById("jadwal").value = "";
                    document.getElementById("button").innerHTML = "Tambah Data";
                    document.getElementById("form").action = base_url;
                }
            </script>
            <?php
            function getDatesFromRange($start, $end, $format = 'Y-m-d')
            {
                $array = array();
                $interval = new DateInterval('P1D');

                $realEnd = new DateTime($end);
                $realEnd->add($interval);

                $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

                foreach ($period as $date) {
                    $array[] = $date->format($format);
                }

                return $array;
            }
            ?>
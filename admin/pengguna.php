 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Pengguna</h4>
        </div>
    </div>
</div> 
<?php 
  $data_pengguna = $db->get_results("SELECT * FROM tbl_pengguna");           
?>               
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Pengguna</h3>
                </div>
                

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0">Status</th>

                                <?php if ($_SESSION['status'] == 'admin'): ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php endif ?>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_pengguna) < 1) : ?>
                                <tr><td colspan="3" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_pengguna as $pengguna): ?>
                                    <tr>
                                        <td><?= $pengguna->id ?></td>
                                        <td><?= $pengguna->username ?></td>
                                        <td><?= ucwords($pengguna->status) ?></td>
                                        
                                        <?php if ($_SESSION['status'] == 'admin'): ?>
                                            <td>
                                                <a href="aksi?act=reset_password&id=<?= $pengguna->id; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin reset password user <?= $pengguna->id ?>?')">Reset Password</a>
                                            </td>
                                        <?php endif ?>
                                        
                                    </tr>
                                <?php endforeach ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
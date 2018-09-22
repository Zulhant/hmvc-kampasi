<div class="row">
    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
                $cek_code =  isset($code);

                if ($cek_code && $cek_code == 200 || $cek_code == 400){
                    if (isset($label) && isset($msg)){
                        ?>
                        <div class="alert alert-<?php echo $label; ?> alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Informasi</strong> <?php echo $msg; ?>
                        </div>
                        <meta http-equiv="refresh" content="2; URL=<?php echo base_url('beck-end/users');  ?>">
                        <?php
                    }
                }
            ?>
            <?php echo validation_errors(); ?>

            <button class="btn btn-primary" style="margin-bottom:10px;" data-toggle="modal" data-target="#insert-user">Tambah Users</button>
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>status</th>
                  <th>dibuat pada</th>
                  <th>diubah pada</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($listUsers as $data) {
                ?>
                    <tr>
                    <td><?php echo $no++;  ?></td>
                    <td><?php echo $data->username; ?></td>
                    <td><?php echo $data->email; ?></td>
                    <td>
                        <?php 
                            if ($data->isActive == 1)
                                echo '<span class="badge bg-green">Aktif</span>';
                            else
                                echo '<span class="badge bg-red">Tidak aktif</span>';
                        ?>
                    </td>
                    <td><?php echo $data->createAt; ?></td>
                    <td><?php echo $data->updateAt; ?></td>
                    <td width="140">
                        <a href="users/<?php echo $data->id; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        <a href="users/<?php echo $data->id; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                    </td>
                    </tr>
                <?php
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
          <!-- /.box -->
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="insert-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Tambah Pengguna</h4>
        </div>
        <form role="form" method="POST" action="<?php echo base_url() ?>beck-end/users/insert">
        <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password minimal 6 karakter">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
  </div>
</div>
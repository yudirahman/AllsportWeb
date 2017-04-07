<?php cutter_start('content') ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $halaman ?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User yang terdaftar</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-sm btn-primary" onclick="ShowModalAddUser()"><i class="fa fa-plus"></i> Tambah</button>
                <!-- <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                <!-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <div class="box-body">
              <?php echo (isset($_SESSION['errmsg'])) ? $_SESSION['errmsg'] : '';
              ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="tbdatauser">
                  <thead>
                    <tr>
                      <th style="width:10%">#</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Status</th>
                      <th style="width:10%">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($datauser as $row) { ?>
                      <tr>
                        <td><?php if (!empty($row['foto'])) { ?>
                          <img src="<?php echo FILES.'image/users/thumb/'.$row['foto'] ?>" alt="<?php echo $row['nama'] ?>" class="img-responsive"/>
                        <?php } ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['level'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td>
                          <button class="btn btn-sm btn-warning" onclick="UserEdit(<?php echo $row['id_user'] ?>)"><i class="fa fa-pencil"></i></button>
                          <?php  if ($row['level'] !='SUPERADMIN'){ ?>
                          <button class="btn btn-sm btn-danger" onclick="UserDelete(<?php echo $row['id_user'] ?>)"><i class="fa fa-trash"></i></button>
                          <?php }else{ ?> 
                          <button class="btn btn-sm btn-danger" disabled><i class="fa fa-trash"></i></button>
                          <?php } ?>
                        </td>
                      </tr>                      
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Modal Add -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_user">
        <div class="modal-dialog" role="document">
          <form action="<?php echo SITEURL.URL_ADMIN.'/user/alluser' ?>" method="POST" role="form" id="form_tambah_user" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah User</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="add">
                      <label for="nama_produk">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_produk">Username</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_produk">Password</label>
                      <input type="text" class="form-control" id="password" name="password" required>

                    </div>
                    <div class="form-group">
                      <label for="kategori">Level</label>
                      <select name="level" id="kategori" class="form-control">
                        <option value="">--Pilih Level User--</option>
                          <option value="ADMIN">ADMIN</option>
                          <option value="SUPERADMIN">SUPER ADMIN</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>
                        <input type="radio" name="isactive" class="minimal" value="AKTIF" checked>&nbsp Aktif &nbsp
                      </label>
                      <label>
                        <input type="radio" name="isactive" class="minimal" value="NON AKTIF" >&nbsp Non Aktif
                      </label>
                   </div>
                    <div class="form-group">
                      <label for="">Foto User</label>
                      <input type="file" accept="image/*" class="form-control filestyle" name="image" required>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
      </div>

      <!-- Modal Edit User -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_user">
        <div class="modal-dialog" role="document">
          <form action="<?php echo SITEURL.URL_ADMIN.'/user/alluser' ?>" method="POST" role="form" id="form_edit_user" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="edit">
                      <input type="hidden" name="id">
                      <label for="nama_produk">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_produk">Username</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_produk">Password</label>
                      <input type="text" class="form-control" id="password" name="password" required>
                      <span><small>*biarkan kosong, jika password tidak diganti</small></span>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Level</label>
                      <select name="level" id="kategori" class="form-control">
                        <option value="">--Pilih Level User--</option>
                          <option value="ADMIN">ADMIN</option>
                          <option value="SUPERADMIN">SUPER ADMIN</option>
                      </select>
                    </div>
                    <div class="form-group" id="statusEdit">
                      
                   </div>
                    <div class="form-group">
                      <label for="">Foto User</label>
                      <div id="fotoUserEdit"></div>
                      <input type="file" accept="image/*" class="form-control filestyle" name="image" required>
                      <span><small>*biarkan kosong, jika foto tidak diganti</small></span>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
      </div>

  <?php cutter_end() ?>

  <?php cutter_start('css') ?>
  <link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>backend/plugins/iCheck/all.css">
  <?php cutter_end() ?>

  <?php cutter_start('js') ?>
  <script src="<?php echo ASSETS ?>backend/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript">
      $('#tbdatauser').DataTable();

      //Modal Activate add user
      function ShowModalAddUser(){
        $('#modal_tambah_user').modal('show');
      }

      //Modal activate edit user
      function UserEdit(id) {
        var url = "<?php echo SITEURL.URL_ADMIN.'/user/dataUserWhere/"+id+"' ?>";
          $.getJSON(url,function(res){
              // console.log(res);
              $('#modal_edit_user').modal('show');
              
              $("#form_edit_user [name=id]").val(res.id);
              $("#form_edit_user [name=nama_lengkap]").val(res.nama);
              $('#form_edit_user [name=username]').val(res.username);
              $('#fotoUserEdit').html("<img src=\"<?php echo FILES.'image/users/thumb/' ?>"+res.image+"\" /><p></p>");
              var isAktif = (res.status == "AKTIF") ? "checked" : "";
              var isNonAktif = (res.status == "NON AKTIF") ? "checked" : "";
              $('#statusEdit').html("<label>"+
                        "<input type=\"radio\" name=\"isactive\" class=\"minimal\" value=\"AKTIF\" "+isAktif+" >&nbsp Aktif &nbsp"+
                      "</label>"+
                      "<label>"+
                        "<input type=\"radio\" name=\"isactive\" class=\"minimal\" value=\"NON AKTIF\" "+isNonAktif+" >&nbsp Non Aktif"+
                "</label>");
              $('#editharga').val(res.harga).trigger("blur");
              $("#form_edit_user [name=keterangan]").text(res.keterangan);
          });
      }
      //iCheck
      //iCheck for checkbox and radio inputs
    $('input[type="radio"].minimal').iCheck({
      radioClass: 'iradio_minimal-blue'
    });
    </script>
  <?php cutter_end() ?>
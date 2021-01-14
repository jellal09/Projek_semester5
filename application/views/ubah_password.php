<div class="card card-primary card-outline">
    <div class="card-body box-profile">
    <?= $this->session->flashdata('sukses'); ?>
      
       <br>
       <form action="<?= base_url('pelanggan/ubah_password') ?>" method="post">
        <table class="table">
                   
                <tbody>
                   <tr>
                    <td width="25%">Password</td>
                    <th><input type="password" name="current_password" class="form-control" id="current_password" placeholder="Masukan password lama"><?= form_error('current_password', '<small class="text-danger">', '</small>'); ?></th>
                    </tr>
                    <tr>
                    <td>Password Baru </td>
                    <th><input type="password" name="password1" class="form-control" id="password1" placeholder="Password Baru"><?= form_error('password1', '<small class="text-danger">', '</small>'); ?> <small>  Isi password minimal 6 karakter</small>    </th>             
                    </tr>
                    <tr>
                    <td>Ulangi Password </td>
                    <th><input type="password" name="password2" class="form-control" id="password2" placeholder="Ulangi Baru"></th>                    
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    <button class="btn btn-dark center-block" type="submit">Update Password</button>
                    <a href="<?= base_url('pelanggan/akun')?>" class="btn btn-dark btn-flat"> Kembali</a>
                    </td>
                    </tr>

                </tbody>
                </table>
                </form>

    </div>
    <!-- /.card-body -->
</div>
</div>

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
    <?= $this->session->flashdata('sukses');
        //form open
        echo form_open_multipart('pelanggan/akun'); ?>
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                src="<?= base_url('assets/foto/'. $this->session->userdata('foto')) ?>"
                alt="User profile picture">
        <b><h6 class="text-center text-bold">Ubah Foto Profil</h6></b>
        <div class="text-center border-1">
            <input type="file" name="foto" id="foto" value="<?= set_value('foto') ?>" ></div>
        </div>
       <br>

        <table class="table">
                <thead>
                    <tr>
                    <th width="25%">Nama </th>
                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>"><?= form_error('nama_pelanggan', '<small class="text-danger">', '</small>'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Email </td>
                    <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly></td>
                    </tr>
                    <tr>
                    <td>Password </td>
                    <td>
                    <a href="<?= base_url('pelanggan/ubah_password') ?>">Ubah Password</a></td>
                    </tr>
                    <tr>
                    <td>Telepon/Hp </td>
                    <td><input type="text" name="no_telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->no_telepon ?>"><?= form_error('no_telepon', '<small class="text-danger">', '</small>'); ?></td>
                    </tr>
                    <tr>
                    <td>Alamat </td>
                    <td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea><?= form_error('alamat', '<small class="text-danger">', '</small>'); ?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    <button class="btn btn-dark center-block" type="submit">Update Profile</button>
                    <a href="<?= base_url('pelanggan/akun')?>" class="btn btn-dark btn-flat"> Kembali</a>
                    </td>
                    </tr>
                </tbody>
                </table>

            <?php echo form_close(); ?>
    </div>
    <!-- /.card-body -->
</div>

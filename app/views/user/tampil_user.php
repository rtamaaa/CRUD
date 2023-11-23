<?php
$userLevel = isset($_SESSION['level']) ? $_SESSION['level'] : null;
?>
    <div class="container mt-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUser">Tambah User</button>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <!-- <th>NO</th> -->
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data ['usr'] as $usr ) : $no = 1;?>
                    <tr>
                            <!-- <td><?php echo $no++; ?></td> -->
                            <td><?php echo $usr['nama']; ?></td>
                            <td><?php echo $usr['password']; ?></td>
                            <td><?php echo $usr['level']; ?></td>
                            <td><?php echo $usr['status']; ?></td>
                            <td>
                        
                        <a href="<?= BASEURL ?>User/ubah/<?= $usr['id_user']; ?>" class="btn btn-warning" data-toggle="modal" data-target="#editUser">Edit</a>
                        <a href="<?= BASEURL ?>User/hapus/<?= $usr['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');">hapus</a>
                    </td>
                    </tr>
                    
                <?php endforeach;?>
            </tbody>
        </table>
    </div>


    <!-- Modal -->
  <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Isi form Anda di sini -->
          <form method="post" action="<?= BASEURL; ?>User/tambah">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="level" class="form-label">Level</label>
              <?php if ($userLevel === 'admin'): ?>
              <select class="form-select" id="level" name="level" required>
                <option value="">---PILIH---</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="supervisor">Supervisor</option>
                <option value="staff">Staff</option>             
              </select>
              <?php elseif ($userLevel === 'manager'): ?>
              <select class="form-select" id="level" name="level" required>
              <option value="">---PILIH---</option>
                <option value="supervisor">Supervisor</option>
                <option value="staff">Staff</option>
              </select>
              <?php elseif ($userLevel === 'supervisor'): ?>
              <select class="form-select" id="level" name="level" required>
              <option value="">---PILIH---</option>
                <option value="staff">Staff</option>
              </select>
              <?php endif;?>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="">---PILIH---</option>
                <option value="1">Aktif</option>
                <option value="2">Tidak Aktif</option>
              </select>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Delete User Modal -->
<div class="modal fade" id="hapusUser<?= $usr['id_user']; ?>" tabindex="-1" aria-labelledby="hapusUserModalLabel<?= $usr['id_user']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusUserModalLabel<?= $usr['id_user']; ?>">Hapus Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data user ini?</p>
                <!-- Delete User Form (Replace with your actual form or logic) -->
                <form method="post" action="<?= BASEURL; ?>User/hapus/<?= $usr['id_user']; ?>">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>


  
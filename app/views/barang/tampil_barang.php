    <div class="container mt-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangModal">Tambah Barang</button>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data ['brg'] as $brg ) : $no = 1;?>
                    <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $brg['kode_barang']; ?></td>
                            <td><?php echo $brg['nama_barang']; ?></td>
                            <td><?php echo $brg['harga']; ?></td>
                            <td><?php echo $brg['id_kategori']; ?></td>
                            
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBarangModalLabel">Tambah Data Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Isi form Barang -->
        <form method="POST" action="tampil_barang.php">
          <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>
          <div class="mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input type="number" class="form-control" id="qty" name="qty" required>
          </div>
          <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select class="form-select" id="id_kategori" name="id_kategori" required>
              <option value="">---PILIH---</option>
              <?php
              foreach ($data['kategori'] as $category) {
                  echo "<option value='" . $category['id_kategori'] . "'>" . $category['nama_kategori'] . "</option>";
              }
              ?>
            </select>
          </div>
          <button type="submit" name="save" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
  

                    



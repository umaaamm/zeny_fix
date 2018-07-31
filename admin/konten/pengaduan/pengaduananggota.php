<?php
if (isset($_POST['submit'])) {
    $kode_pengaduan=rand(3,100000);
    $nik = $_POST['nik'];
    $isi = $_POST['isi_pengaduan'];
    $query_tambah = $koneksi->query("INSERT INTO tbl_pengaduan (kode_pengaduan,nik,isi)values ('".$kode_pengaduan."','" . $nik . "','" . $isi . "')");
    echo '<div class="alert alert-success">Data Pengaduan Berhasil di Laporkan</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=pengaduan&m2=pengaduananggota'>";
}
?>
<?php
    $query_edit = $koneksi->query("SELECT * FROM tbl_anggota where nik='123' ");
    $tampil_edit = $query_edit->fetch_assoc();
?>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pengaduan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form role="form" action="" method="post">
            <div class="col-md-4">
              <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK anda" value="<?= $tampil_edit['nik'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" value="<?= $tampil_edit['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="5" name="alamat" placeholder="Masukan Alamat Anda" readonly><?= $tampil_edit['alamat'] ?></textarea>
                    </div>
                    
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <div class="form-group">
                    <label>Pengaduan Anda</label>
                    <textarea id="editor1" name="isi_pengaduan" rows="10" cols="80">            
                    </textarea>
                    </div>
                    
              <!-- /.form-group -->
            </div>
          
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    </div>
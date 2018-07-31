<?php
    @$kodetanggapan=$_GET['id_edit'];
    $query_edit = $koneksi->query("SELECT tbl_anggota.nik,tbl_anggota.nama,tbl_anggota.alamat,tbl_pengaduan.tanggal as tanggal_pengaduan,tbl_pengaduan.isi as isi_pengaduan,tbl_pengaduan.kode_pengaduan,tbl_tanggapan.tanggal as tanggal_tanggapan, tbl_tanggapan.isi as isi_tanggapan FROM tbl_anggota,tbl_pengaduan,tbl_tanggapan where tbl_anggota.nik =tbl_pengaduan.nik and tbl_tanggapan.kode_tanggapan='".$kodetanggapan."' ");
    $tampil_edit = $query_edit->fetch_assoc();
?>

<?php
if (isset($_POST['submit'])) {
    $kode_pengaduan= $_POST['kode_pengaduan'];
    //nip ngambil dari session admin
    $nip = $_SESSION['nip'];
    $isi = $_POST['isi_tanggapan'];
    // $query_tambah = $koneksi->query("INSERT INTO tbl_tanggapan (kode_pengaduan,nip,isi)values ('".$kode_pengaduan."','".$nip."','" .$isi."')");
    $query_edit_data=$koneksi->query("UPDATE tbl_tanggapan set kode_pengaduan='".$kode_pengaduan."',nip='".$nip."',isi='".$isi."' where kode_tanggapan='".$kodetanggapan."' ");
    echo '<div class="alert alert-success">Data Tanggapan Berhasil diedit</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=tanggapan&m2=listtanggapan'>";
}
?>

<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Tanggapan</h3>
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
                        <label>Kode Pengaduan</label>
                        <input type="text" class="form-control" name="kode_pengaduan" placeholder="Masukkan NIP anda" value="<?= $tampil_edit['kode_pengaduan'] ?>" readonly>
                    </div>
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
                    <div class="form-group">
                        <label>Tanggal Pengaduan</label>
                        <input type="text" class="form-control" name="tanggal" value="<?= $tampil_edit['tanggal_pengaduan'] ?>" readonly>
                    </div>
                    
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <div class="form-group">
                    <label>Pengaduan Masyarakat</label>
                    <textarea id="editor1" name="isi_pengaduan" rows="10" cols="80" readonly><?=$tampil_edit['isi_pengaduan']?>         
                    </textarea>
                    </div>
                    
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                    <label>Tanggapan</label>
                    <textarea id="editor2" name="isi_tanggapan" rows="10" cols="80">   <?=$tampil_edit['isi_tanggapan']?>     
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
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    </div>

<?php
@$id_delete = $_GET['id_delete'];
if(!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM tbl_tanggapan where kode_tanggapan='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Tanggapan Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=tanggapan&m2=listtanggapan'>";
}
?>

<div class="row">
<div class="col-md-12">
    <?php
    // $query= $koneksi->query("SELECT distinct tbl_anggota.nik,tbl_anggota.nama,tbl_anggota.alamat,tbl_anggota.email,
    //     tbl_pengaduan.kode_pengaduan,tbl_pengaduan.tanggal as tanggal_pengaduan,tbl_pengaduan.isi as isi_pengaduan,
    //     tbl_tanggapan.isi as isi_tanggapan,tbl_tanggapan.tanggal as tanggal_tanggapan FROM tbl_anggota left join tbl_pengaduan on tbl_anggota.nik =tbl_pengaduan.nik left join tbl_tanggapan where tbl_pengaduan.kode_pengaduan =tbl_tanggapan.kode_pengaduan ");
    $query=$koneksi->query("SELECT tbl_anggota.nik,tbl_anggota.nama,tbl_anggota.alamat,tbl_anggota.email,tbl_pengaduan.kode_pengaduan,tbl_pengaduan.tanggal as tanggal_pengaduan,tbl_pengaduan.isi as isi_pengaduan,tbl_tanggapan.isi as isi_tanggapan,tbl_tanggapan.tanggal as tanggal_tanggapan,tbl_tanggapan.kode_tanggapan FROM tbl_pengaduan right JOIN tbl_anggota on tbl_anggota.nik = tbl_pengaduan.nik right JOIN tbl_tanggapan on tbl_pengaduan.kode_pengaduan = tbl_tanggapan.kode_pengaduan ");
?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">List Tanggapan</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pengaduan</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                     <th>Email</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Pengaduan</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Isi Tanggapan</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['kode_pengaduan'] ?></td>
                        <td><?= $tampil['nik'] ?></td>
                        <td><?= $tampil['nama'] ?></td>
                        <td><?= $tampil['alamat'] ?></td>
                        <td><?= $tampil['email'] ?></td>
                        <td><?= $tampil['tanggal_pengaduan'] ?></td>
                        <td><?= $tampil['isi_pengaduan'] ?></td>
                        <td><?= $tampil['tanggal_tanggapan'] ?></td>
                        <td><?= $tampil['isi_tanggapan'] ?></td>
                        <td><a href="javascript:;" data-id="<? echo $tampil['kode_tanggapan'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=tanggapan&m2=edittanggapan&id_edit=<?= $tampil['kode_tanggapan'] ?>" class="
						btn btn-success btn-warning fa fa-edit" alt="Tanggapi"></a></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>


        <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body btn-info">
                        Apakah Anda yakin ingin menghapus data ini ?
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-datatanggapan">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
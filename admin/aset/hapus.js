$(document).ready(function(){
 
$('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')
 
var modal = $(this)
 
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-datatanggapan').attr("href","?m1=tanggapan&m2=listtanggapan&id_delete="+id);
modal.find('#hapus-true-data-transaksi').attr("href","?m1=transaksi&m2=transaksi&id_delete="+id);
modal.find('#hapus-true-data-pembayaran').attr("href","?m1=pembayaran&m2=pembayaran&id_delete="+id);
modal.find('#hapus-true-data-admin').attr("href","?m1=admin&m2=admin&id_delete="+id);
modal.find('#hapus-true-data-anggota').attr("href","?m1=anggota&m2=anggota&id_delete="+id);
modal.find('#hapus-true-data-pengaduan').attr("href","?m1=pengaduan&m2=datapengaduan&id_delete="+id);

})
 
});

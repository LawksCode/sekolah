function add_kuota(base_url) {
	document.getElementById("modal_title_add").innerHTML = "Form Tambah Kuota";
	document.getElementById("button").innerHTML = "Tambah Data";
	document.getElementById("nama_kelas").value = "";
	document.getElementById("jumlah_kuota").value = "";
	document.getElementById("batas_pendaftar").value = "";
	document.getElementById("form").action = base_url;
}
function edit_kuota(base_url, kelas, jumlah, id,batas) {
	document.getElementById("modal_title_add").innerHTML = "Form Update Kuota";
	document.getElementById("nama_kelas").value = kelas;
	document.getElementById("jumlah_kuota").value = jumlah;
	document.getElementById("id_kuota").value = id;
	document.getElementById("batas_pendaftar").value = batas;
	document.getElementById("button").innerHTML = "Update Data";
	document.getElementById("form").action = base_url;
}
function delete_kuota(base_url) {
	document.getElementById("buttondelete").href = base_url;
}

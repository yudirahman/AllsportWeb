$(document).ready(function(){
    /*Activate data table*/
    $('#datatable').DataTable();
    /* Activate CKEDITOR*/
    CKEDITOR.replace('profil',{height:300});

});

/*PRODUK*/
  function katProdukEdit(id) {
    $('#modal_edit_kategori').modal('show');
    $.get()
    $('#form_edit_kategori [name=id]').val(id);
    $('#form_edit_kategori [name=nama_kategori]').val(nama_kategori);
    $('#form_edit_kategori [name=keterangan]').text(keterangan);
  }
/*ENDPRODUK*/

      
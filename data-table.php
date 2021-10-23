<?php

//serverside request
function get_list_pengadaan_stock()
{
    include '../../page/koneksi.php';
    include '../datatable.class.php';

    $table = 'tb_barang';
    $primaryKey = 'id_barang';

    $columns = array(
        array( 'db' => '`id_barang` AS id_barang_cb', 'dt' => 0, 'field' => 'id_barang' ),
        array( 'db' => '`nama_barang`',  'dt' => 1, 'field' => 'nama_barang' ),
        array( 'db' => '`nama_kategori`',   'dt' => 2, 'field' => 'nama_kategori' ),
        array( 'db' => "harga",     'dt' => 3, 'field' => 'harga' ),
        array( 'db' => '`thumbnail`',     'dt' => 4, 'field' => 'thumbnail' ),
        array( 'db' => '`stock`', 'dt' => 5, 'field' => 'stock'),
        array( 'db' => '`id_barang`', 'dt' => 6, 'field' => 'id_barang'),
    );
    // require('config.php');
    $sql_details = array(
        'user' => $user_name,
        'pass' => $password,
        'db'   => $database,
        'host' => $host
    );

    $joinQuery = "FROM tb_barang join tb_kategoribarang on tb_barang.kategori_barang = tb_kategoribarang.id_kategori";
    $extraWhere = "";
    $groupBy = "";
    $having = "";

    echo json_encode(
        DataTable::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    );
}

?>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );


//menampilkan data dengan requset serverside
var table = $('#example').DataTable( {
   "order": [[ 0, "asc" ]],
   "processing": true,
   "serverSide": true,
   "serverMethod" : "post",
   "ajax": {
      "url" : "api-pengadaan-stock.php?function=get_list_pengadaan_stock",
      "type": "POST",
      "data" : function(d){
         d.where_condition = $('#input-where-condition').val();
     }
   },
   "columnDefs" : [
     { orderable: true, targets: 0 },
     { orderable: true, targets: 1 },
     { orderable: true, targets: 2 },
     { orderable: true, targets: 3 },
     { orderable: true, targets: 4 , render : image},
     { orderable: true, targets: 5 },
     { orderable: true, targets: 6 , render : btn_edit },
   ],
   createdRow: function( row, data, dataIndex ) {
   }
});
</script>
$.ajax({
    url: url,
    data: {
      tgl_awal: tgl_awal,
      tgl_akhir: tgl_akhir,
    },
    type: 'POST',
    dataType: 'json',
    async: true,
    success: function(data) {
      if (data.status == "success") {
        prosesexport('1', data.rowcount, source, 0);
      }
    }
  });

  $.each([ 52, 97 ], function( index, value ) {
    alert( index + ": " + value );
  });


  // menjalankan sebuah fungsi berdasarkan interval waktu 1000 = 1 detik
  setInterval(function() {
    getTicketBalasan();
    console.log("ok");
    
}, 2000);
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
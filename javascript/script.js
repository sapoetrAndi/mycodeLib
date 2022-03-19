// format dari datetime menjadi 2 November 2021 11:28:43
function formatTglOrder(datetime){
    let date = new Date(datetime);

    let day = date.getDate();
    let month = date.toLocaleString('default', { month: 'long' });
    let year = date.getFullYear();
    let hour = date.getHours();
    let minute = date.getMinutes();
    let second = date.getSeconds();
    let datetimeOrder = day + " " + month + " " + year + " " + hour + ":" + minute + ":" + second;
    return datetimeOrder;
}

// konversi dari angka ke format mata uang
function numberToCurrency(number){    
    let harga =  new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
    }).format(number);
    return harga;
}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
    console.log(angka);
    console.log(prefix);
    return false;
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa         = split[0].length % 3,
    rupiah         = split[0].substr(0, sisa),
    ribuan         = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}



//atur overlay multiple modal
$(document).on({
    'show.bs.modal': function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    },
    'hidden.bs.modal': function() {
        if ($('.modal:visible').length > 0) {
            // restore the modal-open class to the body element, so that scrolling works
            // properly after de-stacking a modal.
            setTimeout(function() {
                $(document.body).addClass('modal-open');
            }, 0);
        }
    }
}, '.modal');
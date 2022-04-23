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
      currency: "IDR",
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(number);
    return harga;
}

//story kurang dari 24 jam
// 24 jam == 86400000ms
if((now - datetime_created) < 86400000 && (now - datetime_created) > 0){}
// format dari datetime menjadi 2 November 2021 11:28:43
function formatTglOrder(datetime){
    let date = new Date(datetime);

    let day = date.getDay();
    let month = date.toLocaleString('default', { month: 'long' });
    let year = date.getFullYear();
    let hour = date.getHours();
    let minute = date.getMinutes();
    let second = date.getSeconds();
    let datetimeOrder = day + " " + month + " " + year + " " + hour + ":" + minute + ":" + second;
    return datetimeOrder;
}
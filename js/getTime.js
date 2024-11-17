function headerGetHours() {
    var date = new Date();
    let hours = date.getHours();

    if (hours < 10) {
        return "0" + hours;
    } else {
        return hours
    }
}

function headerGetMinutes() {
    var date = new Date();
    let minutes = date.getMinutes();

    if (minutes < 10) {
        return ":0" + minutes;
    } else {
        return ":" + minutes
    }
}

function headerGetSeconds() {
    var date = new Date();
    let seconds = date.getSeconds();

    if (seconds < 10) {
        return ":0" + seconds;
    } else {
        return ":" + seconds;
    }
}

function headerGetDay() {
    var date = new Date();
    let day = date.getDate();
    return day + ".";
}

function headerGetMonth() {
    var date = new Date();
    let month = date.getMonth();

    if (++month < 10) {
        return "0" + month + ".";
    } else {
        return month + ".";
    }
}

function headerGetYear() {
    var date = new Date();
    let year = date.getFullYear();
    return year;
}

let headerTime = document.getElementsByClassName("header-time")[0];
let headerDay = document.getElementsByClassName("header-day")[0];

headerTime.getElementsByTagName("h1")[0].innerText = headerGetHours();
headerTime.getElementsByTagName("h1")[1].innerText = headerGetMinutes();
headerTime.getElementsByTagName("h1")[2].innerText = headerGetSeconds();

setInterval(() => {
    headerTime.getElementsByTagName("h1")[0].innerText = headerGetHours();
    headerTime.getElementsByTagName("h1")[1].innerText = headerGetMinutes();
    headerTime.getElementsByTagName("h1")[2].innerText = headerGetSeconds();
}, 1000);

headerDay.getElementsByTagName("h1")[0].innerText = headerGetDay();
headerDay.getElementsByTagName("h1")[1].innerText = headerGetMonth();
headerDay.getElementsByTagName("h1")[2].innerText = headerGetYear();
setInterval(function() { // met a jour toute les secondes la function refresh_Messages();
    refresh_Messages();
}, 500);


setInterval(function() { // met a jour toute les secondes la function refresh_Messages();
    refresh_User_Online_Display();
}, 3000);


setInterval(function() { // met a jour toute les secondes la function refresh_Messages();
    refresh_User();
}, 3000);


function refresh_Messages() {
    var xmlhttp;
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("messageAfficher").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "assets/inc/readmessage.php", true);
    xmlhttp.send();
}


function refresh_User() {
    var xmlhttp;
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("useronline").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "assets/inc/checkuser.php", true);
    xmlhttp.send();
}


function refresh_User_Online_Display() {
    var xmlhttp;
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("userOnlineDisplay").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "assets/inc/countUser.php", true);
    xmlhttp.send();
}
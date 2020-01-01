setInterval(function() { // mise a jour du graphique et des données chaques secondes
    refresh_Messages();
}, 1000);

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
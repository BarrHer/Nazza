
var ladate=new Date();
var date = ladate.toISOString().split('T')[0];
var heure = ladate.toTimeString().split(' ')[0];
//document.getElementById('trajetHeure').value = heure;
//$("#trajetDate").val(date);
$("#trajetHeure").val(heure);
$(document).ready(function() {
    $("#trajetDate").attr({
       "min" : date,
       "value" : date
    });
});

function verif(input){
    var ville1 = document.getElementById('inputAddress').value;
    var ville2 = document.getElementById('inputAddress2').value;
    if (input == 1){
        if (ville1 != 1){
        document.getElementById('inputAddress2').value = 1;
        }
        else {
            document.getElementById('inputAddress2').value = 0;
        }
    }
    else {
        if (ville2 != 1){
        document.getElementById('inputAddress').value = 1;
        }
        else {
            document.getElementById('inputAddress').value = 0;
        }
    }
    
}

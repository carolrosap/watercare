function abrirPag_anual(valor){
var url = valor;
 
xmlRequest.open("GET",url,true);
xmlRequest.onreadystatechange = mudancaEstado_anual;
xmlRequest.send(null);
 
if (xmlRequest.readyState == 1) {
document.getElementById("anual").innerHTML = "<img src='loader.gif'>";
}
 
return url;
}
 
function mudancaEstado_anual(){
if (xmlRequest.readyState == 4){
document.getElementById("anual").innerHTML = xmlRequest.responseText;
}
}

//cadastro
function abrirPag_mensal(valor){
var url = valor;
 
xmlRequest.open("GET",url,true);
xmlRequest.onreadystatechange = mudancaEstado_mensal;
xmlRequest.send(null);
 
if (xmlRequest.readyState == 1) {
document.getElementById("mensal").innerHTML = "<img src='loader.gif'>";
}
 
return url;
}
 
function mudancaEstado_mensal(){
if (xmlRequest.readyState == 4){
document.getElementById("mensal").innerHTML = xmlRequest.responseText;
}
}
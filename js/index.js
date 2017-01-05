var profesional = document.getElementById("pr");
var extension = document.getElementById("ex");

function mostrarc(e,id) {
 switch(e)
 {
  case 'Profesional':
   $("#carrera").load('laboratorios/combocarrera.php?tipo=profesional&id='+id);
   break;
  case 'Extension':
    $("#carrera").load('laboratorios/combocarrera.php?tipo=extension&id='+id);
   break;
 }
}
function save(){
	var formData = new FormData($('#freserva')[0]);
  $.ajax({
    url: 'laboratorios/inreserv.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
		success: function(data){
      console.log(data);
		  if (data==1) {
        alert("Se registro correctamente");
      }else {
        alert("Horario No disponible");
      }
		}
  });     
	return false;
}
function cargas(){
  var formData = new FormData($('#carga')[0]);
  $.ajax({
    url: 'carga_laboral/carga.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
   
        alert("Se registro correctamente");
        $('#carga')[0].reset();
    }
  });      
  return false;
}
function bajon(){
  var formData = new FormData($('#baja')[0]);
  $.ajax({
    url: 'baja.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);   
        window.location.href="index.php";      
    }
  });     
  return false;
}
function report(){
  var formData = new FormData($('#reporte')[0]);
  $.ajax({
    url: 'tardanza/reporte.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);   
        alert("Se reporto correctamente");
        $('#reporte')[0].reset();
    }
  });
  return false;
}
function rep(){
   $("#general").load('carga_laboral/reporte.php');
}
function mail(){
  var id=$('#profe').val();
  var tipo=$('#tipo').val();
  var obs=$('#obs').val();
  $("#mail").load('tardanza/mail.php',{id:id,tipo:tipo,obs:obs});
}
function savealu(){
  var formData = new FormData($('#Alumno')[0]);
  $.ajax({
    url: 'inalumno.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
    }
  });
  return false;
}
function provi(){
  var id=$('#departamento').val();
  $("#provi").load("provincia.php",{id:id});
}
function dist(){
  var id=$('#departamento').val();
  var d=$('#provincia').val();
  $("#dist").load("distrito.php",{id:id,d:d});  
}
function saveaula(){
  var formData = new FormData($('#aula')[0]);
  $.ajax({
    url: 'inreserv.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
      if (data==1) {
        alert("Se registro correctamente");
        $('#aula')[0].reset();
      }else {
        alert("Horario No disponible");
      }
    }
  });      
  return false;
}
function setlab(id)
{
	if(id==1){ var txt = "Lab 1"};
	if(id==3){ var txt = "Lab 2"};
	if(id==4){ var txt = "Lab HW"};
	$('#lab').val(id);
	$('#c_lab').html(txt);
}
function setaula(id)
{
  if(id==1){ var txt = "Lunes"};
  if(id==2){ var txt = "Martes"};
  if(id==3){ var txt = "Miercoles"};
  if(id==4){ var txt = "Jueves"};
  if(id==5){ var txt = "Viernes"};
  if(id==6){ var txt = "Sabado"};
  $('#lab').val(id);
  $('#c_lab').html(txt);
}
function settur(id)
{
	if(id==1){ var txt = "Mañana"};
	if(id==2){ var txt = "Tarde"};
	if(id==3){ var txt = "Noche"};
	$('#tur').val(id);
	$('#c_tur').html(txt);
}
function setturn(id)
{
  if(id==1){ var txt = "Mañana"};
  if(id==2){ var txt = "Tarde"};
  if(id==3){ var txt = "Noche"};
  $('#tur').val(id);
  $('#c_tur').html(txt);
}
function setpabe(id)
{
  if(id=='A'){ var txt = "Pabellon A"};
  if(id=='B'){ var txt = "Pabellon B"};
  $('#pabellon').val(id);
  $('#pabe').html(txt);
}
function buscar()
{
  var lab=$('#lab').val();
  var tur=$('#tur').val();
  var fecha=$('#fecha').val();
  if (lab!="" && tur!="" && fecha!="") {
    $("#cont").load("horario.php", {lab:lab, tur:tur, fec:fecha})
  }else
  {
    alert('Seleccione bien las opciones.');
  }
}
function buscaraula()
{
  var lab=$('#lab').val();
  var tur=$('#tur').val();
  var fecha=$('#fecha').val();
  var pabe=$('#pabellon').val();
  if (lab!="" && tur!="" && fecha!="" && pabe!="") {
    $("#conte").load("haula.php", {lab:lab, tur:tur, fec:fecha,pabe:pabe})
  }else
  {
    alert('Seleccione bien las opciones.');
  }
}
function fechas(){
    var fi=$('#fechaini').val().split("-");
    var ff=$('#fechafin').val().split("-");
    if(ff[0] > fi[0])
        {return(true);}
    else{
        if (ff[0] == fi[0]){
            if(ff[1] > fi[1])
                return(true);
            if(ff[1] == fi[1])
                if(ff[2] >= fi[2])
                    return(true);
                else
                    {alert('Colocar bien el Dia');}
            else
                {alert('Colocar bien el Mes');}
        }else
            {alert('Colocar bien Año');}
    }  
}
function horas(t){
    if (t==1) {      
      $('#hini,#hfin').html('<option value="08:00:00">08:00</option>'+
        '<option value="08:45:00">08:45</option><option value="09:30:00">09:30</option>'+
        '<option value="10:15:00">10:15</option><option value="11:00:00">11:00</option>'+
        '<option value="11:45:00">11:45</option><option value="12:30:00">12:30</option>');
    }else if (t==3) {     
      $('#hini,#hfin').html('<option value="18:00:00">06:00</option>'+
        '<option value="18:45:00">06:45</option><option value="19:30:00">07:30</option>'+
        '<option value="20:30:00">08:30</option><option value="21:15:00">09:15</option>'+
        '<option value="22:00:00">10:00</option>');
    }
    else if (t==2) {      
      $('#hini,#hfin').html('<option value="14:00:00">02:00</option>'+
        '<option value="14:45:00">02:45</option><option value="15:30:00">03:30</option>'+
        '<option value="16:15:00">04:15</option><option value="17:00:00">05:00</option>'+
        '<option value="17:45:00">05:45</option>');
    }
}
function addcontact(){
  var formData = new FormData($('#fcontacto')[0]);
  $.ajax({
    url: 'incontacto.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
      alert("Se registro correctamente");
      $('#fcontacto')[0].reset();
    }
  });      
  return false;
}
function loadsec(){
  var id=$("#carre").val();
  $("#seccion").load('encuesta/modificar/combocarrera.php?carre='+id);
 }
 function loadaula()
 {
  var id=$("#pabellon").val();
  $("#laboratorio").load('comboaula.php?pabellon='+id);
 }
 function delpc(id)
 {
    $.post( "encuesta/modificar/eliminar.php", { idpc:id })
    .done(function( data ) {
      if (data==1) {
        buscarpc();
      }else{
        alert("Error al modificar el Contenido");
      }
    });
 }
function buscarpc()
{
  var c=$("#carre").val();
  var s=$("#secc").val();
  $.post("encuesta/modificar/modificar.php",{carre:c,secc:s})
  .done(function(data){
    $("#conte2").html(data);
  })
}
function buscarc(){
  var ca=$('#carrera').val();
  var ci=$('#ciclo').val();
  var cu=$('#curso').val();
  var p=$('#profe').val();
    $("#buscar").load("carga_laboral/lista.php?ca="+ca+"&ci="+ci+"&cu="+cu+"&p="+p);
    $("#buscar").show();
}
function buscarprofe()
{
  var c=$("#nombre").val();
  var s=$("#ape").val();
  var t=$("#trat").val();
  $.post("docente/cdocente.php",{nombre:c, ape:s, trat:t })
  .done(function(data){
    $("#contedoc").html(data);
  })
}
function buscaralu()
{
  var c=$("#nombre").val();
  var s=$("#ape").val();
  $.post("alumno.php",{nombre:c, ape:s })
  .done(function(data){
    $("#listado").html(data);
  })
}
function indice(i){
  var n=$('#nx').val();
  var a=$('#ax').val();
$.post("alumno.php",{pagina:i, nombre:n, ape:a})
  .done(function(data){
    $("#listado").html(data);
  })
}
function indices(ix){
  var n=$('#nx').val();
  var a=$('#ax').val();
  var i=ix-1;
$.post("alumno.php",{pagina:i, nombre:n, ape:a})
  .done(function(data){
    $("#listado").html(data);
  })
}
function indicex(ix){
  var n=$('#nx').val();
  var a=$('#ax').val();
  var i=ix+1;
$.post("alumno.php",{pagina:i, nombre:n, ape:a})
  .done(function(data){
    $("#listado").html(data);
  })
}
function agregar()
{
  $("#conte2").hide();
  $("#editar").load("encuesta/modificar/agregar.php");
  $("#editar").show();
}
function load()
{
  var id=$("#carreras").val();
  $("#s").load('encuesta/modificar/combociclo.php?carre='+id);
}
//cargar ciclo  de reserva de laboratorio
function cload(){
  var id=$("#carre").val();
  $("#cic").load('laboratorios/combociclo.php?carre='+id);
}
function curload(){
  var id=$("#carre").val();
  var ci=$("#ciclo").val();
  $("#cur").load("laboratorios/combocurso.php",{ci:ci,carre:id});
}
function lcurso(){
  var id=$("#carrerax").val();
  var ci=$("#ciclo").val();
  $("#cur").load("carga_laboral/curso.php",{ci:ci,carrera:id});
}
function load2()
{
      var id=$("#carreras").val();
      var ci=$("#seccion_").val();   
      $("#c").load('encuesta/modificar/curso.php', {ci:ci,carre:id});
}
function loadciclo()
{
  var id=$("#c").val();
  $("#cic").load('encuesta/modificar/actciclo.php?ic='+id);
}
function loadcurso()
{
      var id=$("#c").val();
      var ci=$("#ci").val(); 
      $("#cur").load('encuesta/modificar/actcurso.php',{ic:id,ci:ci});
}
function ccurso(){
    var id=$("#carre").val();
    var ci=$("#ciclo").val(); 
    $("#cur").load('laboratorios/combocurso.php', {ciclo:ci,carre:id});   
}
//mandar id para Selected de curso
function cus(c){
   $.post("laboratorios/eliminar.php",{c:c});
}
//pop up
function editar()
    {
      var id=$('#profe').val();
      window.location.href = "contacto.php?id="+id;    
    return false;
    }
function det(id){
  $('#pop').load("carga_laboral/pop.php",{id:id});
  $('#pop').modal('show');
}
function pag(id,n){
  $('#pop').load("pop.php",{id:id,n:n});
  $('#pop').modal('show');
}
function actualizar(id,_s)
{
  $.post( "encuesta/modificar/actualizarpc.php", { idpc:id,ns:_s})
    .done(function( data ) {
      $("#editar").html(data);
    });
    $("#conte2").hide();
    $("#editar").show();
}
function actlaboral(id,curso){
  $.post( "carga_laboral/curso.php", { curso:curso})
    .done(function( data ) {   
    });
  $('#general').load('carga_laboral/laboral.php?id='+id);
  $('#cargo').hide();
  $('#claboral').show();
}
function nuevopc(){
  var formData = new FormData($('#pc')[0]);
  $.ajax({
    url: 'encuesta/modificar/agregarpc.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
      alert("Agregado Exitosamente");
    }
  });       
  return false;
}
function actualizarpc(){
  var formData = new FormData($('#actpc')[0]);
  $.ajax({
    url: 'encuesta/modificar/actualizar.php',
    type: 'POST',      
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
      alert("Actualizado Exitosamente");
    }
  });
  return false;
}
function oc(){
  $("#editar").hide();
  $("#conte2").show();
  buscarpc();
}
function actreserva(id)
{
  $.post("laboratorios/eliminar.php",{id:id});
  verlab();
}
function reservar()
{
      window.location.href = "../laboratorios/reserva.php";
}
function tipo(){
    var tipo="1";
    $("#aula").load("laboratorios/aula.php",{tipo:tipo});
    console.log(tipo);
  }
function tipo1(){
    var tipo="2";
    $("#aula").load("laboratorios/aula.php",{tipo:tipo});
    console.log(tipo);
  }
function labora(){
  window.open("laboratorios/index.php");  
}
function verlab()
{
 $("#general").load('laboratorios/registros.php');
}
function verencu()
{
  window.location.href="encuesta/index.html";
}
function encuesta()
{
 $("#general").load('encuesta/modificar/editar.php');
}
function labo(){ 
  $("#general").load("laboratorios/reserva.php");
}
function verdoce()
{
  $("#general").load("docente/docente.php");
}
function xcarga()
{
  $("#general").load("carga_laboral/buscar.php");
}
function cargolab()
{
  $("#general").load("carga_laboral/laboral.php");
}
function tard()
{
  $("#general").load("tardanza/index.php");
}
function filtrar(){
  var dia=$("#dia").val();
  var carrera=$("#carrera").val();
  var turno=$("#turno").val();
  $("#consulta").hide();
  $("#consulta1").load("laboratorios/consulta.php", {dia:dia, carrera:carrera, turno:turno})
  $("#consulta1").show();
}
function ocultar(){
  $("#conte2").show();
  $("#editar").load("encuesta/modificar/agregar.php");
  $("#editar").hide();
  buscarpc();
}
function mdocente(){
  window.open("docente/index.php");  
}
(function($)
{
function calculardiferencia(){
  var hora_inicio = $('#fecped').val();
  var hora_final = $('#fecent').val();

  // Expresión regular para comprobar formato
  var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

  // Si algún valor no tiene formato correcto sale
  if (!(hora_inicio.match(formatohora)
        && hora_final.match(formatohora))){
    return;
  }

  // Calcula los minutos de cada hora
  var minutos_inicio = hora_inicio.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
  var minutos_final = hora_final.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

  // Si la hora final es anterior a la hora inicial sale
  if (minutos_final < minutos_inicio) return;

  // Diferencia de minutos
  var diferencia = minutos_final - minutos_inicio;

  // Cálculo de horas y minutos de la diferencia
  var horas = Math.floor(diferencia / 60);
  var minutos = diferencia % 60;

  $('#cosenv').val(horas + ':'
    + (minutos < 10 ? '0' : '') + minutos);
}

$('#fecped').change(calculardiferencia);
$('#fecent').change(calculardiferencia);
calculardiferencia();


/**
 * [express description]
 * @return {[type]} [monto del envio con respecto a la hora ]
 */
// function express(){
//     var elemento = document.getElementById("express_1");
//     alert(" Elemento: " + elemento.value + "\n Seleccionado: " + elemento.checked);

//     elemento = document.getElementById("express_2");
//     alert(" Elemento: " + elemento.value + "\n Seleccionado: " + elemento.checked);

//     elemento = document.getElementById("express_3");
//     alert(" Elemento: " + elemento.value + "\n Seleccionado: " + elemento.checked);

//     elemento = document.getElementById("express_4");
//     alert(" Elemento: " + elemento.value + "\n Seleccionado: " + elemento.checked);

//     elemento = document.getElementById("express_5");
//     alert(" Elemento: " + elemento.value + "\n Seleccionado: " + elemento.checked);
// }
//
//
//
// opciones = document.getElementsByName("opciones");

// var seleccionado = false;
// for(var i=0; i<opciones.length; i++) {
//   if(opciones[i].checked) {
//     seleccionado = true;
//     break;
//   }
// }

// if(!seleccionado) {
//   return false;
// }
//
//
//
//
//
//



/**
 * [ShowSelected description]
 * descripcion: funcion que captura si el usuario a seleccionado una opcion del select
 * obtiene su indice y el text pasado.
 */
function ShowSelected()
{
  var cod = document.getElementById("select_zona").selectedIndex;
    if( indice == null || indice == 0 ) {
  return false;
  }
/* Para obtener el valor */
var cod = document.getElementById("select_zona").value;
alert(cod);

/* Para obtener el texto */
var combo = document.getElementById("select_zona");
var selected = combo.options[combo.selectedIndex].text;
alert(selected);
}

})( jQuery );
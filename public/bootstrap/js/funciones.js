//////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
  var table = $('#example').DataTable({
    language: {
      "processing": "Procesando...",
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "search": "Buscar:",
      "infoThousands": ",",
      "loadingRecords": "Cargando...",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
          "1": "Copiada 1 fila al portapapeles",
          "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
          "-1": "Mostrar todas las filas",
          "1": "Mostrar 1 fila",
          "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
      },
      "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
      },
      "decimal": ",",
      "searchBuilder": {
        "add": "Añadir condición",
        "button": {
          "0": "Constructor de búsqueda",
          "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
          "date": {
            "after": "Despues",
            "before": "Antes",
            "between": "Entre",
            "empty": "Vacío",
            "equals": "Igual a",
            "not": "No",
            "notBetween": "No entre",
            "notEmpty": "No Vacio"
          },
          "number": {
            "between": "Entre",
            "empty": "Vacio",
            "equals": "Igual a",
            "gt": "Mayor a",
            "gte": "Mayor o igual a",
            "lt": "Menor que",
            "lte": "Menor o igual que",
            "not": "No",
            "notBetween": "No entre",
            "notEmpty": "No vacío"
          },
          "string": {
            "contains": "Contiene",
            "empty": "Vacío",
            "endsWith": "Termina en",
            "equals": "Igual a",
            "not": "No",
            "notEmpty": "No Vacio",
            "startsWith": "Empieza con"
          }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
          "0": "Constructor de búsqueda",
          "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
      },
      "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
          "0": "Paneles de búsqueda",
          "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
      },
      "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
          "1": "1 celda seleccionada",
          "_": "$d celdas seleccionadas"
        },
        "columns": {
          "1": "1 columna seleccionada",
          "_": "%d columnas seleccionadas"
        }
      },
      "thousands": ".",
      "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas"
      }
    },
    buttons: [
      { extend: 'copy', text: "Copiar" },
      { extend: 'excel', text: "Exportar excel", title: "Listado Mascotas" },
      { extend: 'pdf', text: "Exportar PDF", title: "Listado Mascotas" },
      { extend: 'colvis', text: "Mostrar" },
    ],
    
    lengthChange: true,
  });
  table.buttons().container().addClass('mover').appendTo('#example_wrapper .col-md-6:eq(0)');
});
//////////////////////////////////////////////////////////////////////////////
function alerta() {
  if (confirm("Confirme Para Registrar")) {
    return true;
  } else {
    return false;
  }

}
function eliminar() {
  if (confirm("Confirme Para Eliminar Factura")) {
    return true;
  } else {
    return false;
  }
}
function activar() {
  if (confirm("Confirme Para Activar")) {
    return true;
  } else {
    return false;
  }
}

function desactivar() {
  if (confirm("Confirme Para Desactivar")) {
    return true;
  } else {
    return false;
  }
}
function actualizar() {
  if (confirm("Confirme Para Actualizar")) {
    return true;
  } else {
    return false;
  }
}

function validar() {

  if (confirm("Confirme Para Registrar")) {
    return true;
  } else {
    return false;
  }

}

function buscar() {

  var esperar = 300;
  $.ajax({

    type: "POST",

    data: $("form1").serialize(),
    // codigo es el nombre de la variable que llamaré en el archivo procesar.php 
    // y es extraido de lo que tiene el input txt_codigo 
    url: "producto/all",

    beforeSend: function () {
      $('#resultado').text('...Cargando Por Favor espere...');
    },

    success: function (datos) {
      setTimeout(function () {
        $('#resultado').html(datos);
      }, esperar
      );
    }  // el archivo php al cual se va a direccionar

  });
}



function busca() {
  alert("siii");
  $.ajax({

    url: "producto/all",
    method: 'POST',
    data: $("form1").serialize(),
  }).done(function (res) {
    alert("sii");
    alert(res);
  });
}
document.addEventListener('DOMContentLoaded', () => {

	let tableCor;
	
	const lenguaje = {
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix":    "",
	    "sSearch":         "Buscar:",
	    "sUrl":            "",
	    "sInfoThousands":  ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	        "sFirst":    "Primero",
	        "sLast":     "Último",
	        "sNext":     "Siguiente",
	        "sPrevious": "Anterior"
	    },
	    "oAria": {
	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	};

	dataTableCor = () => {
		tableCor = $("#tbListCor").dataTable({
			"aProcessing" : true,
			"aServerSide" : true,
			dom : 'Bftrip',
			buttons: [
			],
			"ajax" : {
				url : "../../../ajax/reports/dataUsSel.php?oper=listCor",
				type : "GET",
				dataType : "json",
				error : function(e) {
					console.log(e.responseText);
				}
			},
			"bDestroy" : true,
			"iDisplayLength" : 10,
			"order" : [[0, "desc"]],
			"language" : lenguaje
		}).DataTable();
	}

	dataTableCor();

});
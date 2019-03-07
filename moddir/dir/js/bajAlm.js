let tablaAlmBaj;
function init() {
	listarAlmBaj();
}

function listarAlmBaj() {
	tablaAlmBaj = $("#tbListadoAlumnosBaj").dataTable({
		"aProcessing" : true,
		"aServerSide" : true,
		dom : 'Bftrip',
		buttons: [
		],
		"ajax" : {
			url : "../../ajax/dir/almCarDir.php?oper=listarAlmBaj",
			type : "GET",
			dataType : "json",
			error : function(e) {
				console.log(e.responseText);
			}
		},
		"bDestroy" : true,
		"iDisplayLength" : 5
		// "order" : [[0, "desc"]]
	}).DataTable();
}

init();
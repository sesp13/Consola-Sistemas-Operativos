$(document).ready(function() {

	$(".button-folder").click(function(){
		var id = $(this).text().trim();
		$.ajax({
			url: 'php/controlador.php?method=modRuta',
			type: 'POST',
			data: { "id": id },
			success: function (data) {
				console.log(data);
				if(data == "1"){
					location.reload();
				}
			}
		});
	});
	$("#return").click(function(){
		$.ajax({
			url: 'php/controlador.php?method=return',
			type: 'POST',
			success: function (data) {
				if(data == "1"){
					location.reload();
				}else{
					alert(data);
				}
			}
		});
	});
	$('#create-dir').click(function(){
		var nombre = document.getElementById("name-dir").value;
		console.log(nombre);
		$.ajax({
			url: 'php/controlador.php?method=crearCarpeta',
			type: 'POST',
			data: { "nombre": nombre },
			success: function (data) {
				if(data == "Directorio creado"){
					alert(data);
					location.reload();
				}else{
					alert(data);
				}
				document.getElementById("name-dir").value = "";
			}
		});
	});
	$('#create-file').click(function(){
		var nombre = document.getElementById("name-file").value;
		console.log(nombre);
		$.ajax({
			url: 'php/controlador.php?method=crearArchivo',
			type: 'POST',
			data: { "nombre": nombre },
			success: function (data) {
				if(data == "El archivo ha sido creado"){
					alert(data);
					location.reload();
				}else{
					alert(data);
				}
				document.getElementById("name-file").value = "";
			}
		});
	});

});
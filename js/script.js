$(document).ready(function () {

	$(".button-folder").click(function () {
		var id = $(this).text().trim();
		$.ajax({
			url: 'php/controlador.php?method=modRuta',
			type: 'POST',
			data: { "id": id },
			success: function (data) {
				console.log(data);
				if (data == "1") {
					$("#page-top").load('index.php');
					//location.reload();
				}
			}
		});
	});
	$("#return").click(function () {
		$.ajax({
			url: 'php/controlador.php?method=return',
			type: 'POST',
			success: function (data) {
				if (data == "1") {
					$("#page-top").load('index.php');
					//location.reload();
				} else {
					alert(data);
				}
			}
		});
	});
	$('#create-dir').click(function () {
		var nombre = document.getElementById("name-dir").value;
		console.log(nombre);
		$.ajax({
			url: 'php/controlador.php?method=crearCarpeta',
			type: 'POST',
			data: { "nombre": nombre },
			success: function (data) {
				alert(data);
				$("#page-top").load('index.php');
				//location.reload();
				document.getElementById("name-dir").value = "";
			}
		});
	});
	$('#create-file').click(function () {
		var nombre = document.getElementById("name-file").value;
		console.log(nombre);
		$.ajax({
			url: 'php/controlador.php?method=crearArchivo',
			type: 'POST',
			data: { "nombre": nombre },
			success: function (data) {
				if (data == "El archivo ha sido creado") {
					alert(data);
					$("#page-top").load('index.php');
					//location.reload();
				} else {
					alert(data);
				}
				document.getElementById("name-file").value = "";
			}
		});
	});
	$(".change-name-dir").click(function (e) {
		e.preventDefault();
		var carpeta = $(this).attr('name');
		$.ajax({
			url: 'php/controlador.php?method=cambiarNombreCarpeta',
			type: 'POST',
			data: { "carpeta": carpeta },
			success: function (data) {
				console.log(data);
				if (data == "1") {
					$("#page-top").load('index.php');
					//location.reload();
				}
			}
		});
	});
});
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
					$("#page-top").load('index.php');
				}
			}
		});
	});
	$('#create-dir').click(function () {
		swal("Nombre de la carpeta:", {
			content: "input",
		})
			.then((value) => {
				$.ajax({
					url: 'php/controlador.php?method=crearCarpeta',
					type: 'POST',
					data: { "nombre": value },
					success: function (data) {
						swal(data).then((value) => {
							$("#page-top").load('index.php');
						});
					}
				});
			});

	});
	$('#create-file').click(function () {
		swal("Nombre del archivo:", {
			content: "input",
		})
			.then((value) => {
				$.ajax({
					url: 'php/controlador.php?method=crearArchivo',
					type: 'POST',
					data: { "nombre": value },
					success: function (data) {
						swal(data).then((value) => {
							$("#page-top").load('index.php');
						});
					}
				});
			});
	});

	$(".change-name-dir").click(function (e) {
		e.preventDefault();
		var carpeta = $(this).attr('name');
		console.log(carpeta);

		swal("Nuevo nombre de la carpeta:", {
			content: "input",
		})
			.then((value) => {
				$.ajax({
					url: 'php/controlador.php?method=cambiarNombreCarpeta',
					type: 'POST',
					data: {
						"nombreViejo": carpeta,
						"nombreNuevo": value
					},
					success: function (data) {
						swal(data).then((value) => {
							$("#page-top").load('index.php');
						});
					}
				});
			});






		$.ajax({
			url: 'php/controlador.php?method=cambiarNombreCarpeta',
			type: 'POST',
			data: { "carpeta": carpeta },
			success: function (data) {
				if (data == "1") {
					$("#page-top").load('index.php');
					//location.reload();
				}
			}
		});
	});
	$(".delete-dir").click(function (e) {
		e.preventDefault();
		var carpeta = $(this).attr('name');
		console.log(carpeta);
		$.ajax({
			url: 'php/controlador.php?method=eliminarCarpeta',
			type: 'POST',
			data: { "carpeta": carpeta },
			success: function (data) {
				swal(data).then((value) => {
					$("#page-top").load('index.php');
				});


			}
		});
	});
});
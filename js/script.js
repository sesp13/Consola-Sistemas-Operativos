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
	});
	$(".change-name-file").click(function (e) {
		e.preventDefault();
		var archivo = $(this).attr('name');
		console.log(archivo);

		swal("Nuevo nombre del archivo", {
			content: "input",
		})
			.then((value) => {
				$.ajax({
					url: 'php/controlador.php?method=cambiarNombreArchivo',
					type: 'POST',
					data: {
						"nombreViejo": archivo,
						"nombreNuevo": value
					},
					success: function (data) {
						swal(data).then((value) => {
							$("#page-top").load('index.php');
						});
					}
				});
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
				if (data == "1") {
					swal("Se elimino el directorio").then((value) => {
						$("#page-top").load('index.php');
					});
				} else {
					swal("Error").then((value) => {
						$("#page-top").load('index.php');
					});
				}



			}
		});
	});
	$(".delete-file").click(function (e) {
		e.preventDefault();
		var archivo = $(this).attr('name');
		console.log(archivo);
		$.ajax({
			url: 'php/controlador.php?method=eliminarArchivo',
			type: 'POST',
			data: { "archivo": archivo },
			success: function (data) {
				swal("Se elimino el archivo").then((value) => {
					$("#page-top").load('index.php');
				});
			}
		});
	});
	$(".copy-file").click(function (e) {
		e.preventDefault();
		var archivo = $(this).attr('name');
		console.log(archivo);
		$.ajax({
			url: 'php/controlador.php?method=copiarArchivo',
			type: 'POST',
			data: { "archivo": archivo },
			success: function (data) {
				console.log(data);
			}
		});
	});
	$("#paste").click(function (e) {
		$.ajax({
			url: 'php/controlador.php?method=pegar',
			type: 'POST',
			data: {},
			success: function (data) {
				swal(data).then((value) => {
					$("#page-top").load('index.php');
				});
			}
		});
	});
	$(".cut").click(function (e) {
		e.preventDefault();
		var archivo = $(this).attr('name');
		console.log(archivo);
		$.ajax({
			url: 'php/controlador.php?method=cortar',
			type: 'POST',
			data: { "archivo": archivo },
			success: function (data) {
				console.log(data);
			}
		});
	});
	$(".view-info").click(function (e) {
		e.preventDefault();
		var elemento = $(this).attr('name');
		console.log(elemento);
		$.ajax({
			url: 'php/controlador.php?method=verInfoPermisos',
			type: 'POST',
			data: { "elemento": elemento },
			success: function (data) {
				swal(data).then((value) => {
					$("#page-top").load('index.php');
				});
			}
		});
	});
});
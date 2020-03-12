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
					//$("#page-top").load('index.php');
					location.reload();
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
					//$("#page-top").load('index.php');
					location.reload();
				} else {
					alert(data);
					//$("#page-top").load('index.php');
					location.reload();
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
				swal(data).then((value) => {
					$("#page-top").load('index.php');
				});



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
	$(".copy-dir").click(function (e) {
		e.preventDefault();
		var carpeta = $(this).attr('name');
		console.log(carpeta);
		$.ajax({
			url: 'php/controlador.php?method=copiarCarpeta',
			type: 'POST',
			data: { "carpeta": carpeta },
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
				swal(data);
			}
		});
	});
	$(".mod-per").click(function (e) {
		e.preventDefault();
		var elemento = $(this).attr('name');
		console.log(elemento);
		$.ajax({
			url: 'php/controlador.php?method=verInfoPermisos',
			type: 'POST',
			data: { "elemento": elemento },
			success: function (data) {
				var permisos = data.substring(1,4);
				var lista = permisos.split("");
				var lista2 = ["P","G","O"];
				var lista3 = ['read', 'write', 'exec'];
				for (var i = 0; i < lista.length; i++) {
					var aux = (parseInt(lista[i]).toString(2)).split("");
					for (var j = 0; j< aux.length; j++){
						if (i==0) {
							if (aux[j]=="1") {
								var x = document.getElementById(lista3[j]+lista2[i]);
								x.checked = true;
							}else{
								var x = document.getElementById(lista3[j]+lista2[i]);
								x.checked = false;
							}
						}else if(i==1){
							if (aux[j]=="1") {
								var x = document.getElementById(lista3[j]+lista2[i]);
								x.checked = true;
							}else{
								var x = document.getElementById(lista3[j]+lista2[i]);
								x.checked = false;
							}
						}else{
							if (aux[j]=="1") {
								var x = document.getElementById(lista3[j]+lista2[i]);
								x.checked = true;
							}else{
								var x = document.getElementById(lista3[j]+lista2[i]);
								x.checked = false;
							}
						}
					}
				 }

			}
		});
	});
	$("#change-permisos").click(function (e) {
		var readP = document.getElementById('readP').checked;
		var writeP = document.getElementById('writeP').checked;
		var execP = document.getElementById('execP').checked;
		var readG = document.getElementById('readG').checked;
		var writeG = document.getElementById('writeG').checked;
		var execG = document.getElementById('execG').checked;
		var readO = document.getElementById('readO').checked;
		var writeO = document.getElementById('writeO').checked;
		var execO = document.getElementById('execO').checked;
		if(readP){
			readP = "1";
		}else{
			readP = "0";
		}
		if(writeP){
			writeP = "1";
		}else{
			writeP = "0";
		}
		if(execP){
			execP = "1";
		}else{
			execP = "0";
		}
		if(readG){
			readG = "1";
		}else{
			readG = "0";
		}
		if(writeG){
			writeG = "1";
		}else{
			writeG = "0";
		}
		if(execG){
			execG = "1";
		}else{
			execG = "0";
		}
		if(readO){
			readO = "1";
		}else{
			readO = "0";
		}
		if(writeO){
			writeO = "1";
		}else{
			writeO = "0";
		}
		if(execO){
			execO = "1";
		}else{
			execO = "0";
		}

		var usu = readP+writeP+execP;
		var grup = readG+writeG+execG;
		var otro = readO+writeO+execO;
		usu = parseInt(usu,2).toString();
		grup = parseInt(grup,2).toString();
		otro = parseInt(otro,2).toString();
		var permisos = usu + grup + otro;
		$.ajax({
			url: 'php/controlador.php?method=cambiarPermisos',
			type: 'POST',
			data: {"permisos": permisos},
			success: function (data) {
				swal(data)
			}
		});
	});
	$(".change-prop").click(function (e) {
		e.preventDefault();
		var elemento = $(this).attr('name');
		console.log(elemento);
		swal("Nombre del nuevo usuario:", {
			content: "input",
		})
			.then((value) => {
				$.ajax({
					url: 'php/controlador.php?method=cambiarUsuario',
					type: 'POST',
					data: {
						"elemento": elemento,
						"usuario": value
					},
					success: function (data) {
						swal(data).then((value) => {
							$("#page-top").load('index.php');
						});
					}
				});
			});
	});
});
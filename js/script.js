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
				location.reload();
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



});
$(document).ready(function(){
	$('.addtoproperty').on('click', function(event) {
		$.ajax({
			type: "POST",
			url: basePath + "properties/admin_rename",
			// data: {
			// 	id: $(this).attr("id"),
			// 	console("id");
			// //    cantidad: 1
			// },
			dataType: "html",
			success: function(data) {
				$('#msg').html('<div class="alert alert-success flash-msg">Platillo agregado al pedido.</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');
			},
			error: function(){
				alert('Tenemos problemas!!!');
			}
		});
		return false;
	});
});

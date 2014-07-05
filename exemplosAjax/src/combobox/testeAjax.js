window.onload = function() {
	$.ajax ({
		url:'service.php',
		type: 'POST',
		data: 'carrega=TRUE',
		dataType: 'text',
		//asyn:true,
		beforeSend:function() {
			$('#teste').html('<h1>teste</h1>');
		},
		success: function (data) {
			$('#teste').html(data);
		},
	});
}

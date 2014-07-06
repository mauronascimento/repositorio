window.onload = function() {
	$.ajax ({
		url:'service.php',
		type: 'POST',
		data: 'carrega=TRUE',
		dataType: 'text',
		//asyn:true,
		beforeSend:function() {
			//$('#teste').html('<option>teste</option>');
		},
		success: function (data) {
			console.log(data);

			$('#pais').append(data);
		},
	});
}
$('#pais').change(
    function() {
      if($(this).val() == 0) {
        alert('Você precisa informar um PAÍS!');
        $(this).focus();
      }else {

      	$.ajax({
      		url: "service.php",
      		type: "POST",
      		data: "carrega=estados&params="+$('#pais').val(),
      		dataType: "text",
      		beforeSend:function(){

      		},
      		success:function(data) {
      						//$('#teste').html(data);
      			console.log(data);
      			$('#estado').append(data);
      		}
      	});
        //$('#estado').load('service.php?carrega=estados');
      }
});
$('#estado').change(
    function() {
      if($(this).val() == 0) {
        alert('Você precisa informar um Estado!');
        $(this).focus();
      }else {

      	$.ajax({
      		url: "service.php",
      		type: "POST",
      		data: "carrega=cidades&params="+$('#estado').val(),
      		dataType: "text",
      		beforeSend:function(){

      		},
      		success:function(data) {
      						//$('#teste').html(data);
      			console.log(data);
      			$('#cidade').append(data);
      		}
      	});
        //$('#estado').load('service.php?carrega=estados');
      }
});

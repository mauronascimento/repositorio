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
      		data: "carrega=estados",
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

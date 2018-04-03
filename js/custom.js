$(document).ready(function(){

	$('.btn-generate').on('click',function(){

		$.ajax({

				url: 'http://localhost/tutz/ccngen/creditcard_functions.php',
				type: 'POST',
				data:{
					cctype: $('#card_type').val()
				},success:function(response){

					var result = JSON.parse(response);

					console.log(result.result);
					$('.result').html(result.result);

				}
		});

	});


});
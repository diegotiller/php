$(function() {
	$('button').on('click', function(){
		var nome = $('#nome').val();
		$.ajax({
			url:'http://localhost/bonniek_curso_php_completo/phpGit/ajaxEstruturaMVC/ajax',
			type:'POST',
			data:{nome:nome},
			dataType: 'json',
			success:function(json){
				$('.borda').html(json.frase);
			}
		});
	});
});
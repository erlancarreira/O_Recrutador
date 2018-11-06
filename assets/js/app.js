$(document).ready(function(){
    $('#cep').mask('00000-000')
  
    $('.description').each(function() {
	    if( $(this).innerHeight() > 72) {
	        $(this).text($(this).text().substring(0, 100) + "...")
	        
	    }
	    
	    if($(this).innerHeight() < 72) {
	        $(this).css("height", "72px")
	    }
    })

	$('#estado').change(function()
    { 
      let estado = $(this).val()	 
        $.ajax({
            url: BASE+"/ajax/getCitys",
            data: {estado: estado},
            type: 'POST',
            dataType: 'json',
            beforeSend: function(data)
            {   
               $('#cidade').html("<option value='' selected=''>Carregando cidades...</option>")
            },
            success: function(data)
            {  
               $('#cidade').html("<option value='' selected=''>Selecione sua cidade...</option>")
               
               if(data.cidades) {
               	 $.each(data.cidades, function (key, value) {
               	 	console.log(key, value)
               	 	$("#cidade").append("<option value='"+value['id']+"'>"+value['name']+"</option>")
               	 }) 
               }
            }
        })
    })
})


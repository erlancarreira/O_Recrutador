$(document).ready(function(){
  
    $('#cep').mask('00000-000');
  
    
    
    $('.description').each(function() {
        // console.log($(this))
	    
	    if( $(this).innerHeight() > 72) {
            // console.log('ENTREI')
	        $(this).text($(this).text().substring(0, 100) + "...")
	        // $(this).css("max-height", 72).css("overflow", "hidden") 
	    }

	    
	       
    })
    
   
   
})


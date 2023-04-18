$(document).ready(function(){
	
	$(document).on('click', '#getContact', function(e){
		
		// e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		// $('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: './adminView/viewContact-Detail.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			// console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			// $('#modal-loader').hide();		  // hide ajax loader	
		})
	});
	
});
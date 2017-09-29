$(document).ready(function(){
	

	//  CONVERSION DU MARKDOWN EN HTML 
	var str1= $('#hellomark').text();
	$('#hellomark').html(markdown.toHTML(str1));




// TÉLÉCHARGEMENT DU DOCUMENT SOUS FORME .MD
	$('#down').click(function(){
		
			var content = str1;

			var filename = $('#titre').text()+'.md';

			var blob = new Blob([content], {
				type: "text/plain;charset=utf-8"
			});

			saveAs(blob, filename);
	})
	
});
$(function(){	
	// // function untuk mengambil semua data
	function getAll()
	{
		            var id=$('#select_album').val();
		
		      $.ajax({
			                url : "https://www.kecamatankalimanah.id/gallery/get_subkategori/",
			                method : "POST",
			                data : {id: id},
			cache: false,
			                dataType : 'json',
			                success: function(data){
				// console.log(data);
				for(i=0; i<data.length; i++){
					 $('#result').append($("<div class='col-md-6 col-lg-4 item zoom-on-hover'><div class='hovereffect'><a href='https://www.kecamatankalimanah.id/assets/images/"+data[i].gambar+"' data-fancybox='images' data-caption='"+data[i].judul+"' ><img class='img-fluid image' src='https://www.kecamatankalimanah.id/assets/images/"+data[i].gambar+"'> <div class='overlay'><h2>"+data[i].judul+"</h2></div></a></div></div>"))
				}


			                }
		            });
		
	}
	
	getAll(); // load ketika document ready

	// ketika ada event change
	$('#select_album').change(function(){
		            var id=$('#select_album').val();
		$('#result').children().remove();
		            $.ajax({
			                url : "https://www.kecamatankalimanah.id/gallery/get_subkategori/",
			                method : "POST",
			                data : {id: id},
			                dataType : 'json',
			                success: function(data){
				// console.log(data);
				for(i=0; i<data.length; i++){
					 $('#result').append($("<div class='col-md-6 col-lg-4 item zoom-on-hover'><div class='hovereffect'><a href='https://www.kecamatankalimanah.id/assets/images/"+data[i].gambar+"'  data-fancybox='images' data-caption='"+data[i].judul+"'><img class='img-fluid image' src='https://www.kecamatankalimanah.id/assets/images/"+data[i].gambar+"'><div class='overlay'><h2>"+data[i].judul+"</h2></div></a></div></div>"))
				}


			                }
		            });
	        });

	// $('#viewmode').change(function(){
	// 	            let metode=$('#viewmode').val();
	// 	$('#tonton').children().remove();
	// 	            $.ajax({
	// 		                url : "https://www.kecamatankalimanah.id/agenda/"+metode+"/",
	// 		                dataType : 'json',
	// 		                success: function(response){
	// 			if (metode=="get_events") {
	// 				 $('#tonton').append($("<div id='calendar'></div>"));
	// 					MetuCal();
	// 			}else{
	// 				for (var i = 0; i < response.data.length; i++) {
	// 					$('#tonton').append($("<div id='calendar'></div>"));
	// 				}
	// 				// console.table(response.data);
	// 			}
	// 		                }
	// 	            });
	//         });
	function MetuCal(){
		$('#calendar').fullCalendar({

			themeSystem: 'bootstrap4',
			navLinks: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
			locale:'id',
			timeFormat: 'H:mm',	
			eventLimit: true,
			events: 'https://www.kecamatankalimanah.id/agenda/get_events',
			eventClick: function(event) {
				if (event.url) {
					window.open('https://www.kecamatankalimanah.id/agenda/vw:'+event.url);
					return false;
				}
			}
		});

	}
	MetuCal();	
});	
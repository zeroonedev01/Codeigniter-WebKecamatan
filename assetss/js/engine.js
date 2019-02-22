	
	// // function untuk mengambil semua data
	function getAll()
	{
		            var id=$('#select_album').val();
		
		      $.ajax({
			                url : "http://192.168.100.34:8080/MasterKecamatan/gallery/get_subkategori/",
			                method : "POST",
			                data : {id: id},
			cache: false,
			                dataType : 'json',
			                success: function(data){
				// console.log(data);
				for(i=0; i<data.length; i++){
					 $('#result').append($("<div class='col-md-6 col-lg-4 item zoom-on-hover'><div class='hovereffect'><a href='http://192.168.100.34:8080/MasterKecamatan/assets/images/"+data[i].gambar+"' data-fancybox='images' data-caption='"+data[i].judul+"' ><img class='img-fluid image' src='http://192.168.100.34:8080/MasterKecamatan/assets/images/"+data[i].gambar+"'> <div class='overlay'><h2>"+data[i].judul+"</h2></div></a></div></div>"))
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
			                url : "http://192.168.100.34:8080/MasterKecamatan/gallery/get_subkategori/",
			                method : "POST",
			                data : {id: id},
			                dataType : 'json',
			                success: function(data){
				// console.log(data);
				for(i=0; i<data.length; i++){
					 $('#result').append($("<div class='col-md-6 col-lg-4 item zoom-on-hover'><div class='hovereffect'><a href='http://192.168.100.34:8080/MasterKecamatan/assets/images/"+data[i].gambar+"'  data-fancybox='images' data-caption='"+data[i].judul+"'><img class='img-fluid image' src='http://192.168.100.34:8080/MasterKecamatan/assets/images/"+data[i].gambar+"'><div class='overlay'><h2>"+data[i].judul+"</h2></div></a></div></div>"))
				}


			                }
		            });
	        });

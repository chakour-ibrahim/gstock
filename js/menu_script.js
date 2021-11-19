$(document).ready(function(){	

	var model_data = $('#dt-menu').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":false,
		"order":[],
		"ajax":{
			url: "action.php",
			type: "POST",
			data: {action:'listMenu'},
			dataType: "json"
		},
		"columnDefs":[
			{
				"targets":[0, 8],
				"orderable":false,
			},
		],
		"pageLength": 10
	});		

	$('#addMenu').click(function(){
		$('#modal_menu').modal('show');
		$('#form_menu')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Ajouter une Menu");
		$('#action').val('addMenu');
		$('#save').val('Enregistrer');
	});		

	$("#dt-menu").on('click', '.update', function(){
		var id_menu = $(this).attr("id");
		console.log(id_menu);
		var action = 'getMenu';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{id_menu:id_menu, action:action},
			dataType:"json",
			success:function(data){
				$('#modal_menu').modal('show');
				$('#id_menu').val(data.id_menu);
				$("id_app select").val(data.id_app).change();
			
				$('#nom').val(data.nom);
				$('#url').val(data.url);
				$('#icone').val(data.icone);
				$('#sousMenu').val(data.sousMenu);

				$('#actif').prop('checked', (data.active == "Y")?true:false);
				$('#admin').prop('checked', (data.admin == "Y")?true:false);

				$('.modal-title').html("<i class='fa fa-plus'></i> Modifier Menu");
				$('#action').val('updateMenu');
				$('#save').val('Save');
			}
		})
	});

	$("#modal_menu").on('submit','#form_menu', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#form_menu')[0].reset();
				$('#modal_menu').modal('hide');				
				$('#save').attr('disabled', false);
				model_data.ajax.reload();
			}
		})
	});	

	$("#dt-menu").on('click', '.delete', function(){
		console.log('delete')
		var id_menu = $(this).attr("id");		
		var action = "deleteMenu";
		if(confirm("Voulez-vous supprimer cette menu?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id_menu:id_menu, action:action},
				success:function(data) {					
					model_data.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});
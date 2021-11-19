$(document).ready(function(){	

	var model_data = $('#dt-application').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":false,
		"order":[],
		"ajax":{
			url: "action.php",
			type: "POST",
			data: {action:'listApplication'},
			dataType: "json"
		},
		"columnDefs":[
			{
				"targets":[0, 10],
				"orderable":false,
			},
		],
		"pageLength": 10
	});		

	$('#addApplication').click(function(){
		$('#modal_application').modal('show');
		$('#form_application')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Ajouter Une Nouvelle Famille");
		$('#action').val('addApplication');
		$('#save').val('Enregistrer');
	});		

	$("#dt-application").on('click', '.update', function(){
		var id_app = $(this).attr("id");
		var action = 'getApplication';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{id_app:id_app, action:action},
			dataType:"json",
			success:function(data){
				$('#modal_application').modal('show');
				$('#id_app').val(data.id_app);
				$('#Nom').val(data.Nom);
				$('#Descript').val(data.Descript);
				$('#Repertoire').val(data.Repertoire);
				$('#EmailAlerte').val(data.EmailAlerte);
				$('#option1').val(data.option1);
				$('#Bloque').val(data.Bloque);
				$('#champRecherche').val(data.champRecherche);
				$('#modcode').val(data.modcode);
				$('#actif').prop('checked', (data.active == "Y")?true:false);
				$('.modal-title').html("<i class='fa fa-plus'></i> Modifier Application");
				$('#action').val('updateApplication');
				$('#save').val('Save');
			}
		})
	});

	$("#modal_application").on('submit','#form_application', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#form_application')[0].reset();
				$('#modal_application').modal('hide');				
				$('#save').attr('disabled', false);
				model_data.ajax.reload();
			}
		})
	});	

	$("#dt-application").on('click', '.delete', function(){
		var id_app = $(this).attr("id");		
		var action = "deleteApplication";
		if(confirm("Voulez-vous supprimer cette application?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id_app:id_app, action:action},
				success:function(data) {					
					model_data.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});
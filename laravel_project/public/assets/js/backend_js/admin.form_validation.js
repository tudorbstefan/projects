
$(document).ready(function(){
	
	$('#current_pwd').keyup(function(){
		var current_pwd = $('#current_pwd').val();
		$.ajax({
			type: 'get',
			url: '/admin/check-pwd',
			data: {current_pwd:current_pwd},
			success: function(resp){
				if(resp=="false")
				{
					$('#current_pwd').removeClass('error');
					$('#current_pwd').addClass('error');
					$('#check_pwd').html("<font color='red'>Parola curentă nu este corectă!</font>");
				} else if (resp=="true"){
					$('#current_pwd').removeClass('error');
					$('#current_pwd').addClass('success');
					$('#check_pwd').html("<font color='green'>Parola curentă este corectă!</font>");
				} else {
					$('#check_pwd').html("<font color='red'>A apărut o eroare la verificare!</font>");
				}
			}, error: function(){
				alert("Error");
			}
		})
	});

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();

	// Add Category Validation
	$("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			category_description:{
				required:true
			},
			category_url:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			category_description:{
				required:true
			},
			category_url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#deleteButton").click(function(){
		if(confirm("Sunteți sigur că doriți să ștergeți această categorie?")){
			return true;
		}
		return false;
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});

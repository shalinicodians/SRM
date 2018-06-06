$(function(){
	
  

	$.validator.setDefaults({
			highlight:function(element){
				$(element).closest()
				.addClass('error');
			},

			unhighlight:function(element){
				$(element).closest()
				.removeClass('has-error');
			}
		});
	$("#myform").validate({

		rules : {
			firstname : {
				required:true,
				minlength:2
				
			},
			lastname : {
				required :true,
			},
			email :{
				required :true,
				email :true
			},
			mobile : {
				required:true,
				minlength:10
			},
			password :{
				required:true,
				minlength:8
			},
			cpassword :{
				required :true,
				equalTo :'#password'
			},
			gender :{
				
				minlength:1
			}
		},
		messages : {
			firstname : {
				required :'*Please Enter This Field*',
				minlength :'*Name should contain atleast 2 character*'
			},
			lastname : {
				required :'*Please Enter This Field*',
			},
			email :{
				required :'*Please Enter This Field*',
				email: '*Please Enter valid Email *'
			},
			mobile :{
			required :'*Please Enter This Field*',
			minlength :'*Please Enter Correct Mobile No.*'
		},
		password :{
			required :'*Please Enter This Field*',
			minlength:'*password must contain atleast 8 character*'
		},
		cpassword :{
				required :'*Re-Enter Your password *',
				equalTo :'password does not match'
			}

			
	 

		},
		submitHandler: function(myform) {
    myform.submit();
}


	});


		});
$(function(){
	$('#password').keyup(function(){
		$('#p_msg').html(checkStrength($('#password').val()))

	});
	function checkStrength(password){
		var strength=0
		if(password.length<8)
		{
			$("#p_msg").removeClass()
			$("#p_msg").addClass('short')
			return 'Too Short'
		}
		if(password.length>9)
			strength +=1

           if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
           	strength +=1
           if(password.match(/[A-Za-z]/) && password.match(/[0-9]/))
           	strength +=1
           if(password.match(/([!,@,#,$,%,^,&,*,?,_,~])/))
           	strength +=1
           if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) 
           	strength += 1
           if (strength<2)
           {
           	$('#p_msg').removeClass()
           	$('#p_msg').addClass('Weak')
           	return 'Weak'
           }
           else if(strength==2)
           {
           	$('#p_msg').removeClass()
           	$('#p_msg').addClass('Good')
           	return 'Good'

           }
           else
           {
           	$('#p_msg').removeClass()
           	$('#p_msg').addClass('Strong')
           	return 'Strong'

           } 
	}
});

	

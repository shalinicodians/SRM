$(function(){
	$.validator.addMethod("pwcheck",function(value, element) {
   return /^[A-Za-z]+$/.test(value);
});
	
	$("#myform").validate({
		rules : {
			firstname : {
				required:true,
				pwcheck:true,
				minlength:2

			 },
			  
			  lastname : {
				required:true,
				pwcheck:true
			},
			email :{
				required:true,
				email: true
			},
			password :{
				required:true,
				minlength:8,
			
			},
			cpassword : {
				required:true,
				equalTo:"#password"
			}
		},
		messages : {
			firstname:{
				required:'Please enter your First name',
				pwcheck:'Name should contain alphabet',
				minlength:'Name should contain atleast 2  character'
				
			},
			
			lastname : {
				required:'Please enter your Last name',
				pwcheck:'Last name should contain alphabet'
			},
			email :{
				required : 'Please enter you email',
				email :'Please enter valid email address'

			},
			password :{
				required: 'Please enter your password',
				minlength:'Password must contain atleast 8 character'
				
			},
			cpassword : {
				required:'Confirm your password',
				equalTo : 'Password does not match'
			}
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

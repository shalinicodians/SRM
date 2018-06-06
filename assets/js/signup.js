

            
			//var y=document.getElementById('lname').value;
			//var x=document.getElementById('fname').value;
			var msg=document.getElementById('f_name');
			var lmsg=document.getElementById('l_name');

			function validation(){
				//var letters=/^[A-Za-z]+$/;
             var x=document.getElementById('fname').value;
             var y=document.getElementById('lname').value;
			if(x=="")
			{
            msg.innerHTML="*please fill this field*";
           
            
            return false;
			}
		  if(x.length > 20){
			 	msg.innerHTML="*exceed 20 character*";
			 
			 	return false;
			 }
			
			if(y=="")
			{
            lmsg.innerHTML="*please fill this field*";
            
            return false;
			}
		 if(y.length > 20){
			 	lmsg.innerHTML="*exceed 20 character*";
			 	
			 	return false;
			 }
			
			}

		
         // ======================password==================
          
          //var y=document.getElementById('password').value;
		function verify(){
			 var y=document.getElementById('password').value;
			var message;
         if(y.length > 8){
            message="strong";
         }
         else{
         	message="weak";
         }
         document.getElementById('p_msg').innerHTML=message;
		}

function validate()
		{
			var inputFirstName = document.getElementById("inputFirstName");
			var inputLastName = document.getElementById("inputLastName");
			var contactno = document.getElementById("contactno");
			var email = document.getElementById("email");
			var inputUsername = document.getElementById("inputUsername");
			var inputPassword = document.getElementById("inputPassword");
			var address = document.getElementById("address");
			var pincode = document.getElementById("pincode");
			var x = 0;

			if(document.getElementById('m').checked)
				x++;
			if(document.getElementById('f').checked)
				x++;

			if(allLetter(inputFirstName,"First Name"))
			{
				if(allLetter(inputLastName,"Last Name"))
				{	
					if(x != 0)
					{
						if(allnumeric(pincode))  
						{  
							if(ValidateEmail(email))  
							{   
								if(userid_validation(inputUsername,5,12))  
								{  
									if(passid_validation(inputPassword,8,12))  
									{  
										if(contactno.value.length == 10)
										{
											return true;
										}
										else
										{
											document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Contact Number should be 10 digit only.</div>';
										}
									}   
								}  
							}  
						}  
					}
					else
					{
						document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Select your Gender.</div>';
						inputLastName.focus();
					}
				}
			}
			$(document).ready(function(){
			    $('html,body').animate({ scrollTop: 0 }, 'slow');
			});
			return false;  
		}
		function userid_validation(uid,mx,my)  
		{  
			var uid_len = uid.value.length;  
			if (uid_len == 0 || uid_len >= my || uid_len < mx)  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>User Id should not be empty / length be between '+mx+' to '+my+'</div>';
				uid.focus();  
				return false;  
			}
			return true;  
		}
		function passid_validation(passid,mx,my)  
		{  
			var passid_len = passid.value.length;  
			if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password should not be empty / length be between '+mx+' to '+my+'</div>';
				passid.focus();  
				return false;  
			}  
			return true;  
		}
		
		function allLetter(uname,id)  
		{   
			var letters = /^[A-Za-z]+$/;  
			if(uname.value.match(letters))  
			{  
				return true;  
			}  
			else  
			{
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'+id+' must have alphabetic characters only</div>';
				uname.focus();  
				return false;  
			}  
		}
		function allnumeric(uzip)  
		{   
			var numbers = /^[0-9]+$/;  
			if(uzip.value.match(numbers))  
			{  
				if(uzip.value.length==6)
					return true;  
				else
				{
					document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Pincode code must have 6 numeric characters only</div>';
					uzip.focus();  
					return false;  	
				}
			}  
			else  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Pincode code must have numeric characters only</div>';
				uzip.focus();  
				return false;  
			}  
		}
		function ValidateEmail(uemail)  
		{  
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
			if(uemail.value.match(mailformat))  
			{  
				return true;  
			}  
			else  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>You have entered an invalid email address!</div>';
				uemail.focus();  
				return false;  
			}  
		}
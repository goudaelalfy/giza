function submitform()
{
  document.frm_display_data.submit();
}

function show(id) 
{
	document.getElementById(id).style.display = 'block';
} 
function hide(id) 
{
	document.getElementById(id).style.display = 'none';
}

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
		
function checkUncheck_DisplayDataForm() 
{		
	    	for (var i = 0; i < document.frm_display_data.elements.length; i++ ) 
		    {

		        if (document.frm_display_data.elements[i].type == 'checkbox' && document.frm_display_data.elements[i].id !='chk_all') 
			    {		        		    
		        	document.frm_display_data.elements[i].checked = document.frm_display_data.elements['chk_all'].checked; 
		        }

	    	}
}





function delete_confirm(lang) {
	if(lang=='en')
	 return confirm('This Row Will Deleted, Are you sure Continue?'); 
	else if(lang=='ar')
	return confirm('سوف يتم الحذف, هل متأكد انك تريد الاستمرار؟'); 
}

function delete_all_confirm(lang) {
	var there_are_checked=false;
	for (var i = 0; i < document.frm_display_data.elements.length; i++ ) 
    {
        if (document.frm_display_data.elements[i].type == 'checkbox' && document.frm_display_data.elements[i].id !='chk_all') 
	    {		        		    
        	if(document.frm_display_data.elements[i].checked)
        		{
        		there_are_checked=true;
        		break;
        		}
        }
	}
	
	if(there_are_checked)
		{
			if(lang=='en')
			 return confirm('This row will deleted, Are you sure continue?'); 
			else if(lang=='ar')
			return confirm('سوف يتم الحذف, هل متأكد انك تريد الاستمرار؟');
		}
	else
		{
			if(lang=='en')
				{
					 alert('Please select row or some rows you want delete.');
					 return false;
				}
			 else if(lang=='ar')
				 {
				 	 alert('من فضلك اختار الصف او الصفوف التى تريد حذفها.');
				 	return false;
				 }
		}
}

function validate_login() {
	var error=0;
	 if (document.getElementById('username').value.replace(/^\s+|\s+$/g, '')=="" || document.getElementById('username').value.length<4)
	 {
		 show('dv_username_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_username_false');
	 }
	 
	 if (document.getElementById('password').value.replace(/^\s+|\s+$/g, '')=="" || document.getElementById('password').value.length<5)
	 {
		 show('dv_password_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_password_false');
	 }
	 
	 
	 if(error>0)
	 {
		 return false;
	 }
	 return true;
	
}

function validate_form(lang) {

	var error=0;
	 if (document.getElementById('username').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_username_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_username_false');
	 }
	 
	 if (document.getElementById('password').value.replace(/^\s+|\s+$/g, '')=="" || document.getElementById('password').value.length<5)
	 {
		 show('dv_password_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_password_false');
	 }
	 
	 if (document.getElementById('password').value!=document.getElementById('password_confirm').value)
	 {
		 show('dv_password_confirm_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_password_confirm_false');
	 }
	 
	 if (document.getElementById('name').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_name_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_name_false');
	 }
	 
	 if (document.getElementById('mobile').value.replace(/^\s+|\s+$/g, '')!="")
	 {
		 var regexObj = /^\d+$/;
		 if (regexObj.test(document.getElementById('mobile').value)==false) 
		 {
			 show('dv_mobile_false');
			 error=error+1;
		 }
		 else
		 {
			 hide('dv_mobile_false');
		 }
	 }
	 else
	 {
		 hide('dv_mobile_false');
	 }
	 
	 if (document.getElementById('telephone').value.replace(/^\s+|\s+$/g, '')!="")
	 {
		 var regexObj = /^\d+$/;
		 if (regexObj.test(document.getElementById('telephone').value)==false) 
		 {
			 show('dv_telephone_false');
			 error=error+1;
		 }
		 else
		 {
			 hide('dv_telephone_false');
		 }
	 }
	 else
	 {
		 hide('dv_telephone_false');
	 }
	 
	 if (document.getElementById('email').value.replace(/^\s+|\s+$/g, '')!="")
	 {
		 var regexObj = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		 if (regexObj.test(document.getElementById('email').value)==false) 
		 {
			 show('dv_email_false');
			 error=error+1;
		 }
		 else
		 {
			 hide('dv_email_false');
		 }
	 }
	 else
	 {
		 hide('dv_email_false');
	 }
	 
	 
	 if (document.getElementById('user_group_id').value==0)
	 {
		 show('dv_user_group_false');
		 document.getElementById('user_group_id').focus();
		 error=error+1;
	 } else {
		 hide('dv_user_group_false');
	 }
	 /*
	 if (document.getElementById('hdn_user_rule').value==0)
	 {
		 show('dv_rule_false');
		 document.getElementById('user_rule').focus();
		 error=error+1;
	 }
	 */
	 if(error>0)
	 {
		 return false;
	 }
	 return true;
	
}


function sort(url)
{
  var strURL=url;
  var req = GetXmlHttpObject();
  if (req)
  {
    req.onreadystatechange = function()
    {
      if (req.readyState == 4) // only if "OK"
      {
        if (req.status == 200)
        {alert(req.responseText);
          document.getElementById('div_table_display_records').innerHTML=req.responseText;
        } else {
          alert("There was a problem while using XMLHTTP:\n" + req.statusText);
        }
      }
    };
    req.open("GET", strURL, true);
    req.send(null);
  }
  
}


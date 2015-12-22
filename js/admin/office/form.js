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


function validate_form(lang) {

	 var error=0;
	
	 if (document.getElementById('country_id').value==0)
	 {
		 show('dv_country_false');
		 document.getElementById('country_id').focus();
		 error=error+1;
	 } else {
		 hide('dv_country_false');
	 }
	 
	 if (document.getElementById('location').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_location_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_location_false');
	 }
	 
	 if (document.getElementById('location_ar').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_location_ar_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_location_ar_false');
	 }
	 
	//To validate the phones,mobiles,faxes, and emails.
	 for (var i = 0; i < document.frm_office_row.elements.length; i++ ) 
	 {
	 	if (document.frm_office_row.elements[i].type == 'text') 
	 	{		    
	 		if(document.frm_office_row.elements[i].style.background!='') 
	 		{
	 			error=error+1;
	 		}
	 	}
	 }
	 	 
	 if(error>0)
	 {
		 return false;
	 }
	 return true;
	
}
/*
function validate_email(email,input_id,div_message,error_message) 
{
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (!filter.test(email) && email.replace(/^\s+|\s+$/g, '')!='') 
	{	//FFB2B2 FF9999 More Red
		document.getElementById(input_id).style.background='#FFCCCC';
		document.getElementById(div_message).innerHTML=error_message;
    }
	else
	{
		document.getElementById(div_message).innerHTML='';
		document.getElementById(input_id).style.background='';
	}
}


function validate_phone(phone,input_id,div_message,error_message) 
{
	var filter = /^\d+$/;
	if (!filter.test(phone) && phone.replace(/^\s+|\s+$/g, '')!='') 
	{	
		document.getElementById(input_id).style.background='#FFCCCC';
		document.getElementById(div_message).innerHTML=error_message;
    }
	else
	{
		document.getElementById(div_message).innerHTML='';
		document.getElementById(input_id).style.background=''; 		
	}
}

function validate_mobile(mobile,input_id,div_message,error_message) 
{
	var filter = /^\d+$/;
	if (!filter.test(mobile) && mobile.replace(/^\s+|\s+$/g, '')!='') 
	{	
		document.getElementById(input_id).style.background='#FFCCCC';
		document.getElementById(div_message).innerHTML=error_message;
    }
	else
	{
		document.getElementById(div_message).innerHTML='';
		document.getElementById(input_id).style.background=''; 		
	}
}

function validate_fax(fax,input_id,div_message,error_message) 
{
	var filter = /^\d+$/;
	if (!filter.test(fax) && fax.replace(/^\s+|\s+$/g, '')!='') 
	{	
		document.getElementById(input_id).style.background='#FFCCCC';
		document.getElementById(div_message).innerHTML=error_message;
    }
	else
	{
		document.getElementById(div_message).innerHTML='';
		document.getElementById(input_id).style.background=''; 		
	}
}
*/
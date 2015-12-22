function submitform()
{
  document.frm_subscriber.submit();
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
	 if (document.getElementById('name').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 document.getElementById('name').className = "input_error";
		 error=error+1;
	 }
	 else
	 {
		 document.getElementById('name').className = "input_success";
		 
	 }
	 
	 if (document.getElementById('email').value.replace(/^\s+|\s+$/g, '')!="")
	 {
		 var regexObj = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		 if (regexObj.test(document.getElementById('email').value)==false) 
		 {
			 document.getElementById('email').className = "input_error";
			 //show('dv_email_false');
			 error=error+1;
		 }
		 else
		 {
			 document.getElementById('email').className = "input_success";
			 
			 //hide('dv_email_false');
		 }
	 }
	 else
	 {
		 document.getElementById('email').className = "input_error";
		 
		 //show('dv_email_false');
		 error=error+1;
	 }
	 	 
	 if(error>0)
	 {
		 return false;
	 }
	 return true;
	
}





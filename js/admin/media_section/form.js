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
	 if (document.getElementById('alias').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_alias_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_alias_false');
	 }
	 
	 if (document.getElementById('title').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_title_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_title_false');
	 }
	 
	 if (document.getElementById('title_ar').value.replace(/^\s+|\s+$/g, '')=="")
	 {
		 show('dv_title_ar_false');
		 error=error+1;
	 }
	 else
	 {
		 hide('dv_title_ar_false');
	 }
	 
	 if (document.getElementById('media_section_category_id').value==0)
	 {
		 show('dv_media_section_category_id_false');
		 document.getElementById('media_section_category_id').focus();
		 error=error+1;
	 } else {
		 hide('dv_media_section_category_id_false');
	 }	 
	 
	 
	 if(error>0)
	 {
		 return false;
	 }
	 return true;
	
}





function submitform()
{
  document.frm_client_profile.submit();
}
function submitLoginForm()
{
  document.frm_client_login.submit();
}
function submitForgetPasswordForm()
{
  document.frm_client_forget_password.submit();
}

function show(id) 
{
	document.getElementById(id).style.display = 'block';
} 
function hide(id) 
{
	document.getElementById(id).style.display = 'none';
}

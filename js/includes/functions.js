var xmlHttp;

function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	  {
	  // Firefox, Opera 8.0+, Safari
	  xmlHttp=new XMLHttpRequest();
	  }
	catch (e)
	  {
	  // Internet Explorer
	  try
	    {
	    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	    }
	  catch (e)
	    {
	    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	  }
	return xmlHttp;
}

////////////////////////////////////////////////////////////////////////


function set_menu(url)
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
        {
          document.getElementById('div_menu_script').innerHTML=req.responseText;
        } else {
          alert("There was a problem while using XMLHTTP:\n" + req.statusText);
        }
      }
    };
    req.open("GET", strURL, true);
    req.send(null);
  }
}




function echeck(str,lang) {

	var at="@";
	var dot=".";
	var lat=str.indexOf(at);
	var lstr=str.length;
	var ldot=str.indexOf(dot);
	
	
	var message='';
	 if(lang=='english')
		 message='The email invalid';
	 else
		 message='الايميل غير صحيح';
	
	
	if (str.indexOf(at)==-1){
	   alert(message);
	   return false;
	}

	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
	   alert(message);
	   return false;
	}

	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
	    alert(message);
	    return false;
	}

	 if (str.indexOf(at,(lat+1))!=-1){
	    alert(message);
	    return false;
	 }

	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
	    alert(message);
	    return false;
	 }

	 if (str.indexOf(dot,(lat+2))==-1){
	    alert(message);
	    return false;
	 }
	
	 if (str.indexOf(" ")!=-1){
	    alert(message);
	    return false;
	 }

	 return true;		
}
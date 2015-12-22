fShow="visible";
fHide="hidden";

var MonthNames = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
var nCurrentYear = 0;
var nCurrentMonth = 0;

var nWidth  = 26;
var nHeight = 26;

var leftX;
var rightX
var topY;
var bottomY;


function Calendar()
{

var HTMLstr = "";

HTMLstr += "<table width='182px' cellspacing='0' cellpadding='0' border='0'>\n";
HTMLstr += "<tr><td style=\"background:url('calendar_staff/calendar_header_bg.png') #1987b5 repeat-x top center; padding:0px; margin:0px;\">\n";
HTMLstr += "\n";
HTMLstr += "<table border='0' width='100%'>\n";
HTMLstr += "<tr>\n";
//HTMLstr += "<td><b><font color='white'>Year:</font></b></td>\n";
HTMLstr += "\n";

HTMLstr += "<td align='right' height='30' width=20>\n";
HTMLstr += "<a href=\"javascript:prevYear();\" style='text-decoration: none;'><font color='white' size=-2><<</font></a>\n";
HTMLstr += "</td>\n";

HTMLstr += "<td align='right' width=20>\n";
HTMLstr += "<a href=\"javascript:prevMonth();\" style='text-decoration: none;'><font color='white' size=-2><</font></a>\n";
HTMLstr += "</td>\n";

HTMLstr += "<td align='right'>\n";
HTMLstr += "<font id='main2' style='font-size:13px; font-family:Myriad Pro; font-weight:normal;'>";
HTMLstr += "<font color='#ffffff'><b>December</b></font>\n";
HTMLstr += "</font>\n";
HTMLstr += "</td>\n";

HTMLstr += "<td align='right'>\n";
HTMLstr += "<font id='main' style='font-size:13px; font-family:Myriad Pro; font-weight:normal;'>";
HTMLstr += "<font color='#ffffff'><b>1999</b></font>\n";
HTMLstr += "</font>\n";
HTMLstr += "</td>\n";


HTMLstr += "<td align='right' width=20>\n";
HTMLstr += "<a href=\"javascript:nextMonth();\" style='text-decoration: none;'><font color='white' size=-2>></font></a>\n";
HTMLstr += "</td>\n";




HTMLstr += "<td align='right' width=20>\n";
HTMLstr += "<a href=\"javascript:nextYear();\" style='text-decoration: none;'><font color='white' size=-2>>></font></a>\n";
HTMLstr += "</td>\n";




HTMLstr += "</tr>\n";
HTMLstr += "</table>\n";
HTMLstr += "\n";
HTMLstr += "</td></tr>\n";
HTMLstr += "\n";
HTMLstr += "<tr height='160px'><td valign=\"top\">\n";
HTMLstr += "\n";
HTMLstr += "<table border=0 cellpadding=0 cellspacing=0 cols=7 style='font-size:10px; font-family:Myriad Pro; font-weight:normal; background-color:#1987b5; color:#ffffff;'>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td width='26' height=14 align=center><b>Mon</b></td>\n";
HTMLstr += "<td width='27' align=center><b>Tue</b></td>\n";
HTMLstr += "<td width='26' align=center><b>Wed</b></td>\n";
HTMLstr += "<td width='27' align=center><b>Thur</b></td>\n";
HTMLstr += "<td width='26' align=center><b>Fri</b></td>\n";
HTMLstr += "<td width='27' align=center><b>Sat</b></td>\n";
HTMLstr += "<td width='' align=center><b>Sun</b></td>\n";
HTMLstr += "</tr>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td colspan=7>\n";

HTMLstr += "<div style='position: relative; height:140px; width:184px; background-color:#ebebeb;'>";


  for (var date=1; date <= 31; date++)
  {

	HTMLstr += "  <div id=\"idDate"+date+"\" val="+date+" style=\"position: absolute; visibility: hidden; border:1px solid #e1dcd3; style='text-align:left; width:"+(nWidth-9)+"px; height:"+(nHeight-9)+"px;'\">\n";
	// HTMLstr += "    <b>"+date+"</b>\n";
	HTMLstr += "    <b>"+date+"</b>\n";
	HTMLstr += "  </div>\n";
  }

HTMLstr += "</div>";

HTMLstr += "</td></tr>\n";
HTMLstr += "</table>\n";
HTMLstr += "\n";
HTMLstr += "</td></tr>\n";
HTMLstr += "</table>\n";

document.writeln(HTMLstr);
buildMonthMenu(HTMLstr);
}


function setCurrentMonth()
{
  date = new Date();
  currentyear=date.getYear()
  if (currentyear < 1000)
  currentyear+=1900
  setYearMonth(currentyear, date.getMonth()+1);
}

function setMonth(nMonth)
{
	setYearMonth(nCurrentYear, nMonth);
}

function setYearMonth(nYear, nMonth)
{
  nCurrentYear = nYear;
  nCurrentMonth = nMonth;
  var cross_obj= document.getElementById("main");
  var cross_obj2= document.getElementById("main2");
  cross_obj.innerHTML  = "<font color=\"#ffffff\"><b>"+nCurrentYear+"</b></font>";
  cross_obj2.innerHTML = "<a href=\"javascript:showMonthMenu()\" style=\"text-decoration:none\"><font color=\"#ffffff\"><b>"+MonthNames[nCurrentMonth-1]+"</b></font></a>\n";

  var date   = new Date(nCurrentYear, nCurrentMonth-1, 1);
  var nWeek  = 1;
  var nDate;

  while (date.getMonth() == nCurrentMonth-1)
  {
	nDate = date.getDate();
	nLastDate = nDate;

	var posDay = date.getDay()-1;
	if (posDay == -1) posDay=6;
	var posLeft = posDay*(nWidth);
	var posTop  = (nWeek-1)*nHeight;
        var cross_obj3= document.getElementById("idDate"+nDate).style;
	cross_obj3.left = posLeft;
	cross_obj3.top  = posTop;
	
	day_object = document.getElementById("idDate"+nDate); //.style.border='1px solid #ff0000'; //********************
	//alert(nCurrentYear+"-"+nCurrentMonth+"-"+date.getDate());
	day_object.innerHTML = "<div style='text-align:left; width:"+(nWidth)+"px; height:"+(nHeight-1)+"px; padding:0px; margin:0px; border:0px;'><font style='padding:5px; color:#1887b5'>"+date.getDate()+"</font></div>";
	
	for(i=0; i<arr_events.length; i++)
	{
		the_day = (date.getDate() > 9)? date.getDate() : "0"+date.getDate();
		the_month = (nCurrentMonth > 9)? nCurrentMonth : "0"+nCurrentMonth;
		the_date = nCurrentYear+"-"+the_month+"-"+the_day;
		//alert(the_date);
		if(arr_events[i][0] == the_date)
		{
			day_object.innerHTML = "<div style='text-align:left; width:"+(nWidth)+"px; height:"+(nHeight-1)+"px; padding:0px; margin:0px; border:0px; background-color:#1887b5;' onclick=\"//alert('"+arr_events[i][1]+"');\"><font style='padding:5px; color:#ffffff;'>"+date.getDate()+"</font></div>";
			break;
		}
	}
	
	//if (date.getDay() == 0 || date.getDay() == 6)
	//{
	//	cross_obj3.color  = "green";
	//}
	//else
		cross_obj3.color  = "black";
	cross_obj3.visibility = "visible";
	// original:
	// date = new Date(currentyear, date.getMonth(), date.getDate()+1);
	// johan:
	date = new Date(nCurrentYear, date.getMonth(), date.getDate()+1);
	
	if (posDay == 6) nWeek++;
  }
  for (++nDate; nDate <= 31; nDate++){
        cross_obj3= document.getElementById("idDate"+nDate).style;
	cross_obj3.visibility = "hidden";
      }

}

function nextMonth()
{
  nCurrentMonth++;
  if (nCurrentMonth > 12)
  {
	nCurrentMonth -= 12;
	nextYear();
  }
  
  setYearMonth(nCurrentYear, nCurrentMonth);
}


function prevMonth()
{
  nCurrentMonth--;
  if (nCurrentMonth < 1)
  {
	nCurrentMonth += 12;
	prevYear();
  }
  setYearMonth(nCurrentYear, nCurrentMonth);

}

function prevYear()
{
  nCurrentYear--;
  setYearMonth(nCurrentYear, nCurrentMonth);
}

function nextYear()
{
  nCurrentYear++;
  setYearMonth(nCurrentYear, nCurrentMonth);
}

////////////////////////////////////////////////////

function updateIt(e)
{
//  var x = e.pageX;
//  var y = e.pageY;

//  if (x > rightX || x < leftX) hideMonthMenu();
//  else if (y > bottomY || y < topY) hideMonthMenu();
}

function hideMonthMenu()
{
  //document.layers["idMonthMenu"].visibility="hide";
}

function showMonthMenu()
{
/*if (!n) return;
  topY    = document.layers["main2"].pageY-50;
  bottomY = document.layers["main2"].pageY + document.layers["idMonthMenu"].clip.height+50;
  leftX   = document.layers["main2"].pageX-50;
  rightX  = document.layers["main2"].pageX + document.layers["idMonthMenu"].clip.width+50;

  document.layers["idMonthMenu"].top = document.layers["main2"].pageY+document.layers["main2"].clip.height;
  document.layers["idMonthMenu"].left = document.layers["main2"].pageX;
  document.layers["idMonthMenu"].visibility="show";
*/
}

function buildMonthMenu()
{
	/*
if (!n) return;
  var HTML = "";
  HTML += "<table border=\"1\" cellspacing=\"0\" cellpading=\"0\">\n";
  for (var month=0; month<12;)
  {
	HTML += "<tr>\n";
	for (var i = 0; i < 3; i++)
	{
		var nMonth = month+1;
		HTML += "<td><a href=\"javascript:hideMonthMenu();setMonth("+nMonth+");\"><font color=\"white\" size=-1><b>"+MonthNames[month]+"</b></font></a></td>\n";
		month++;
	}
	HTML += "</tr>\n";
  }
  HTML += "</table>";
  document.writeln(HTML);
  */
}

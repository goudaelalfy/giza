function gmod(n,m){
	return ((n%m)+m)%m;
}

function kuwaiticalendar(adjust){
	var today = new Date();
	if(adjust) {
		adjustmili = 1000*60*60*24*adjust;
		todaymili = today.getTime()+adjustmili;
		today = new Date(todaymili);
	}
	day = today.getDate();
	month = today.getMonth();
	year = today.getFullYear();
	m = month+1;
	y = year;
	if(m<3) {
		y -= 1;
		m += 12;
	}

	a = Math.floor(y/100.);
	b = 2-a+Math.floor(a/4.);
	if(y<1583) b = 0;
	if(y==1582) {
		if(m>10)  b = -10;
		if(m==10) {
			b = 0;
			if(day>4) b = -10;
		}
	}

	jd = Math.floor(365.25*(y+4716))+Math.floor(30.6001*(m+1))+day+b-1524;

	b = 0;
	if(jd>2299160){
		a = Math.floor((jd-1867216.25)/36524.25);
		b = 1+a-Math.floor(a/4.);
	}
	bb = jd+b+1524;
	cc = Math.floor((bb-122.1)/365.25);
	dd = Math.floor(365.25*cc);
	ee = Math.floor((bb-dd)/30.6001);
	day =(bb-dd)-Math.floor(30.6001*ee);
	month = ee-1;
	if(ee>13) {
		cc += 1;
		month = ee-13;
	}
	year = cc-4716;

	if(adjust) {
		wd = gmod(jd+1-adjust,7)+1;
	} else {
		wd = gmod(jd+1,7)+1;
	}

	iyear = 10631./30.;
	epochastro = 1948084;
	epochcivil = 1948085;

	shift1 = 8.01/60.;

	z = jd-epochastro;
	cyc = Math.floor(z/10631.);
	z = z-10631*cyc;
	j = Math.floor((z-shift1)/iyear);
	iy = 30*cyc+j;
	z = z-Math.floor(j*iyear+shift1);
	im = Math.floor((z+28.5001)/29.5);
	if(im==13) im = 12;
	id = z-Math.floor(29.5001*im-29);

	var myRes = new Array(8);

	myRes[0] = day; //calculated day (CE)
	myRes[1] = month-1; //calculated month (CE)
	myRes[2] = year; //calculated year (CE)
	myRes[3] = jd-1; //julian day number
	myRes[4] = wd-1; //weekday number
	myRes[5] = id; //islamic date
	myRes[6] = im-1; //islamic month
	myRes[7] = iy; //islamic year

	return myRes;
}
function writeIslamicDate(adjustment) {
	var wdNames = new Array("Ahad","Ithnin","Thulatha","Arbaa","Khams","Jumuah","Sabt");
	var iMonthNames = new Array("محرم","صفر","ربيع أول","ربيع ثاني",
	"جمادي الأول","جمادي الثاني","رجب","شعبان",
	"رمضان","شوال","ذو القعدة","ذو الحجة");
	var iDate = kuwaiticalendar(adjustment);
	var outputIslamicDate = iDate[5] + " " + iMonthNames[iDate[6]] + " " + iDate[7] + " هجري";
	return outputIslamicDate;
}
function GetDate(ID, Type, Write){
	/*var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");*/
	var dayarray = new Array("الأحد", "الأثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت");
	/*var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");*/
	var montharray = new Array("يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر");
	var mydate = new Date();
	var year = mydate.getYear();
	if (year < 1000) {
		year += 1900;
	}
	var day = mydate.getDay();
	var month = mydate.getMonth();
	var daym = mydate.getDate();
	if (daym < 10) {
		daym = "0" + daym;
	}
	var hours = mydate.getHours();
	var minutes = mydate.getMinutes();
	var seconds = mydate.getSeconds();
	//var dn = "AM";
	var dn = "صباحاً";
	if(hours >= 12){
		//dn = "PM";
		dn = "مساءً";
	}
	if(hours > 12){
		hours = hours - 12;
	}
	if(hours == 0){
		hours = 12;
	}
	if(hours <= 9){
		hours = "0" + hours;
	}
	if(minutes <= 9) {
		minutes = "0" + minutes;
	}
	if(seconds <= 9){
		seconds = "0" + seconds;
	}
	var cdate = '<span>' + dayarray[day] + " " + daym+ " / " + montharray[month] + " / " + year + '</span>';
	var ctime = '<span>' + minutes + " : " + hours + " " + dn + "</span>";
	var hijD = '<span class="hijri">' + writeIslamicDate(false) + '</span>';
	var date_data;
	if(Type == 'date'){
		date_data = cdate;
	}else if(Type == 'time'){
		date_data = ctime;
	}else if(Type == 'date_time'){
		date_data = cdate + ' - ' + ctime;
	}else if(Type == 'date_islamic'){
		date_data = cdate + ' - ' + hijD;
	}
	if(!Write){
		$(ID).html(date_data);
	}else{
		return date_data;
	}
}
function GetDateInfo(ID, Type, Write){
	if(!Write){
		GetDate(ID, Type, false);
	}else{
		document.write(GetDate(ID, Type, true));
	}
	setInterval(function(){
		GetDate(ID, Type, false);
	}, 30000);

}
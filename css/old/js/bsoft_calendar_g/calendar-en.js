// $Id: calendar-en.js 6573 2007-03-09 08:36:16Z slip $

// ** I18N



// Calendar EN language

// Author: Mihai Bazon, <mihai_bazon@yahoo.com>

// Encoding: any

// Distributed under the same terms as the calendar itself.



// For translators: please use UTF-8 if possible.  We strongly believe that

// Unicode is the answer to a real internationalized world.  Also please

// include your contact information in the header, as can be seen above.



// full day names

BSoft.Calendar._DN = new Array

("Sunday",

 "Monday",

 "Tuesday",

 "Wednesday",

 "Thursday",

 "Friday",

 "Saturday",

 "Sunday");



// Please note that the following array of short day names (and the same goes

// for short month names, _SMN) isn't absolutely necessary.  We give it here

// for exemplification on how one can customize the short day names, but if

// they are simply the first N letters of the full name you can simply say:

//

//   BSoft.Calendar._SDN_len = N; // short day name length

//   BSoft.Calendar._SMN_len = N; // short month name length

//

// If N = 3 then this is not needed either since we assume a value of 3 if not

// present, to be compatible with translation files that were written before

// this feature.



// short day names

BSoft.Calendar._SDN = new Array

("Sun",

 "Mon",

 "Tue",

 "Wed",

 "Thu",

 "Fri",

 "Sat",

 "Sun");



// First day of the week. "0" means display Sunday first, "1" means display

// Monday first, etc.

BSoft.Calendar._FD = 0;



// full month names

BSoft.Calendar._MN = new Array

("January",

 "February",

 "March",

 "April",

 "May",

 "June",

 "July",

 "August",

 "September",

 "October",

 "November",

 "December");



// short month names

BSoft.Calendar._SMN = new Array

("Jan",

 "Feb",

 "Mar",

 "Apr",

 "May",

 "Jun",

 "Jul",

 "Aug",

 "Sep",

 "Oct",

 "Nov",

 "Dec");



// tooltips

BSoft.Calendar._TT_en = BSoft.Calendar._TT = {};

BSoft.Calendar._TT["INFO"] = "About the calendar";



BSoft.Calendar._TT["ABOUT"] =

"DHTML Date/Time Selector\n" +

"(c) bsoft.com 2002-2007\n" + // don't translate this this ;-)

"For latest version visit: http://www.bsoft.com/\n" +

"\n\n" +

"Date selection:\n" +

"- Use the \xab, \xbb buttons to select year\n" +

"- Use the " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " buttons to select month\n" +

"- Hold mouse button on any of the above buttons for faster selection.";

BSoft.Calendar._TT["ABOUT_TIME"] = "\n\n" +

"Time selection:\n" +

"- Click on any of the time parts to increase it\n" +

"- or Shift-click to decrease it\n" +

"- or click and drag for faster selection.";



BSoft.Calendar._TT["PREV_YEAR"] = "Prev. year (hold for menu)";

BSoft.Calendar._TT["PREV_MONTH"] = "Prev. month (hold for menu)";

BSoft.Calendar._TT["GO_TODAY"] = "Go Today (hold for history)";

BSoft.Calendar._TT["NEXT_MONTH"] = "Next month (hold for menu)";

BSoft.Calendar._TT["NEXT_YEAR"] = "Next year (hold for menu)";

BSoft.Calendar._TT["SEL_DATE"] = "Select date";

BSoft.Calendar._TT["DRAG_TO_MOVE"] = "Drag to move";

BSoft.Calendar._TT["PART_TODAY"] = " (today)";



// the following is to inform that "%s" is to be the first day of week

// %s will be replaced with the day name.

BSoft.Calendar._TT["DAY_FIRST"] = "Display %s first";



// This may be locale-dependent.  It specifies the week-end days, as an array

// of comma-separated numbers.  The numbers are from 0 to 6: 0 means Sunday, 1

// means Monday, etc.

BSoft.Calendar._TT["WEEKEND"] = "0,6";



BSoft.Calendar._TT["CLOSE"] = "Close";

BSoft.Calendar._TT["TODAY"] = "Today";

BSoft.Calendar._TT["TIME_PART"] = "(Shift-)Click or drag to change value";



// date formats

BSoft.Calendar._TT["DEF_DATE_FORMAT"] = "%d-%m-%Y";

BSoft.Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";



BSoft.Calendar._TT["WK"] = "wk";

BSoft.Calendar._TT["TIME"] = "Time:";



BSoft.Calendar._TT["E_RANGE"] = "Outside the range";



BSoft.Calendar._TT._AMPM = {am : "am", pm : "pm"};



/* Preserve data */

	if(BSoft.Calendar._DN) BSoft.Calendar._TT._DN = BSoft.Calendar._DN;

	if(BSoft.Calendar._SDN) BSoft.Calendar._TT._SDN = BSoft.Calendar._SDN;

	if(BSoft.Calendar._SDN_len) BSoft.Calendar._TT._SDN_len = BSoft.Calendar._SDN_len;

	if(BSoft.Calendar._MN) BSoft.Calendar._TT._MN = BSoft.Calendar._MN;

	if(BSoft.Calendar._SMN) BSoft.Calendar._TT._SMN = BSoft.Calendar._SMN;

	if(BSoft.Calendar._SMN_len) BSoft.Calendar._TT._SMN_len = BSoft.Calendar._SMN_len;

	BSoft.Calendar._DN = BSoft.Calendar._SDN = BSoft.Calendar._SDN_len = BSoft.Calendar._MN = BSoft.Calendar._SMN = BSoft.Calendar._SMN_len = null


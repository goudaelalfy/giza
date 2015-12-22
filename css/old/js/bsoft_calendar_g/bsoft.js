/*
 *
 * Copyright (c) 2004-2005 by BSoft, Inc.
 * http://www.bsoft.com
 * 1700 MLK Way, Berkeley, California,
 * 94709, U.S.A.
 * All rights reserved.
 *
 *
 */
if(typeof BSoft=='undefined')
{
	BSoft=function(){};
}

BSoft.version='07-01';
if(typeof BSoft.bsoftPath=='undefined')
{
	BSoft.bsoftPath=function()
	{
		if(document.documentElement)
		{
			var aTokens=document.documentElement.innerHTML.match(/<script[^>]+src="([^"]*bsoft(-core|-src)?.js[^"]*)"/i);
			if(aTokens&&aTokens.length>=2)
			{
				aTokens=aTokens[1].split('?');
				aTokens=aTokens[0].split('/');
				if(Array.prototype.pop)
				{
					aTokens.pop();
				}
				else
				{
					aTokens.length-=1;
				}
				return aTokens.length?aTokens.join('/')+'/':'';
			}
		}
		return'';
	}();
}
if(typeof BSoft=='undefined'){BSoft=function(){};}
BSoft.Utils={};BSoft.Utils.getAbsolutePos=function(el,scrollOff){var SL=0,ST=0;if(!scrollOff){var is_div=/^div$/i.test(el.tagName);if(is_div&&el.scrollLeft)
SL=el.scrollLeft;if(is_div&&el.scrollTop)
ST=el.scrollTop;}
var r={x:el.offsetLeft-SL,y:el.offsetTop-ST};if(el.offsetParent){var tmp=this.getAbsolutePos(el.offsetParent);r.x+=tmp.x;r.y+=tmp.y;}
return r;};BSoft.Utils.getElementOffset=function(oEl){var iLeft=iTop=iWidth=iHeight=0;var sTag;if(oEl.getBoundingClientRect){var oRect=oEl.getBoundingClientRect();iLeft=oRect.left;iTop=oRect.top;iWidth=oRect.right-iLeft;iHeight=oRect.bottom-iTop;iLeft+=BSoft.Utils.getPageScrollX()-2;iTop+=BSoft.Utils.getPageScrollY()-2;}else{iWidth=oEl.offsetWidth;iHeight=oEl.offsetHeight;var sPos=BSoft.Utils.getStyleProperty(oEl,'position');if(sPos=='fixed'){iLeft=oEl.offsetLeft+BSoft.Utils.getPageScrollX();iTop=oEl.offsetTop+BSoft.Utils.getPageScrollY();}else if(sPos=='absolute'){while(oEl){sTag=oEl.tagName;if(sTag){sTag=sTag.toLowerCase();if(sTag!='body'&&sTag!='html'){iLeft+=parseInt(oEl.offsetLeft,10)||0;iTop+=parseInt(oEl.offsetTop,10)||0;}}
oEl=oEl.offsetParent;sTag=oEl?oEl.tagName:null;if(sTag){sTag=sTag.toLowerCase();if(sTag!='body'&&sTag!='html'){iLeft-=oEl.scrollLeft;iTop-=oEl.scrollTop;}}}}else{var bMoz=(BSoft.is_gecko&&!BSoft.is_khtml);var fStyle=BSoft.Utils.getStyleProperty;var oP=oEl;while(oP){if(bMoz){sTag=oP.tagName;if(sTag){sTag=sTag.toLowerCase();if(sTag=='body'&&!(fStyle(oP,'-moz-box-sizing')=='border-box')){iLeft+=parseInt(fStyle(oP,'border-left-width'));iTop+=parseInt(fStyle(oP,'border-top-width'));}}}
iLeft+=parseInt(oP.offsetLeft,10)||0;iTop+=parseInt(oP.offsetTop,10)||0;oP=oP.offsetParent;}
oP=oEl;while(oP.parentNode){oP=oP.parentNode;sTag=oP.tagName;if(sTag){sTag=sTag.toLowerCase();if(sTag!='body'&&sTag!='html'&&sTag!='tr'){iLeft-=oP.scrollLeft;iTop-=oP.scrollTop;}}}}}
return{left:iLeft,top:iTop,x:iLeft,y:iTop,width:iWidth,height:iHeight};};BSoft.Utils.getElementOffsetScrollable=function(oEl){var oPos=BSoft.Utils.getElementOffset(oEl);if(oEl.scrollLeft){oPos.left-=oEl.scrollLeft;oPos.x=oPos.left;}
if(oEl.scrollTop){oPos.top-=oEl.scrollTop;oPos.y=oPos.top;}
return oPos;};BSoft.Utils.fixBoxPosition=function(box,leave){var screenX=BSoft.Utils.getPageScrollX();var screenY=BSoft.Utils.getPageScrollY();var sizes=BSoft.Utils.getWindowSize();leave=parseInt(leave,10)||0;if(box.x<screenX){box.x=screenX+leave;}
if(box.y<screenY){box.y=screenY+leave;}
if(box.x+box.width>screenX+sizes.width){box.x=screenX+sizes.width-box.width-leave;}
if(box.y+box.height>screenY+sizes.height){box.y=screenY+sizes.height-box.height-leave;}};BSoft.Utils.isRelated=function(el,evt){evt||(evt=window.event);var related=evt.relatedTarget;if(!related){var type=evt.type;if(type=="mouseover"){related=evt.fromElement;}else if(type=="mouseout"){related=evt.toElement;}}
try{while(related){if(related==el){return true;}
related=related.parentNode;}}catch(e){};return false;};BSoft.Utils.removeClass=function(el,className){if(!(el&&el.className)){return;}
var cls=el.className.split(" ");var ar=[];for(var i=cls.length;i>0;){if(cls[--i]!=className){ar[ar.length]=cls[i];}}
el.className=ar.join(" ");};BSoft.Utils.addClass=function(el,className){BSoft.Utils.removeClass(el,className);el.className+=" "+className;};BSoft.Utils.replaceClass=function(el,className,withClassName){if(!BSoft.isHtmlElement(el)||!className){return false;}
el.className.replace(className,withClassName);};BSoft.Utils.getElement=function(ev){if(BSoft.is_ie){return window.event.srcElement;}else{return ev.currentTarget;}};BSoft.Utils.getTargetElement=function(ev){if(BSoft.is_ie){return window.event.srcElement;}else{return ev.target;}};BSoft.Utils.getMousePos=function(oEv){oEv||(oEv=window.event);var oPos={pageX:0,pageY:0,clientX:0,clientY:0};if(oEv){var bIsPageX=(typeof oEv.pageX!='undefined');var bIsClientX=(typeof oEv.clientX!='undefined');if(bIsPageX||bIsClientX){if(bIsPageX){oPos.pageX=oEv.pageX;oPos.pageY=oEv.pageY;}else{oPos.pageX=oEv.clientX+BSoft.Utils.getPageScrollX();oPos.pageY=oEv.clientY+BSoft.Utils.getPageScrollY();}
if(bIsClientX){oPos.clientX=oEv.clientX;oPos.clientY=oEv.clientY;}else{oPos.clientX=oEv.pageX-BSoft.Utils.getPageScrollX();oPos.clientY=oEv.pageY-BSoft.Utils.getPageScrollY();}}}
return oPos;};BSoft.Utils.stopEvent=function(ev){ev||(ev=window.event);if(ev){if(BSoft.is_ie){ev.cancelBubble=true;ev.returnValue=false;}else{ev.preventDefault();ev.stopPropagation();}}
return false;};BSoft.Utils.removeOnUnload=[];BSoft.Utils.addEvent=function(oElement,sEvent,fListener,bUseCapture){if(oElement.addEventListener){if(!bUseCapture){bUseCapture=false;}
oElement.addEventListener(sEvent,fListener,bUseCapture);}else if(oElement.attachEvent){oElement.detachEvent('on'+sEvent,fListener);oElement.attachEvent('on'+sEvent,fListener);if(bUseCapture){oElement.setCapture(false);}}
BSoft.Utils.removeOnUnload.push({'element':oElement,'event':sEvent,'listener':fListener,'capture':bUseCapture});};BSoft.Utils.removeEvent=function(oElement,sEvent,fListener,bUseCapture){if(oElement.removeEventListener){oElement.removeEventListener(sEvent,fListener,bUseCapture);}else if(oElement.detachEvent){oElement.detachEvent('on'+sEvent,fListener);}
for(var iLis=BSoft.Utils.removeOnUnload.length-1;iLis>=0;iLis--){var oParams=BSoft.Utils.removeOnUnload[iLis];if(!oParams){continue;}
if(oElement==oParams['element']&&sEvent==oParams['event']&&fListener==oParams['listener']&&bUseCapture==oParams['capture']){BSoft.Utils.removeOnUnload[iLis]=null;BSoft.Utils.removeEvent(oParams['element'],oParams['event'],oParams['listener'],oParams['capture']);}}};BSoft.Utils.createElement=function(type,parent,selectable){var el=null;if(document.createElementNS)
el=document.createElementNS("http://www.w3.org/1999/xhtml",type);else
el=document.createElement(type);if(typeof parent!="undefined"&&parent!=null)
parent.appendChild(el);if(!selectable){if(BSoft.is_ie)
el.setAttribute("unselectable",true);if(BSoft.is_gecko)
el.style.setProperty("-moz-user-select","none","");}
return el;};BSoft.Utils.writeCookie=function(name,value,domain,path,exp_days){value=escape(value);var ck=name+"="+value,exp;if(domain)
ck+=";domain="+domain;if(path)
ck+=";path="+path;if(exp_days){exp=new Date();exp.setTime(exp_days*86400000+exp.getTime());ck+=";expires="+exp.toGMTString();}
document.cookie=ck;};BSoft.Utils.getCookie=function(name){var pattern=name+"=";var tokenPos=0;while(tokenPos<document.cookie.length){var valuePos=tokenPos+pattern.length;if(document.cookie.substring(tokenPos,valuePos)==pattern){var endValuePos=document.cookie.indexOf(";",valuePos);if(endValuePos==-1){endValuePos=document.cookie.length;}
return unescape(document.cookie.substring(valuePos,endValuePos));}
tokenPos=document.cookie.indexOf(" ",tokenPos)+1;if(tokenPos==0){break;}}
return null;};BSoft.Utils.makePref=function(obj){function stringify(val){if(typeof val=="object"&&!val)
return"null";else if(typeof val=="number"||typeof val=="boolean")
return val;else if(typeof val=="string")
return'"'+val.replace(/\x22/,"\\22")+'"';else return null;};var txt="",i;for(i in obj)
txt+=(txt?",'":"'")+i+"':"+stringify(obj[i]);return txt;};BSoft.Utils.loadPref=function(txt){var obj=null;try{eval("obj={"+txt+"}");}catch(e){}
return obj;};BSoft.Utils.mergeObjects=function(dest,src){for(var i in src)
dest[i]=src[i];};BSoft.Utils.__wch_id=0;BSoft.Utils.createWCH=function(oEl){if(!BSoft.is_ie||BSoft.is_ie5||BSoft.is_ie7){return null;}
var sId='WCH'+(++BSoft.Utils.__wch_id);var sIframe=['<iframe id="',sId,'" scrolling="no" frameborder="0" style="z-index:0;position:absolute;visibility:hidden;filter:progid:DXImageTransform.Microsoft.alpha(style=0,opacity=0);border:0;top:0;left:0;width:0;height:0" src="javascript:false"></iframe>'].join('')
if(!oEl){oEl=document.body;}
if(BSoft.windowLoaded){oEl.insertAdjacentHTML('beforeEnd',sIframe);}else{BSoft.Utils.addEvent(window,'load',function(){oEl.insertAdjacentHTML('beforeEnd',sIframe);oEl=null;});}
return document.getElementById(sId);};BSoft.Utils.setupWCH_el=function(f,el,el2){if(f){var pos=BSoft.Utils.getAbsolutePos(el),X1=pos.x,Y1=pos.y,X2=X1+el.offsetWidth,Y2=Y1+el.offsetHeight;if(el2){var p2=BSoft.Utils.getAbsolutePos(el2),XX1=p2.x,YY1=p2.y,XX2=XX1+el2.offsetWidth,YY2=YY1+el2.offsetHeight;if(X1>XX1)
X1=XX1;if(Y1>YY1)
Y1=YY1;if(X2<XX2)
X2=XX2;if(Y2<YY2)
Y2=YY2;}
BSoft.Utils.setupWCH(f,X1,Y1,X2-X1,Y2-Y1);}};BSoft.Utils.setupWCH=function(f,x,y,w,h){if(f){var s=f.style;(typeof x!="undefined")&&(s.left=x+"px");(typeof y!="undefined")&&(s.top=y+"px");(typeof w!="undefined")&&(s.width=w+"px");(typeof h!="undefined")&&(s.height=h+"px");s.visibility="inherit";}};BSoft.Utils.hideWCH=function(f){if(f)
f.style.visibility="hidden";};BSoft.Utils.getPageScrollY=function(){if(window.pageYOffset){return window.pageYOffset;}else if(document.body&&document.body.scrollTop){return document.body.scrollTop;}else if(document.documentElement&&document.documentElement.scrollTop){return document.documentElement.scrollTop;}
return 0;};BSoft.Utils.getPageScrollX=function(){if(window.pageXOffset){return window.pageXOffset;}else if(document.body&&document.body.scrollLeft){return document.body.scrollLeft;}else if(document.documentElement&&document.documentElement.scrollLeft){return document.documentElement.scrollLeft;}
return 0;};BSoft.ScrollWithWindow={};BSoft.ScrollWithWindow.list=[];BSoft.ScrollWithWindow.stickiness=0.25;BSoft.ScrollWithWindow.register=function(oElement){var iTop=oElement.offsetTop||0;var iLeft=oElement.offsetLeft||0;BSoft.ScrollWithWindow.list.push({node:oElement,origTop:iTop,origLeft:iLeft});if(!BSoft.ScrollWithWindow.interval){BSoft.ScrollWithWindow.on();}};BSoft.ScrollWithWindow.unregister=function(oElement){for(var iItem=0;iItem<BSoft.ScrollWithWindow.list.length;iItem++){var oItem=BSoft.ScrollWithWindow.list[iItem];if(oElement==oItem.node){BSoft.ScrollWithWindow.list.splice(iItem,1);if(!BSoft.ScrollWithWindow.list.length){BSoft.ScrollWithWindow.off();}
return;}}};BSoft.ScrollWithWindow.moveTop=function(iTop){BSoft.ScrollWithWindow.top+=(iTop-BSoft.ScrollWithWindow.top)*BSoft.ScrollWithWindow.stickiness;if(Math.abs(BSoft.ScrollWithWindow.top-iTop)<=1){BSoft.ScrollWithWindow.top=iTop;}
for(var iItem=0;iItem<BSoft.ScrollWithWindow.list.length;iItem++){var oItem=BSoft.ScrollWithWindow.list[iItem];var oElement=oItem.node;oElement.style.position='absolute';if(!oItem.origTop&&oItem.origTop!==0){oItem.origTop=parseInt(oElement.style.top)||0;}
oElement.style.top=oItem.origTop+
parseInt(BSoft.ScrollWithWindow.top)+'px';}};BSoft.ScrollWithWindow.moveLeft=function(iLeft){BSoft.ScrollWithWindow.left+=(iLeft-BSoft.ScrollWithWindow.left)*BSoft.ScrollWithWindow.stickiness;if(Math.abs(BSoft.ScrollWithWindow.left-iLeft)<=1){BSoft.ScrollWithWindow.left=iLeft;}
for(var iItem=0;iItem<BSoft.ScrollWithWindow.list.length;iItem++){var oItem=BSoft.ScrollWithWindow.list[iItem];var oElement=oItem.node;oElement.style.position='absolute';if(!oItem.origLeft&&oItem.origLeft!==0){oItem.origLeft=parseInt(oElement.style.left)||0;}
oElement.style.left=oItem.origLeft+
parseInt(BSoft.ScrollWithWindow.left)+'px';}};BSoft.ScrollWithWindow.cycle=function(){var iTop=BSoft.Utils.getPageScrollY();var iLeft=BSoft.Utils.getPageScrollX();if(iTop!=BSoft.ScrollWithWindow.top){BSoft.ScrollWithWindow.moveTop(iTop);}
if(iLeft!=BSoft.ScrollWithWindow.left){BSoft.ScrollWithWindow.moveLeft(iLeft);}};BSoft.ScrollWithWindow.on=function(){if(BSoft.ScrollWithWindow.interval){return;}
BSoft.ScrollWithWindow.top=BSoft.Utils.getPageScrollY();BSoft.ScrollWithWindow.left=BSoft.Utils.getPageScrollX();BSoft.ScrollWithWindow.interval=setInterval(BSoft.ScrollWithWindow.cycle,50);};BSoft.ScrollWithWindow.off=function(){if(!BSoft.ScrollWithWindow.interval){return;}
clearInterval(BSoft.ScrollWithWindow.interval);BSoft.ScrollWithWindow.interval=null;};BSoft.FixateOnScreen={};BSoft.FixateOnScreen.getExpression=function(coord,direction){return"BSoft.Utils.getPageScroll"+direction.toUpperCase()+"() + "+coord;};BSoft.FixateOnScreen.parseCoordinates=function(element){if(!this.isRegistered(element)){return false;}
var x=0;var y=0;var style=element.style;if(BSoft.is_ie&&!BSoft.is_ie7){x=style.getExpression("left").split(" ");x=parseInt(x[x.length-1],10);y=style.getExpression("top").split(" ");y=parseInt(y[y.length-1],10);}else{x=parseInt(style.left,10);y=parseInt(style.top,10);}
x+=BSoft.Utils.getPageScrollX();y+=BSoft.Utils.getPageScrollY();return{x:x,y:y};};BSoft.FixateOnScreen.correctCoordinates=function(x,y){position={x:x,y:y};if(position.x||position.x===0){position.x-=BSoft.Utils.getPageScrollX();if(BSoft.is_ie&&!BSoft.is_ie7){position.x=this.getExpression(position.x,"X");;}else{position.x+="px";}}
if(position.y||position.y===0){position.y-=BSoft.Utils.getPageScrollY();if(BSoft.is_ie&&!BSoft.is_ie7){position.y=this.getExpression(position.y,"Y");;}else{position.y+="px";}}
return position;};BSoft.FixateOnScreen.register=function(element){if(!BSoft.isHtmlElement(element)){return false;}
if(this.isRegistered(element)){return true;}
var pos=BSoft.Utils.getElementOffset(element);pos={x:parseInt(element.style.left,10)||pos.x,y:parseInt(element.style.top,10)||pos.y}
pos=this.correctCoordinates(pos.x,pos.y);if(!BSoft.is_ie||BSoft.is_ie7){var restorer=element.restorer;if(!restorer||!restorer.getObject||restorer.getObject()!=element){restorer=element.restorer=new BSoft.SRProp(element);}
restorer.saveProp("style.position");element.style.position="fixed";element.style.left=pos.x;element.style.top=pos.y;}else{element.style.setExpression("left",pos.x);element.style.setExpression("top",pos.y);}
element.bsFixed=true;return true;};BSoft.FixateOnScreen.unregister=function(element){if(!BSoft.isHtmlElement(element)){return false;}
var pos=this.parseCoordinates(element);if(pos===false){return true;}
if(BSoft.is_ie&&!BSoft.is_ie7){element.style.removeExpression("left");element.style.removeExpression("top");}
element.style.left=pos.x+"px";element.style.top=pos.y+"px";if(!BSoft.is_ie||BSoft.is_ie7){element.restorer.restoreProp("style.position",true);}
element.bsFixed=false;return true;};BSoft.FixateOnScreen.isRegistered=function(element){if(element.bsFixed){return true;}
return false;};BSoft.Utils.destroy=function(el){if(el&&el.parentNode)
el.parentNode.removeChild(el);};BSoft.Utils.newCenteredWindow=function(url,windowName,width,height,scrollbars){var leftPosition=0;var topPosition=0;if(screen.width)
leftPosition=(screen.width-width)/2;if(screen.height)
topPosition=(screen.height-height)/2;var winArgs='height='+height+',width='+width+',top='+topPosition+',left='+leftPosition+',scrollbars='+scrollbars+',resizable';var win=window.open(url,windowName,winArgs);return win;};BSoft.Utils.getWindowSize=function(){var iWidth=0;var iHeight=0;if(BSoft.is_opera){iWidth=document.body.clientWidth||0;iHeight=document.body.clientHeight||0;}else if(BSoft.is_khtml){iWidth=window.innerWidth||0;iHeight=window.innerHeight||0;}else if(document.compatMode&&document.compatMode=='CSS1Compat'){iWidth=document.documentElement.clientWidth||0;iHeight=document.documentElement.clientHeight||0;}else{iWidth=document.body.clientWidth||0;iHeight=document.body.clientHeight||0;}
return{width:iWidth,height:iHeight};};BSoft.Utils.selectOption=function(sel,val,call_default){var a=sel.options,i,o;for(i=a.length;--i>=0;){o=a[i];o.selected=(o.value==val);}
sel.value=val;if(call_default){if(typeof sel.onchange=="function")
sel.onchange();else if(typeof sel.onchange=="string")
eval(sel.onchange);}};BSoft.Utils.getNextSibling=function(el,tag,alternateTag){el=el.nextSibling;if(!tag){return el;}
tag=tag.toLowerCase();if(alternateTag)alternateTag=alternateTag.toLowerCase();while(el){if(el.nodeType==1&&(el.tagName.toLowerCase()==tag||(alternateTag&&el.tagName.toLowerCase()==alternateTag))){return el;}
el=el.nextSibling;}
return el;};BSoft.Utils.getPreviousSibling=function(el,tag,alternateTag){el=el.previousSibling;if(!tag){return el;}
tag=tag.toLowerCase();if(alternateTag)alternateTag=alternateTag.toLowerCase();while(el){if(el.nodeType==1&&(el.tagName.toLowerCase()==tag||(alternateTag&&el.tagName.toLowerCase()==alternateTag))){return el;}
el=el.previousSibling;}
return el;};BSoft.Utils.getFirstChild=function(el,tag,alternateTag){if(!el){return null;}
el=el.firstChild;if(!el){return null;}
if(!tag){return el;}
tag=tag.toLowerCase();if(el.nodeType==1){if(el.tagName.toLowerCase()==tag){return el;}else if(alternateTag){alternateTag=alternateTag.toLowerCase();if(el.tagName.toLowerCase()==alternateTag){return el;}}}
return BSoft.Utils.getNextSibling(el,tag,alternateTag);};BSoft.Utils.getLastChild=function(el,tag,alternateTag){if(!el){return null;}
el=el.lastChild;if(!el){return null;}
if(!tag){return el;}
tag=tag.toLowerCase();if(el.nodeType==1){if(el.tagName.toLowerCase()==tag){return el;}else if(alternateTag){alternateTag=alternateTag.toLowerCase();if(el.tagName.toLowerCase()==alternateTag){return el;}}}
return BSoft.Utils.getPreviousSibling(el,tag,alternateTag);};BSoft.Utils.getChildText=function(objNode){if(objNode==null){return'';}
var arrText=[];var objChild=objNode.firstChild;while(objChild!=null){if(objChild.nodeType==3){arrText.push(objChild.data);}
objChild=objChild.nextSibling;}
return arrText.join(' ');};BSoft.Utils.insertAfter=function(oldNode,newNode){if(oldNode.nextSibling){oldNode.parentNode.insertBefore(newNode,oldNode.nextSibling);}else{oldNode.parentNode.appendChild(newNode);}}
BSoft.Utils._ids={};BSoft.Utils.generateID=function(code,id){if(typeof id=="undefined"){if(typeof this._ids[code]=="undefined")
this._ids[code]=0;id=++this._ids[code];}
return"bsoft-"+code+"-"+id;};BSoft.Utils.addTooltip=function(target,tooltip){return new BSoft.Tooltip({target:target,tooltip:tooltip});};BSoft.isLite=true;BSoft.Utils.checkLinks=function(){var anchors=document.getElementsByTagName('A');for(var ii=0;ii<anchors.length;ii++){if(BSoft.Utils.checkLink(anchors[ii])){return true;}}
return false;}
BSoft.Utils.checkLink=function(lnk){if(!lnk){return false;}
if(!/^https?:\/\/((dev|www)\.)?bsoft\.com/i.test(lnk.href)){return false;}
var textContent=""
for(var ii=0;ii<lnk.childNodes.length;ii++){if(lnk.childNodes[ii].nodeType==3){textContent+=lnk.childNodes[ii].nodeValue;}}
if(textContent.length<4){return false;}
var parent=lnk;while(parent&&parent.nodeName.toLowerCase()!="html"){if(BSoft.Utils.getStyleProperty(parent,"display")=="none"||BSoft.Utils.getStyleProperty(parent,"visibility")=="hidden"||BSoft.Utils.getStyleProperty(parent,"opacity")=="0"||BSoft.Utils.getStyleProperty(parent,"-moz-opacity")=="0"||/alpha\(opacity=0\)/i.test(BSoft.Utils.getStyleProperty(parent,"filter"))){return false;}
parent=parent.parentNode;}
var coords=BSoft.Utils.getElementOffset(lnk);if(coords.left<0||coords.top<0){return false;}
return true;}
BSoft.Utils.checkActivation=function(){if(!BSoft.isLite)return true;var arrProducts=[]
add_product=function(script,webdir_in,name_in)
{arrProducts[script]={webdir:webdir_in,name:name_in,bActive:false}}
add_product('calendar.js','prod1','Calendar')
add_product('bsmenu.js','menu','Menu')
add_product('tree.js','prod3','Tree')
add_product('form.js','forms','Forms')
add_product('effects.js','effects','Effects')
add_product('hoverer.js','effects','Effects - Hoverer')
add_product('slideshow.js','effects','Effects - Slideshow')
add_product('bsgrid.js','grid','Grid')
add_product('slider.js','slider','Slider')
add_product('bstabs.js','tabs','Tabs')
add_product('bstime.js','time','Time')
add_product('window.js','windows','Window')
var strName,arrName,i
var bProduct=false
var scripts=document.getElementsByTagName('script');for(i=0;i<scripts.length;i++)
{if(/wizard.js/i.test(scripts[i].src))
return true
arrName=scripts[i].src.split('/')
if(arrName.length==0)
strName=scripts[i]
else
strName=arrName[arrName.length-1]
strName=strName.toLowerCase()
if(typeof arrProducts[strName]!='undefined')
{bProduct=true
arrProducts[strName].bActive=true}}
if(!bProduct||BSoft.Utils.checkLinks()){return true;}
var strMsg='You are using the Free version of the BSoft Software.\n'+'While using the Free version, a link to www.bsoft.com in this page is required.'
for(i in arrProducts)
if(arrProducts[i].bActive==true)
strMsg+='\nTo purchase the BSoft '+arrProducts[i].name+' visit www.bsoft.com/website/main/products/'+arrProducts[i].webdir+'/'
alert(strMsg)
return false;}
BSoft.Utils.clone=function(oSrc){if(typeof oSrc=='object'&&oSrc){var oClone=new oSrc.constructor();var fClone=BSoft.Utils.clone;for(var sProp in oSrc){oClone[sProp]=fClone(oSrc[sProp]);}
return oClone;}
return oSrc;};BSoft.is_opera=/opera/i.test(navigator.userAgent);BSoft.is_ie=(/msie/i.test(navigator.userAgent)&&!BSoft.is_opera);BSoft.is_ie5=(BSoft.is_ie&&/msie 5\.0/i.test(navigator.userAgent));BSoft.is_ie7=(BSoft.is_ie&&/msie 7\.0/i.test(navigator.userAgent));BSoft.is_mac_ie=(/msie.*mac/i.test(navigator.userAgent)&&!BSoft.is_opera);BSoft.is_khtml=/Konqueror|Safari|KHTML/i.test(navigator.userAgent);BSoft.is_konqueror=/Konqueror/i.test(navigator.userAgent);BSoft.is_gecko=/Gecko/i.test(navigator.userAgent);BSoft.is_webkit=/WebKit/i.test(navigator.userAgent);BSoft.webkitVersion=BSoft.is_webkit?parseInt(navigator.userAgent.replace(/.+WebKit\/([0-9]+)\..+/,"$1")):-1;if(!Object.prototype.hasOwnProperty){Object.prototype.hasOwnProperty=function(strProperty){try{var objPrototype=this.constructor.prototype;while(objPrototype){if(objPrototype[strProperty]==this[strProperty]){return false;}
objPrototype=objPrototype.prototype;}}catch(objException){}
return true;};}
if(!Function.prototype.call){Function.prototype.call=function(){var objThis=arguments[0];objThis._this_func=this;var arrArgs=[];for(var iArg=1;iArg<arguments.length;iArg++){arrArgs[arrArgs.length]='arguments['+iArg+']';}
var ret=eval('objThis._this_func('+arrArgs.join(',')+')');objThis._this_func=null;return ret;};}
if(!Function.prototype.apply){Function.prototype.apply=function(){var objThis=arguments[0];var objArgs=arguments[1];objThis._this_func=this;var arrArgs=[];if(objArgs){for(var iArg=0;iArg<objArgs.length;iArg++){arrArgs[arrArgs.length]='objArgs['+iArg+']';}}
var ret=eval('objThis._this_func('+arrArgs.join(',')+')');objThis._this_func=null;return ret;};}
if(!Array.prototype.pop){Array.prototype.pop=function(){var last;if(this.length){last=this[this.length-1];this.length-=1;}
return last;};}
if(!Array.prototype.push){Array.prototype.push=function(){for(var i=0;i<arguments.length;i++){this[this.length]=arguments[i];}
return this.length;};}
if(!Array.prototype.shift){Array.prototype.shift=function(){var first;if(this.length){first=this[0];for(var i=0;i<this.length-1;i++){this[i]=this[i+1];}
this.length-=1;}
return first;};}
if(!Array.prototype.unshift){Array.prototype.unshift=function(){if(arguments.length){var i,len=arguments.length;for(i=this.length+len-1;i>=len;i--){this[i]=this[i-len];}
for(i=0;i<len;i++){this[i]=arguments[i];}}
return this.length;};}
if(!Array.prototype.splice){Array.prototype.splice=function(index,howMany){var elements=[],removed=[],i;for(i=2;i<arguments.length;i++){elements.push(arguments[i]);}
for(i=index;(i<index+howMany)&&(i<this.length);i++){removed.push(this[i]);}
for(i=index+howMany;i<this.length;i++){this[i-howMany]=this[i];}
this.length-=removed.length;for(i=this.length+elements.length-1;i>=index+elements.length;i--){this[i]=this[i-elements.length];}
for(i=0;i<elements.length;i++){this[index+i]=elements[i];}
return removed;};}
BSoft.Utils.arrIndexOf=function(aArr,vSearchEl,iFromInd){if(!(aArr instanceof Array)){return-1;}
if(Array.prototype.indexOf){return aArr.indexOf(vSearchEl,iFromInd);}
if(!iFromInd){iFromInd=0;}
var iEls=aArr.length;for(var iEl=iFromInd;iEl<iEls;iEl++){if(aArr[iEl]==vSearchEl){return iEl;}}
return-1;};BSoft.Log=function(objArgs){if(!objArgs){return;}
var strMessage=objArgs.description;if(objArgs.severity){strMessage=objArgs.severity+':\n'+strMessage;}
if(objArgs.type!="warning"){alert(strMessage);}};BSoft.Utils.Array={};BSoft.Utils.Array.insertBefore=function(arr,el,key,nextKey){var tmp=new Array();for(var i in arr){if(i==nextKey){if(key){tmp[key]=el;}else{tmp.push(el);}}
tmp[i]=arr[i];}
return tmp;}
BSoft.inherit=function(oSubClass,oSuperClass,oArg){var Inheritance=function(){};Inheritance.prototype=oSuperClass.prototype;oSubClass.prototype=new Inheritance();oSubClass.prototype.constructor=oSubClass;oSubClass.SUPERconstructor=oSuperClass;oSubClass.SUPERclass=oSuperClass.prototype;if(typeof oSuperClass.path!='undefined'){if(oArg&&oArg.keepPath){oSubClass.path=oSuperClass.path;}else{oSubClass.path=BSoft.getPath(oSubClass.id);}}};BSoft.getPath=function(sId){var sSrc;if(typeof sId=='string'){var oScript=document.getElementById(sId);if(oScript){sSrc=oScript.getAttribute('src');}}
if(!sSrc){if(typeof BSoft.lastLoadedModule=='string'){return BSoft.lastLoadedModule;}
if(document.documentElement){var sHtml=document.documentElement.innerHTML;var aMatch=sHtml.match(/<script[^>]+src=[^>]+>/gi);if(aMatch&&aMatch.length){sHtml=aMatch[aMatch.length-1];aMatch=sHtml.match(/src="([^"]+)/i);if(aMatch&&aMatch.length==2){sSrc=aMatch[1];}}}
if(!sSrc){return'';}}
sSrc=sSrc.replace(/\\/g,'/');var aTokens=sSrc.split('?');aTokens=aTokens[0].split('/');aTokens=aTokens.slice(0,-1);if(!aTokens.length){return'';}
return aTokens.join('/')+'/';};BSoft.Utils.setWindowEvent=function(oEvent){if(oEvent){window.event=oEvent;}};BSoft.Utils.emulateWindowEvent=function(aEvents){if(document.addEventListener){var iEvents=aEvents.length;var oUtils=BSoft.Utils;var iEvent;for(iEvent=0;iEvent<iEvents;iEvent++){document.addEventListener(aEvents[iEvent],oUtils.setWindowEvent,true);}}};BSoft.windowLoaded=typeof(document.readyState)!='undefined'?(document.readyState=='loaded'||document.readyState=='complete'):document.getElementsByTagName!=null&&typeof(document.getElementsByTagName('body')[0])!='undefined';BSoft.Utils.addEvent(window,"load",function(){BSoft.windowLoaded=true;});BSoft.Utils.warnUnload=function(msg,win){BSoft.Utils.warnUnloadFlag=true;if(typeof(msg)!="string"){msg="All your changes will be lost.";}
if(typeof(win)=='undefined'){win=window;}
BSoft.Utils.addEvent(win,'beforeunload',function(ev){if(BSoft.Utils.warnUnloadFlag!=true){return true;}
if(typeof(ev)=='undefined'){ev=window.event;}
ev.returnValue=msg;return false;});}
BSoft.Utils.unwarnUnload=function(msg,win){BSoft.Utils.warnUnloadFlag=false;}
BSoft.Utils.warnUnloadFlag=false;BSoft.Utils.getMaxZindex=function(){if(window.opera||BSoft.is_khtml){return 2147483583;}else if(BSoft.is_ie){return 2147483647;}else{return 10737418239;}};BSoft.Utils.correctCssLength=function(val){if(typeof val=='undefined'||(typeof val=='object'&&!val)){return'auto';}
val+='';if(!val.length){return'auto';}
if(/\d$/.test(val)){val+='px';}
return val;};BSoft.Utils.destroyOnUnload=[];BSoft.Utils.addDestroyOnUnload=function(objElement,strProperty){BSoft.Utils.destroyOnUnload.push([objElement,strProperty]);};BSoft.Utils.createProperty=function(objElement,strProperty,val){objElement[strProperty]=val;BSoft.Utils.addDestroyOnUnload(objElement,strProperty);};BSoft.Utils.addEvent(window,'unload',function(){for(var iObj=BSoft.Utils.destroyOnUnload.length-1;iObj>=0;iObj--){var objDestroy=BSoft.Utils.destroyOnUnload[iObj];objDestroy[0][objDestroy[1]]=null;objDestroy[0]=null;}
for(var iLis=BSoft.Utils.removeOnUnload.length-1;iLis>=0;iLis--){var oParams=BSoft.Utils.removeOnUnload[iLis];if(!oParams){continue;}
BSoft.Utils.removeOnUnload[iLis]=null;BSoft.Utils.removeEvent(oParams['element'],oParams['event'],oParams['listener'],oParams['capture']);}});BSoft.Utils.htmlEncode=function(str){str=str.replace(/&/ig,"&amp;");str=str.replace(/</ig,"&lt;");str=str.replace(/>/ig,"&gt;");str=str.replace(/\x22/ig,"&quot;");return str;};BSoft.Utils.applyStyle=function(elRef,style){if(typeof(elRef)=='string'){elRef=document.getElementById(elRef);}
if(elRef==null||style==null||elRef.style==null){return null;}
if(BSoft.is_opera){var pairs=style.split(";");for(var ii=0;ii<pairs.length;ii++){var kv=pairs[ii].split(":");if(!kv[1]){continue;}
var value=kv[1].replace(/^\s*/,'').replace(/\s*$/,'');var key="";for(var jj=0;jj<kv[0].length;jj++){if(kv[0].charAt(jj)=="-"){jj++;if(jj<kv[0].length){key+=kv[0].charAt(jj).toUpperCase();}
continue;}
key+=kv[0].charAt(jj);}
switch(key){case"float":key="cssFloat";break;}
try{elRef.style[key]=value;}catch(e){}}}else{elRef.style.cssText=style;}
return true;}
BSoft.Utils.getStyleProperty=function(oEl,sPr){var oDV=document.defaultView;if(oDV&&oDV.getComputedStyle){var oCS=oDV.getComputedStyle(oEl,'');if(oCS){sPr=sPr.replace(/([A-Z])/g,'-$1').toLowerCase();return oCS.getPropertyValue(sPr);}}else if(oEl.currentStyle){return oEl.currentStyle[sPr];}
return oEl.style[sPr];};BSoft.Utils.getPrecision=function(dFloat){return(dFloat+'').replace(/^-?\d*\.*/,'').length;};BSoft.Utils.setPrecision=function(dFloat,iPrecision){dFloat*=1;if(dFloat.toFixed){return dFloat.toFixed(iPrecision)*1;}
var iPow=Math.pow(10,iPrecision);return parseInt(dFloat*iPow,10)/iPow;};BSoft.Utils.setPrecisionString=function(dFloat,iPrecision){var sFloat=BSoft.Utils.setPrecision(dFloat,iPrecision)+'';var iOldPrecision=BSoft.Utils.getPrecision(sFloat);var iZeros=iPrecision-iOldPrecision;if(iZeros){if(!iOldPrecision){sFloat+='.';}
for(var iZero=0;iZero<iZeros;iZero++){sFloat+='0';}}
return sFloat;};BSoft.Utils.createNestedHash=function(parent,keys,value){if(parent==null||keys==null){return null;}
var tmp=parent;for(var ii=0;ii<keys.length;ii++){if(typeof(tmp[keys[ii]])=='undefined'){tmp[keys[ii]]={};}
if(ii==keys.length-1&&typeof(value)!='undefined'){tmp[keys[ii]]=value;}
tmp=tmp[keys[ii]];}}
BSoft.implement=function(classOrObject,interfaceStr){if(typeof interfaceStr!="string"){return false;}
if(typeof classOrObject=="function"){classOrObject=classOrObject.prototype;}
if(!classOrObject||typeof classOrObject!="object"){return false;}
var interfaceObj=window;var objs=interfaceStr.split(".");try{for(var i=0;i<objs.length;++i){interfaceObj=interfaceObj[objs[i]];}}catch(e){return false;}
if(typeof classOrObject.interfaces!="object"){classOrObject.interfaces={};classOrObject.interfaces[interfaceStr]=true;}else if(classOrObject.interfaces[interfaceStr]!==true){classOrObject.interfaces=BSoft.Utils.clone(classOrObject.interfaces);classOrObject.interfaces[interfaceStr]=true;}else{return true;}
for(var iProp in interfaceObj){classOrObject[iProp]=interfaceObj[iProp];}
classOrObject.hasInterface=function(interfaceStr){if(this.interfaces[interfaceStr]===true){return true;}
return false;};classOrObject.requireInterface=function(interfaceStr){if(!this.hasInterface(interfaceStr)){BSoft.Log({description:"The object with ID '"+this.id+"' has no "+interfaceStr+" interface!"});return false;}
return true;};interfaceObj.setNamedProperty=classOrObject.setNamedProperty=function(name,val){this[name]=val;};interfaceObj.getNamedProperty=classOrObject.getNamedProperty=function(name){return this[name];};return true;};BSoft.Utils.getCharFromEvent=function(evt){if(!evt){evt=window.event;}
var response={};if(BSoft.is_gecko&&!BSoft.is_khtml&&evt.type!="keydown"&&evt.type!="keyup"){if(evt.charCode){response.chr=String.fromCharCode(evt.charCode);}else{response.charCode=evt.keyCode;}}else{response.charCode=evt.keyCode||evt.which;response.chr=String.fromCharCode(response.charCode);}
if(BSoft.is_opera&&response.charCode==0){response.charCode=null;response.chr=null;}
if(BSoft.is_khtml&&response.charCode==63272){response.charCode=46;response.chr=null;}
return response;}
BSoft.Utils.convertHTML2DOM=function(txt){var el=document.createElement("div");el.innerHTML=txt;var currEl=el.firstChild;while(!currEl.nodeType||currEl.nodeType!=1){currEl=currEl.nextSibling;}
BSoft.Utils.destroy(currEl);return currEl;};BSoft.Utils.escapeRegExp=function(s){return s.replace(/([.*+?^${}()|[\]\/\\])/g,'\\$1');};if(typeof BSoft=='undefined'){BSoft=function(){};}
BSoft.EventDriven=function(){};BSoft.EventDriven.prototype.init=function(){this.events={};};BSoft.EventDriven.prototype.addEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oE=this.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{this.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.push(fLsnr);};BSoft.EventDriven.prototype.unshiftEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oE=this.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{this.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.unshift(fLsnr);};BSoft.EventDriven.prototype.removeEventListener=function(sEv,fLsnr){var oE=this.events;if(!oE[sEv]){return 0;}
var aL=oE[sEv].listeners;var iRemoved=0;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){aL.splice(iL,1);iRemoved++;}}
return iRemoved;};BSoft.EventDriven.prototype.getEventListeners=function(sEv){var oE=this.events;if(!oE[sEv]){return[];}
return oE[sEv].listeners;};BSoft.EventDriven.prototype.isEventListener=function(sEv,fLsnr){var oE=this.events;if(!oE[sEv]){return false;}
var aL=oE[sEv].listeners;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){return true;}}
return false;};BSoft.EventDriven.prototype.isEvent=function(sEv){if(this.events[sEv]){return true;}
return false;};BSoft.EventDriven.prototype.removeEvent=function(sEv){var oE=this.events;if(oE[sEv]){var undef;oE[sEv]=undef;}};BSoft.EventDriven.prototype.fireEvent=function(sEv){var oE=this.events;if(!oE[sEv]){return;}
var aL=oE[sEv].listeners.slice();var iLs=aL.length;var aArgs;for(var iL=0;iLs--;iL++){aArgs=[].slice.call(arguments,1);aL[iL].apply(this,aArgs);}};BSoft.EventDriven.events={};BSoft.EventDriven.addEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oED=BSoft.EventDriven;var oE=oED.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{oED.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.push(fLsnr);};BSoft.EventDriven.unshiftEventListener=function(sEv,fLsnr){if(typeof fLsnr!="function"){return false;}
var oED=BSoft.EventDriven;var oE=oED.events;if(!oE[sEv]){oE[sEv]={listeners:[]};}else{oED.removeEventListener(sEv,fLsnr);}
oE[sEv].listeners.unshift(fLsnr);};BSoft.EventDriven.removeEventListener=function(sEv,fLsnr){var oE=BSoft.EventDriven.events;if(!oE[sEv]){return 0;}
var aL=oE[sEv].listeners;var iRemoved=0;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){aL.splice(iL,1);iRemoved++;}}
return iRemoved;};BSoft.EventDriven.getEventListeners=function(sEv){var oE=BSoft.EventDriven.events;if(!oE[sEv]){return[];}
return oE[sEv].listeners;};BSoft.EventDriven.isEventListener=function(sEv,fLsnr){var oE=BSoft.EventDriven.events;if(!oE[sEv]){return false;}
var aL=oE[sEv].listeners;for(var iL=aL.length-1;iL>=0;iL--){if(aL[iL]==fLsnr){return true;}}
return false;};BSoft.EventDriven.isEvent=function(sEv){if(BSoft.EventDriven.events[sEv]){return true;}
return false;};BSoft.EventDriven.removeEvent=function(sEv){var oE=BSoft.EventDriven.events;if(oE[sEv]){var undef;oE[sEv]=undef;}};BSoft.EventDriven.fireEvent=function(sEv){var oE=BSoft.EventDriven.events;if(!oE[sEv]){return;}
var aL=oE[sEv].listeners.slice();var iLs=aL.length;var aArgs;for(var iL=0;iLs--;iL++){aArgs=[].slice.call(arguments,1);aL[iL].apply(aL[iL],aArgs);}};BSoft.ImagePreloader=function(objArgs){this.job=null;this.image=null;if(arguments.length>0)this.init(objArgs);};BSoft.ImagePreloader.prototype.init=function(objArgs){if(!objArgs||!objArgs.job){return;}
this.job=objArgs.job;this.image=new Image();this.job.images.push(this.image);var objPreloader=this;this.image.onload=function(){objPreloader.job.loadedUrls.push(objArgs.url);setTimeout(function(){objPreloader.onLoad();},0);};this.image.onerror=function(){objPreloader.job.invalidUrls.push(objArgs.url);objPreloader.onLoad();};this.image.onabort=function(){objPreloader.job.abortedUrls.push(objArgs.url);objPreloader.onLoad();};this.image.src=objArgs.url;if(typeof objArgs.timeout=='number'){setTimeout(function(){if(objPreloader.job){if(objPreloader.image.complete){objPreloader.job.loadedUrls.push(objArgs.url);}else{objPreloader.job.abortedUrls.push(objArgs.url);}
objPreloader.onLoad();}},objArgs.timeout);}};BSoft.ImagePreloader.prototype.onLoad=function(){if(!this.job){return;}
this.image.onload=null;this.image.onerror=null;this.image.onabort=null;var objJob=this.job;this.job=null;objJob.leftToLoad--;if(objJob.leftToLoad==0&&typeof objJob.onLoad=='function'){var funcOnLoad=objJob.onLoad;objJob.onLoad=null;funcOnLoad(objJob);}};BSoft.PreloadImages=function(objArgs){this.images=[];this.leftToLoad=0;this.loadedUrls=[];this.invalidUrls=[];this.abortedUrls=[];this.onLoad=null;if(arguments.length>0)this.init(objArgs);};BSoft.PreloadImages.prototype.init=function(objArgs){if(!objArgs){return;}
if(!objArgs.urls||!objArgs.urls.length){if(typeof objArgs.onLoad=='function'){objArgs.onLoad(this);}
return;}
this.images=[];this.leftToLoad=objArgs.urls.length;this.loadedUrls=[];this.invalidUrls=[];this.abortedUrls=[];this.onLoad=objArgs.onLoad;for(var iUrl=0;iUrl<objArgs.urls.length;iUrl++){new BSoft.ImagePreloader({job:this,url:objArgs.urls[iUrl],timeout:objArgs.timeout});}};if(typeof BSoft=='undefined'){BSoft=function(){};}
BSoft.StyleSheet=function(bUseLast){if(bUseLast){if(document.createStyleSheet){if(document.styleSheets.length){this.styleSheet=document.styleSheets[document.styleSheets.length-1];}}else{var aStyleSheets=document.getElementsByTagName('style');if(aStyleSheets.length){this.styleSheet=aStyleSheets[aStyleSheets.length-1];}}}
if(!this.styleSheet){if(document.createStyleSheet){try{this.styleSheet=document.createStyleSheet();}catch(oException){this.styleSheet=document.styleSheets[document.styleSheets.length-1];};}else{this.styleSheet=document.createElement('style');this.styleSheet.type='text/css';var oHead=document.getElementsByTagName('head')[0];if(!oHead){oHead=document.documentElement;}
if(oHead){oHead.appendChild(this.styleSheet);}}}};BSoft.StyleSheet.prototype.addRule=function(strSelector,strDeclarations){if(!this.styleSheet){return;}
if(document.createStyleSheet){this.styleSheet.cssText+=strSelector+' { '+strDeclarations+' }';}else{this.styleSheet.appendChild(document.createTextNode(strSelector+' { '+strDeclarations+' }'));}};BSoft.StyleSheet.prototype.removeRules=function(){if(!this.styleSheet){return;}
if(document.createStyleSheet){var iRules=this.styleSheet.rules.length;for(var iRule=0;iRule<iRules;iRule++){this.styleSheet.removeRule();}}else{while(this.styleSheet.firstChild){this.styleSheet.removeChild(this.styleSheet.firstChild);}}};BSoft.StyleSheet.prototype.addParse=function(strStyleSheet){var arrClean=[];var arrTokens=strStyleSheet.split('/*');for(var iTok=0;iTok<arrTokens.length;iTok++){var arrTails=arrTokens[iTok].split('*/');arrClean.push(arrTails[arrTails.length-1]);}
strStyleSheet=arrClean.join('');strStyleSheet=strStyleSheet.replace(/@[^{]*;/g,'');var arrStyles=strStyleSheet.split('}');for(var iStl=0;iStl<arrStyles.length;iStl++){var arrRules=arrStyles[iStl].split('{');if(arrRules[0]&&arrRules[1]){var arrSelectors=arrRules[0].split(',');for(var iSel=0;iSel<arrSelectors.length;iSel++){this.addRule(arrSelectors[iSel],arrRules[1]);}}}};if(typeof BSoft=='undefined'){BSoft=function(){};}
BSoft.Transport=function(){};if(typeof ActiveXObject!='undefined'){BSoft.Transport.XMLDOM=null;BSoft.Transport.XMLHTTP=null;BSoft.Transport.pickActiveXVersion=function(aVersions){for(var iVn=0;iVn<aVersions.length;iVn++){try{var oDoc=new ActiveXObject(aVersions[iVn]);if(oDoc){return aVersions[iVn];}}catch(oExpn){};}
return null;};BSoft.Transport.XMLDOM=BSoft.Transport.pickActiveXVersion(['Msxml2.DOMDocument.4.0','Msxml2.DOMDocument.3.0','MSXML2.DOMDocument','MSXML.DOMDocument','Microsoft.XMLDOM']);BSoft.Transport.XMLHTTP=BSoft.Transport.pickActiveXVersion(['Msxml2.XMLHTTP.4.0','MSXML2.XMLHTTP.3.0','MSXML2.XMLHTTP','Microsoft.XMLHTTP']);BSoft.Transport.pickActiveXVersion=null;}
BSoft.Transport.createXmlHttpRequest=function(){if(typeof ActiveXObject!='undefined'){try{return new ActiveXObject(BSoft.Transport.XMLHTTP);}catch(oExpn){};}
if(typeof XMLHttpRequest!='undefined'){return new XMLHttpRequest();}
return null;};BSoft.Transport.isBusy=function(oArg){var oContr=oArg.busyContainer;if(typeof oContr=='string'){oContr=document.getElementById(oContr);}
if(!oContr){return;}
var sImage=oArg.busyImage;if(typeof sImage!='string'){sImage='';}
sImage=sImage.split('/').pop();if(!sImage.length){sImage='bsbusy.gif';}
var oFC=oContr.firstChild;if(oFC){oFC=oFC.firstChild;if(oFC){oFC=oFC.firstChild;if(oFC&&oFC.tagName&&oFC.tagName.toLowerCase()=='img'){var sSrc=oFC.getAttribute('src');if(typeof sSrc=='string'&&sSrc.length){sSrc=sSrc.split('/').pop();if(sSrc==sImage){return true;}}}}}
return false;};BSoft.Transport.showBusy=function(oArg){if(BSoft.Transport.isBusy(oArg)){return;}
var oContr=oArg.busyContainer;if(typeof oContr=='string'){oContr=document.getElementById(oContr);}
if(!oContr){return;}
var sImage=oArg.busyImage;var sImageWidth=oArg.busyImageWidth;var sImageHeight=oArg.busyImageHeight;if(typeof sImage!='string'||!sImage.length){sImage='bsbusy.gif';}else{if(typeof sImageWidth=='number'||(typeof sImageWidth=='string'&&/\d$/.test(sImageWidth))){sImageWidth+='px';}
if(typeof sImageHeight=='number'||(typeof sImageHeight=='string'&&/\d$/.test(sImageHeight))){sImageHeight+='px';}}
if(!sImageWidth){sImageWidth='65px';}
if(!sImageHeight){sImageHeight='35px';}
var sPath='';if(sImage.indexOf('/')<0){if(BSoft.bsoftPath){sPath=BSoft.bsoftPath;}else{sPath=BSoft.Transport.getPath('transport.js');}}
var aImg=[];aImg.push('<img src="');aImg.push(sPath);aImg.push(sImage);aImg.push('"');if(sImageWidth||sImageHeight){aImg.push(' style="');if(sImageWidth){aImg.push('width:');aImg.push(sImageWidth);aImg.push(';');}
if(sImageHeight){aImg.push('height:');aImg.push(sImageHeight);}
aImg.push('"');}
aImg.push(' />');var iContainerWidth=oContr.offsetWidth;var iContainerHeight=oContr.offsetHeight;var oBusyContr=BSoft.Utils.createElement('div');oBusyContr.style.position='relative';oBusyContr.style.zIndex=2147483583;var oBusy=BSoft.Utils.createElement('div',oBusyContr);oBusy.style.position='absolute';oBusy.innerHTML=aImg.join('');oContr.insertBefore(oBusyContr,oContr.firstChild);var iBusyWidth=oBusy.offsetWidth;var iBusyHeight=oBusy.offsetHeight;if(iContainerWidth>iBusyWidth){oBusy.style.left=oContr.scrollLeft+
(iContainerWidth-iBusyWidth)/2+'px';}
if(iContainerHeight>iBusyHeight){oBusy.style.top=oContr.scrollTop+
(iContainerHeight-iBusyHeight)/2+'px';}};BSoft.Transport.removeBusy=function(oArg){var oContr=oArg.busyContainer;if(typeof oContr=='string'){oContr=document.getElementById(oContr);}
if(!oContr){return;}
if(BSoft.Transport.isBusy(oArg)){oContr.removeChild(oContr.firstChild);}};BSoft.Transport.fetch=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.url){return null;}
if(!oArg.method){oArg.method='GET';}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.contentType&&oArg.method.toUpperCase()=='POST'){oArg.contentType='application/x-www-form-urlencoded';}
if(!oArg.content){oArg.content=null;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
var oRequest=BSoft.Transport.createXmlHttpRequest();if(oRequest==null){return null;}
BSoft.Transport.showBusy(oArg);var bErrorDisplayed=false;var funcOnReady=function(){BSoft.Transport.removeBusy(oArg);try{if(oRequest.status==200||oRequest.status==304||(location.protocol=='file:'&&!oRequest.status)){if(typeof oArg.onLoad=='function'){oArg.onLoad(oRequest);}}else if(!bErrorDisplayed){bErrorDisplayed=true;BSoft.Transport.displayError(oRequest.status,"Error: Can't fetch "+oArg.url+'.\n'+
(oRequest.statusText||''),oArg.onError);}}catch(oExpn){if(!bErrorDisplayed){bErrorDisplayed=true;if(oExpn.name&&oExpn.name=='NS_ERROR_NOT_AVAILABLE'){BSoft.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\nFile not found.',oArg.onError);}else{BSoft.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\n'+
(oExpn.message||''),oArg.onError);}}};};try{if(typeof oArg.username!='undefined'&&typeof oArg.password!='undefined'){oRequest.open(oArg.method,oArg.url,oArg.async,oArg.username,oArg.password);}else{oRequest.open(oArg.method,oArg.url,oArg.async);}
if(oArg.async){oRequest.onreadystatechange=function(){if(oRequest.readyState==4){funcOnReady();oRequest.onreadystatechange={};}};}
if(oArg.contentType){oRequest.setRequestHeader('Content-Type',oArg.contentType);}
oRequest.send(oArg.content);if(!oArg.async){funcOnReady();return oRequest;}}catch(oExpn){BSoft.Transport.removeBusy(oArg);if(!bErrorDisplayed){bErrorDisplayed=true;if(oExpn.name&&oExpn.name=='NS_ERROR_FILE_NOT_FOUND'){BSoft.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\nFile not found.',oArg.onError);}else{BSoft.Transport.displayError(0,"Error: Can't fetch "+oArg.url+'.\n'+
(oExpn.message||''),oArg.onError);}}};return null;};BSoft.Transport.parseHtml=function(sHtml){sHtml+='';sHtml=sHtml.replace(/^\s+/g,'');var oTmpContr;if(document.createElementNS){oTmpContr=document.createElementNS('http://www.w3.org/1999/xhtml','div');}else{oTmpContr=document.createElement('div');}
oTmpContr.innerHTML=sHtml;return oTmpContr;};BSoft.Transport.evalGlobalScope=function(sScript){if(typeof sScript!='string'||!sScript.match(/\S/)){return;}
if(window.execScript){window.execScript(sScript,'javascript');}else if(window.eval){window.eval(sScript);}};BSoft.Transport.setInnerHtml=function(oArg){if(!oArg||typeof oArg.html!='string'){return;}
var sHtml=oArg.html;var oContr=null;if(typeof oArg.container=='string'){oContr=document.getElementById(oArg.container);}else if(typeof oArg.container=='object'){oContr=oArg.container;}
var aScripts=[];if(sHtml.match(/<\s*\/\s*script\s*>/i)){var aTokens=sHtml.split(/<\s*\/\s*script\s*>/i);var aHtml=[];for(var iToken=aTokens.length-1;iToken>=0;iToken--){var sToken=aTokens[iToken];if(sToken.match(/\S/)){var aMatch=sToken.match(/<\s*script([^>]*)>/i);if(aMatch){var aCouple=sToken.split(/<\s*script[^>]*>/i);while(aCouple.length<2){if(sToken.match(/^<\s*script[^>]*>/i)){aCouple.unshift('');}else{aCouple.push('');}}
aHtml.unshift(aCouple[0]);var sAttrs=aMatch[1];var srtScript=aCouple[1];if(sAttrs.match(/\s+src\s*=/i)){srtScript='';}else{srtScript=srtScript.replace(/function\s+([^(]+)/g,'$1=function');}
aScripts.push([sAttrs,srtScript]);}else if(iToken<aTokens.length-1){aTokens[iToken-1]+='</script>'+sToken;}else{aHtml.unshift(sToken);}}else{aHtml.unshift(sToken);}}
sHtml=aHtml.join('');}
if(oContr){if(window.opera){oContr.innerHTML='<form></form>';}
oContr.innerHTML=sHtml;}
for(var iScript=0;iScript<aScripts.length;iScript++){if(aScripts[iScript][1].length){BSoft.Transport.evalGlobalScope(aScripts[iScript][1]);}
var sAttrs=aScripts[iScript][0];sAttrs=sAttrs.replace(/\s+/g,' ').replace(/^\s/,'').replace(/\s$/,'').replace(/ = /g,'=');if(sAttrs.indexOf('src=')>=0){var oContr=document.body;if(!oContr){oContr=document.getElementsByTagName('head')[0];if(!oContr){oContr=document;}}
var aAttrs=sAttrs.split(' ');var oScript=BSoft.Utils.createElement('script');for(var iAttr=0;iAttr<aAttrs.length;iAttr++){var aAttr=aAttrs[iAttr].split('=');if(aAttr.length>1){oScript.setAttribute(aAttr[0],aAttr[1].match(/^[\s|"|']*([\s|\S]*[^'|"])[\s|"|']*$/)[1]);}else{oScript.setAttribute(aAttr[0],aAttr[0]);}}
oContr.appendChild(oScript);}}};BSoft.Transport.fetchXmlDoc=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.url){return null;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(!oArg.method&&typeof oArg.username=='undefined'&&typeof oArg.password=='undefined'){if(document.implementation&&document.implementation.createDocument){var oDoc=null;if(!oArg.reliable){oArg.reliable=false;}
var oFetchArg={};for(var sKey in oArg){oFetchArg[sKey]=oArg[sKey];}
if(oArg.async){oFetchArg.onLoad=function(oRequest){oFetchArg.onLoad=null;var parser=new DOMParser();oDoc=parser.parseFromString(oRequest.responseText,"text/xml");BSoft.Transport.removeBusy(oArg);BSoft.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);};}else{oFetchArg.onLoad=null;}
var oRequest=BSoft.Transport.fetch(oFetchArg);if(!oArg.async&&oRequest){var parser=new DOMParser();oDoc=parser.parseFromString(oRequest.responseText,"text/xml");BSoft.Transport.removeBusy(oArg);BSoft.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}
return null;}
if(typeof ActiveXObject!='undefined'){BSoft.Transport.showBusy(oArg);try{var oDoc=new ActiveXObject(BSoft.Transport.XMLDOM);oDoc.async=oArg.async;if(oArg.async){oDoc.onreadystatechange=function(){if(oDoc.readyState==4){BSoft.Transport.removeBusy(oArg);BSoft.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);oDoc.onreadystatechange={};}};}
oDoc.load(oArg.url);if(!oArg.async){BSoft.Transport.removeBusy(oArg);BSoft.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}
return null;}catch(oExpn){BSoft.Transport.removeBusy(oArg);};}}
var oFetchArg={};for(var sKey in oArg){oFetchArg[sKey]=oArg[sKey];}
if(oArg.async){oFetchArg.onLoad=function(oRequest){BSoft.Transport.parseXml({strXml:oRequest.responseText,onLoad:oArg.onLoad,onError:oArg.onError});};}else{oFetchArg.onLoad=null;}
var oRequest=BSoft.Transport.fetch(oFetchArg);if(!oArg.async&&oRequest){return BSoft.Transport.parseXml({strXml:oRequest.responseText,onLoad:oArg.onLoad,onError:oArg.onError});}
return null;};BSoft.Transport.parseXml=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.strXml){return null;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(window.DOMParser){try{var oDoc=(new DOMParser()).parseFromString(oArg.strXml,'text/xml');BSoft.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}catch(oExpn){BSoft.Transport.displayError(0,"Error: Can't parse.\n"+'String does not appear to be a valid XML fragment.',oArg.onError);};return null;}
if(typeof ActiveXObject!='undefined'){try{var oDoc=new ActiveXObject(BSoft.Transport.XMLDOM);oDoc.loadXML(oArg.strXml);BSoft.Transport.onXmlDocLoad(oDoc,oArg.onLoad,oArg.onError);return oDoc;}catch(oExpn){};}
return null;};BSoft.Transport.onXmlDocLoad=function(oDoc,onLoad,onError){var sError=null;if(oDoc.parseError){sError=oDoc.parseError.reason;if(oDoc.parseError.srcText){sError+='Location: '+oDoc.parseError.url+'\nLine number '+oDoc.parseError.line+', column '+
oDoc.parseError.linepos+':\n'+
oDoc.parseError.srcText+'\n';}}else if(oDoc.documentElement&&oDoc.documentElement.tagName=='parsererror'){sError=oDoc.documentElement.firstChild.data+'\n'+
oDoc.documentElement.firstChild.nextSibling.firstChild.data;}else if(!oDoc.documentElement){sError='String does not appear to be a valid XML fragment.';}
if(sError){BSoft.Transport.displayError(0,"Error: Can't parse.\n"+sError,onError);}else{if(typeof onLoad=='function'){onLoad(oDoc);}}};BSoft.Transport.serializeXmlDoc=function(oDoc){if(window.XMLSerializer){return(new XMLSerializer).serializeToString(oDoc);}
if(oDoc.xml){return oDoc.xml;}};BSoft.Transport.fetchJsonObj=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.url){return null;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.reliable){oArg.reliable=false;}
var oFetchArg={};for(var sKey in oArg){oFetchArg[sKey]=oArg[sKey];}
if(oArg.async){oFetchArg.onLoad=function(oRequest){BSoft.Transport.parseJson({strJson:oRequest.responseText,reliable:oArg.reliable,onLoad:oArg.onLoad,onError:oArg.onError});};}else{oFetchArg.onLoad=null;}
var oRequest=BSoft.Transport.fetch(oFetchArg);if(!oArg.async&&oRequest){return BSoft.Transport.parseJson({strJson:oRequest.responseText,reliable:oArg.reliable,onLoad:oArg.onLoad,onError:oArg.onError});}
return null;};BSoft.Transport.parseJson=function(oArg){if(oArg==null||typeof oArg!='object'){return null;}
if(!oArg.reliable){oArg.reliable=false;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
var oJson=null;try{if(oArg.reliable){if(oArg.strJson){oJson=eval('('+oArg.strJson+')');}}else{oJson=BSoft.Transport.parseJsonStr(oArg.strJson);}}catch(oExpn){var sError="Error: Can't parse.\nString doesn't appear to be a valid JSON fragment: ";sError+=oExpn.message;if(typeof oExpn.text!='undefined'&&oExpn.text.length){sError+='\n'+oExpn.text;}
sError+='\n'+oArg.strJson;BSoft.Transport.displayError(0,sError,oArg.onError);return null;};if(typeof oArg.onLoad=='function'){oArg.onLoad(oJson);}
return oJson;};BSoft.Transport.parseJsonStr=function(text){var p=/^\s*(([,:{}\[\]])|"(\\.|[^\x00-\x1f"\\])*"|-?\d+(\.\d*)?([eE][+-]?\d+)?|true|false|null)\s*/,token,operator;function error(m,t){throw{name:'JSONError',message:m,text:t||operator||token};}
function next(b){if(b&&b!=operator){error("Expected '"+b+"'");}
if(text){var t=p.exec(text);if(t){if(t[2]){token=null;operator=t[2];}else{operator=null;try{token=eval(t[1]);}catch(e){error("Bad token",t[1]);}}
text=text.substring(t[0].length);}else{error("Unrecognized token",text);}}else{token=operator=null;}}
function val(){var k,o;switch(operator){case'{':next('{');o={};if(operator!='}'){for(;;){if(operator||typeof token!='string'){error("Missing key");}
k=token;next();next(':');o[k]=val();if(operator!=','){break;}
next(',');}}
next('}');return o;case'[':next('[');o=[];if(operator!=']'){for(;;){o.push(val());if(operator!=','){break;}
next(',');}}
next(']');return o;default:if(operator!==null){error("Missing value");}
k=token;next();return k;}}
next();return val();};BSoft.Transport.serializeJsonObj=function(v){var a=[];function e(s){a[a.length]=s;}
function g(x){var c,i,l,v;switch(typeof x){case'object':if(x){if(x instanceof Array){e('[');l=a.length;for(i=0;i<x.length;i+=1){v=x[i];if(typeof v!='undefined'&&typeof v!='function'){if(l<a.length){e(',');}
g(v);}}
e(']');return;}else if(typeof x.toString!='undefined'){e('{');l=a.length;for(i in x){v=x[i];if(x.hasOwnProperty(i)&&typeof v!='undefined'&&typeof v!='function'){if(l<a.length){e(',');}
g(i);e(':');g(v);}}
return e('}');}}
e('null');return;case'number':e(isFinite(x)?+x:'null');return;case'string':l=x.length;e('"');for(i=0;i<l;i+=1){c=x.charAt(i);if(c>=' '){if(c=='\\'||c=='"'){e('\\');}
e(c);}else{switch(c){case'\b':e('\\b');break;case'\f':e('\\f');break;case'\n':e('\\n');break;case'\r':e('\\r');break;case'\t':e('\\t');break;default:c=c.charCodeAt();e('\\u00'+Math.floor(c/16).toString(16)+
(c%16).toString(16));}}}
e('"');return;case'boolean':e(String(x));return;default:e('null');return;}}
g(v);return a.join('');};BSoft.Transport.displayError=function(iErrCode,sError,onError){if(typeof onError=='function'){onError({errorCode:iErrCode,errorDescription:sError});}else{alert(sError);}};BSoft.Transport.translateUrl=function(oArg){if(!oArg||!oArg.url){return null;}
var aFullUrl=oArg.url.split('?',2);var sUrl=aFullUrl[0];if(sUrl.indexOf(':')>=0){return oArg.url;}
var oLocation=document.location;var sPort=oLocation.port;if(sPort){sPort=':'+sPort;}
if(sUrl[0]=='/'){return[oLocation.protocol,'//',oLocation.hostname,sPort,sUrl].join('');}
var sLocation;if(sPort){sLocation=[oLocation.protocol,'//',oLocation.hostname,sPort,oLocation.pathname].join('');}else{sLocation=oLocation.toString();}
var sRelativeTo;if(typeof oArg.relativeTo!='string'){sRelativeTo=sLocation.split('?',2)[0];}else{sRelativeTo=oArg.relativeTo.split('?',2)[0];if(sRelativeTo.indexOf('/')<0){sRelativeTo=sLocation.split('?',2)[0];}else if(sRelativeTo.charAt(0)!='/'&&sRelativeTo.indexOf(':')<0){sRelativeTo=BSoft.Transport.translateUrl({url:sRelativeTo});}}
sRelativeTo=sRelativeTo.split('#')[0];var aUrl=sUrl.split('/');var aRelativeTo=sRelativeTo.split('/');aRelativeTo.pop();for(var iToken=0;iToken<aUrl.length;iToken++){var sToken=aUrl[iToken];if(sToken=='..'){aRelativeTo.pop();}else if(sToken!='.'){aRelativeTo.push(sToken);}}
aFullUrl[0]=aRelativeTo.join('/');return aFullUrl.join('?');};BSoft.Transport.loading={};BSoft.Transport.setupEvents=function(oArg){if(!oArg){return{};}
if(oArg.force||!BSoft.EventDriven||!oArg.url){return{onLoad:oArg.onLoad,onError:oArg.onError};}
var sUrl=oArg.url;if(typeof oArg.onLoad=='function'){BSoft.EventDriven.addEventListener('bsTransportOnLoad'+sUrl,oArg.onLoad);}
if(typeof oArg.onError=='function'){BSoft.EventDriven.addEventListener('bsTransportOnError'+sUrl,oArg.onError);}
if(BSoft.Transport.loading[sUrl]){return{loading:true};}else{BSoft.Transport.loading[sUrl]=true;return{onLoad:new Function("BSoft.EventDriven.fireEvent('bsTransportOnLoad"+
sUrl+"');BSoft.EventDriven.removeEvent('bsTransportOnLoad"+
sUrl+"');BSoft.EventDriven.removeEvent('bsTransportOnError"+
sUrl+"');BSoft.Transport.loading['"+sUrl+"'] = false;"),onError:new Function('oError',"BSoft.EventDriven.fireEvent('bsTransportOnError"+
sUrl+"',oError);BSoft.EventDriven.removeEvent('bsTransportOnLoad"+
sUrl+"');BSoft.EventDriven.removeEvent('bsTransportOnError"+
sUrl+"');BSoft.Transport.loading['"+sUrl+"'] = false;")};}};BSoft.Transport.loadedJS={};BSoft.Transport.isLoadedJS=function(sUrl,sAbsUrl){if(typeof sAbsUrl=='undefined'){sAbsUrl=BSoft.Transport.translateUrl({url:sUrl});}
if(BSoft.Transport.loadedJS[sAbsUrl]){return true;}
var aScripts=document.getElementsByTagName('script');for(var iScript=0;iScript<aScripts.length;iScript++){var sSrc=aScripts[iScript].getAttribute('src')||'';if(sSrc==sUrl){BSoft.Transport.loadedJS[sAbsUrl]=true;return true;}}
return false;};BSoft.Transport.getPath=function(sScriptFileName){var aScripts=document.getElementsByTagName('script');for(var iScript=aScripts.length-1;iScript>=0;iScript--){var sSrc=aScripts[iScript].getAttribute('src')||'';var aTokens=sSrc.split('/');var sLastToken=aTokens.pop();if(sLastToken==sScriptFileName){return aTokens.length?aTokens.join('/')+'/':'';}}
for(var sSrc in BSoft.Transport.loadedJS){var aTokens=sSrc.split('/');var sLastToken=aTokens.pop();if(sLastToken==sScriptFileName){return aTokens.length?aTokens.join('/')+'/':'';}}
return'';};BSoft.Transport.include=function(sSrc,sId,bForce){if(BSoft.doNotInclude){return;}
var sAbsUrl=BSoft.Transport.translateUrl({url:sSrc});if(!bForce&&BSoft.Transport.isLoadedJS(sSrc,sAbsUrl)){return;}
document.write('<script type="text/javascript" src="'+sSrc+
(typeof sId=='string'?'" id="'+sId:'')+'"></script>');BSoft.Transport.loadedJS[sAbsUrl]=true;};BSoft.include=BSoft.Transport.include;BSoft.Transport.includeJS=function(sSrc,sId){setTimeout(function(){var oContr=document.body;if(!oContr){oContr=document.getElementsByTagName('head')[0];if(!oContr){oContr=document;}}
var oScript=document.createElement('script');oScript.type='text/javascript';oScript.src=sSrc;if(typeof sId=='string'){oScript.id=sId;}
oContr.appendChild(oScript);},0);};BSoft.Transport.loadJS=function(oArg){if(!(oArg instanceof Object)){return;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
var sUrl=null;if(oArg.url){sUrl=oArg.url;}else if(oArg.module){var sPath='';if(typeof oArg.path!='undefined'){sPath=oArg.path;}else if(typeof BSoft.bsoftPath!='undefined'){sPath=BSoft.bsoftPath;}
sUrl=sPath+oArg.module+'.js';}else{return;}
var sAbsUrl=BSoft.Transport.translateUrl({url:sUrl});if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(BSoft.doNotInclude||(!oArg.force&&BSoft.Transport.isLoadedJS(sUrl,sAbsUrl))){if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}
var oHandlers=BSoft.Transport.setupEvents({url:sAbsUrl,force:oArg.force,onLoad:oArg.onLoad,onError:oArg.onError});if(oHandlers.loading){return;}
BSoft.Transport.fetch({url:sUrl,async:oArg.async,onLoad:function(oRequest){if(oArg.force||!BSoft.Transport.loadedJS[sAbsUrl]){var aTokens=sUrl.split('/');var sLastToken=aTokens.pop();BSoft.lastLoadedModule=aTokens.join('/')+'/';BSoft.Transport.evalGlobalScope(oRequest.responseText);BSoft.lastLoadedModule=null;BSoft.Transport.loadedJS[sAbsUrl]=true;}
if(typeof oHandlers.onLoad=='function'){oHandlers.onLoad();}},onError:oHandlers.onError});};BSoft.Transport.includeCSS=function(sHref){var oContr=document.getElementsByTagName('head')[0];if(!oContr){return;}
var oLink=document.createElement('link');oLink.setAttribute('rel','stylesheet');oLink.setAttribute('type','text/css');oLink.setAttribute('href',sHref);oContr.appendChild(oLink);};BSoft.Transport.loadedCss={};BSoft.Transport.loadCss=function(oArg){if(!(oArg instanceof Object)){return;}
if(!oArg.url){return;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
var sAbsUrl=BSoft.Transport.translateUrl({url:oArg.url});if(!oArg.force){if(BSoft.Transport.loadedCss[sAbsUrl]){if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}
var aLinks=document.getElementsByTagName('link');for(var iLnk=0;iLnk<aLinks.length;iLnk++){var sHref=aLinks[iLnk].getAttribute('href')||'';sHref=BSoft.Transport.translateUrl({url:sHref});if(sHref==sAbsUrl){BSoft.Transport.loadedCss[sAbsUrl]=true;if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}}}
var oHandlers=BSoft.Transport.setupEvents({url:sAbsUrl,force:oArg.force,onLoad:oArg.onLoad,onError:oArg.onError});if(oHandlers.loading){return;}
BSoft.Transport.fetch({url:oArg.url,async:oArg.async,onLoad:function(oRequest){var sCss=oRequest.responseText;var aResultCss=[];var aImgUrls=[];var aCssUrls=[];var iPos=0;var iNextPos=sCss.indexOf('url(',iPos);while(iNextPos>=0){iNextPos+=4;var sToken=sCss.substring(iPos,iNextPos);var bIsImport=/@import\s+url\($/.test(sToken);aResultCss.push(sToken);iPos=iNextPos;iNextPos=sCss.indexOf(')',iPos);if(iNextPos>=0){var sImgUrl=sCss.substring(iPos,iNextPos);sImgUrl=sImgUrl.replace(/['"]/g,'');sImgUrl=BSoft.Transport.translateUrl({url:sImgUrl,relativeTo:oArg.url});sImgUrl=BSoft.Transport.translateUrl({url:sImgUrl});aResultCss.push(sImgUrl);if(bIsImport){aCssUrls.push(sImgUrl);}else{aImgUrls.push(sImgUrl);}
iPos=iNextPos;iNextPos=sCss.indexOf('url(',iPos);}}
aResultCss.push(sCss.substr(iPos));sCss=aResultCss.join('');BSoft.Transport.loadCssList({urls:aCssUrls,async:oArg.async,onLoad:function(){(new BSoft.StyleSheet()).addParse(sCss);if(typeof oHandlers.onLoad=='function'){oHandlers.onLoad();}}});BSoft.Transport.loadedCss[sAbsUrl]=true;BSoft.Transport.preloadImages({urls:aImgUrls,timeout:60000});},onError:oHandlers.onError});};BSoft.Transport.loadCssList=function(oArg){if(!(oArg instanceof Object)){return;}
if(typeof oArg.async=='undefined'){oArg.async=true;}
if(!oArg.onLoad){oArg.onLoad=null;}
if(!oArg.onError){oArg.onError=null;}
if(!oArg.urls||!oArg.urls.length){if(typeof oArg.onLoad=='function'){oArg.onLoad();}
return;}
var sUrl=oArg.urls.shift();var funcOnLoad=function(){BSoft.Transport.loadCssList({urls:oArg.urls,async:oArg.async,force:oArg.force,onLoad:oArg.onLoad,onError:oArg.onError});};BSoft.Transport.loadCss({url:sUrl,async:oArg.async,force:oArg.force,onLoad:funcOnLoad,onError:function(oError){BSoft.Transport.displayError(oError.errorCode,oError.errorDescription,oArg.onError);funcOnLoad();}});};BSoft.Transport.imagePreloads=[];BSoft.Transport.preloadImages=function(oArg){BSoft.Transport.imagePreloads.push(new BSoft.PreloadImages(oArg));};BSoft.Drag={};BSoft.Utils.emulateWindowEvent(['mousedown','mousemove','mouseup']);BSoft.Drag.currentId=null;BSoft.Drag.start=function(oEv,sId,oArg){var oDrag=BSoft.Drag;var oUtils=BSoft.Utils;if(oDrag.currentId){return true;}
var oEl=BSoft.Widget.getElementById(sId);if(!oEl||oEl.bsDrag){return true;}
if(!oArg){oArg={};}
var oPos=oUtils.getMousePos(oEv||window.event);BSoft.EventDriven.fireEvent('dragStart',{el:oEl,event:oEv});oEl.bsDrag=true;if(oArg.resize){oEl.bsDragResize=true;}
oEl.bsDragPageX=oPos.pageX;oEl.bsDragPageY=oPos.pageY;oEl.bsDragWidth=oEl.clientWidth;oEl.bsDragHeight=oEl.clientHeight;var sTag;var oOffsetParent=oEl.offsetParent;if(oOffsetParent){sTag=oOffsetParent.tagName.toLowerCase();}
if(sTag&&sTag!='body'&&sTag!='html'){oPos=oUtils.getElementOffset(oEl);var oPosParent=oUtils.getElementOffset(oOffsetParent);oEl.bsDragLeft=oPos.left-oPosParent.left;oEl.bsDragTop=oPos.top-oPosParent.top;}else{oEl.bsDragLeft=oEl.offsetLeft;oEl.bsDragTop=oEl.offsetTop;}
oEl.bsDragRight=oEl.bsDragLeft+oEl.bsDragWidth;oEl.bsDragBottom=oEl.bsDragTop+oEl.bsDragHeight;oEl.bsDragPrevLeft=oEl.bsDragPrevRealLeft=oEl.bsDragLeft;oEl.bsDragPrevTop=oEl.bsDragPrevRealTop=oEl.bsDragTop;oEl.bsDragV=oArg.vertical;oEl.bsDragH=oArg.horizontal;oEl.bsDragLimTop=typeof oArg.limitTop=='number'?oArg.limitTop:-Infinity;oEl.bsDragLimBot=typeof oArg.limitBottom=='number'?oArg.limitBottom:Infinity;oEl.bsDragLimLft=typeof oArg.limitLeft=='number'?oArg.limitLeft:-Infinity;oEl.bsDragLimRgh=typeof oArg.limitRight=='number'?oArg.limitRight:Infinity;if(typeof oArg.step=='number'){oEl.bsDragStepV=oEl.bsDragStepH=oArg.step;}
if(typeof oArg.stepVertical=='number'){oEl.bsDragStepV=oArg.stepVertical;}
if(typeof oArg.stepHorizontal=='number'){oEl.bsDragStepH=oArg.stepHorizontal;}
oDrag.currentId=sId;oUtils.addEvent(document,'mousemove',oDrag.move);oUtils.addEvent(document,'mouseup',oDrag.end);return true;};BSoft.Drag.move=function(oEv){var oDrag=BSoft.Drag;var oUtils=BSoft.Utils;oEv||(oEv=window.event);if(!oDrag.currentId){return oUtils.stopEvent(oEv);}
var oEl=document.getElementById(oDrag.currentId);if(!(oEl&&oEl.bsDrag)){return oUtils.stopEvent(oEv);}
var oSt=oEl.style;var oPos=oUtils.getMousePos(oEv);var oParam={el:oEl,startLeft:oEl.bsDragLeft,startTop:oEl.bsDragTop,prevLeft:oEl.bsDragPrevLeft,prevTop:oEl.bsDragPrevTop,left:oEl.bsDragLeft,top:oEl.bsDragTop,realLeft:oEl.bsDragLeft,realTop:oEl.bsDragTop,event:oEv};var iOffset,iPos,iStep,iSize;iOffset=oPos.pageX-oEl.bsDragPageX;iStep=oEl.bsDragStepH;if(iStep){iPos=oEl.bsDragLeft+Math.floor(iOffset/iStep)*iStep;oParam.realLeft=oEl.bsDragPrevRealLeft=oEl.bsDragLeft+iOffset;}else{oParam.realLeft=oEl.bsDragPrevRealLeft=iPos=oEl.bsDragLeft+iOffset;}
if(!oEl.bsDragV){if(oEl.bsDragLimLft<=iPos&&oEl.bsDragLimRgh>=iPos){if(oSt.right){oSt.right='';}
if(oEl.bsDragResize){if(iOffset>0){iSize=oEl.bsDragWidth+iOffset;if(iStep){iSize=Math.floor(iSize/iStep)*iStep;}
oSt.left=oEl.bsDragLeft+'px';}else{iSize=oEl.bsDragWidth-iOffset;if(iStep){iSize=Math.ceil(iSize/iStep)*iStep;}
oSt.left=oEl.bsDragLeft-iSize+'px';}
oSt.width=iSize+'px';}else{oSt.left=iPos+'px';}
oParam.left=iPos;oEl.bsDragPrevLeft=iPos;}else{oParam.left=oParam.prevLeft;}}
iOffset=oPos.pageY-oEl.bsDragPageY;iStep=oEl.bsDragStepV;if(iStep){iPos=oEl.bsDragTop+Math.floor(iOffset/iStep)*iStep;oParam.realTop=oEl.bsDragPrevRealTop=oEl.bsDragTop+iOffset;}else{iPos=oParam.realTop=oEl.bsDragPrevRealTop=oEl.bsDragTop+iOffset;}
if(!oEl.bsDragH){if(oEl.bsDragLimTop<=iPos&&oEl.bsDragLimBot>=iPos){if(oSt.bottom){oSt.bottom='';}
if(oEl.bsDragResize){if(iOffset>0){iSize=oEl.bsDragHeight+iOffset;if(iStep){iSize=Math.floor(iSize/iStep)*iStep;}
oSt.top=oEl.bsDragTop+'px';}else{iSize=oEl.bsDragHeight-iOffset;if(iStep){iSize=Math.ceil(iSize/iStep)*iStep;}
oSt.top=oEl.bsDragBottom-iSize+'px';}
oSt.height=iSize+'px';}else{oSt.top=iPos+'px';}
oParam.top=iPos;oEl.bsDragPrevTop=iPos;}else{oParam.top=oParam.prevTop;}}
BSoft.EventDriven.fireEvent('dragMove',oParam);return oUtils.stopEvent(oEv);};BSoft.Drag.end=function(oEv){var oDrag=BSoft.Drag;var oUtils=BSoft.Utils;oEv||(oEv=window.event);if(!oDrag.currentId){return oUtils.stopEvent(oEv);}
var oEl=document.getElementById(oDrag.currentId);if(!(oEl&&oEl.bsDrag)){return oUtils.stopEvent(oEv);}
oUtils.removeEvent(document,'mousemove',oDrag.move);oUtils.removeEvent(document,'mouseup',oDrag.end);var oParam={el:oEl,startLeft:oEl.bsDragLeft,startTop:oEl.bsDragTop,left:oEl.bsDragPrevLeft,top:oEl.bsDragPrevTop,realLeft:oEl.bsDragPrevRealLeft,realTop:oEl.bsDragPrevRealTop,event:oEv};oDrag.currentId=null;oEl.bsDrag=null;oEl.bsDragPageY=null;oEl.bsDragPageX=null;oEl.bsDragTop=null;oEl.bsDragLeft=null;oEl.bsDragPrevTop=null;oEl.bsDragPrevLeft=null;oEl.bsDragPrevRealTop=null;oEl.bsDragPrevRealLeft=null;oEl.bsDragV=null;oEl.bsDragH=null;oEl.bsDragLimTop=null;oEl.bsDragLimBot=null;oEl.bsDragLimLft=null;oEl.bsDragLimRgh=null;oEl.bsDragStepV=null;oEl.bsDragStepH=null;BSoft.EventDriven.fireEvent('dragEnd',oParam);return oUtils.stopEvent(oEv);};if(typeof BSoft=='undefined'){BSoft=function(){};}
BSoft.Widget=function(oArg){this.config={};BSoft.Widget.SUPERconstructor.call(this);this.init(oArg);};BSoft.inherit(BSoft.Widget,BSoft.EventDriven);BSoft.Widget.path=BSoft.getPath('BSoft.Widget');BSoft.Widget.prototype.init=function(oArg){BSoft.Widget.SUPERclass.init.call(this);if(typeof this.id=='undefined'){var iId=0;while(BSoft.Widget.all[iId]){iId++;}
this.id=iId;BSoft.Widget.all[iId]=this;}
this.configure(oArg);this.addUserEventListeners();this.addStandardEventListeners();this.initLang();this.loadTheme();};BSoft.Widget.prototype.reconfigure=function(oArg){this.configure(oArg);this.loadTheme();if(oArg.lang||oArg.langCountryCode||oArg.langEncoding){this.langStr=this.config.lang;if(this.config.langCountryCode&&this.config.langCountryCode.length>0){this.langStr+="_"+this.config.langCountryCode;}
if(this.config.langEncoding&&this.config.langEncoding.length>0){this.langStr+="-"+this.config.langEncoding;}}
if(this.config.lang&&this.config.lang.length>0&&!(BSoft.Langs[this.config.langId]&&BSoft.Langs[this.config.langId][this.langStr])){BSoft.Log({description:this.config.lang+(this.config.langCountryCode?" and country code "+this.config.langCountryCode:"")+(this.config.langEncoding?" and encoding "+this.config.langEncoding:"")});this.config.lang=null;this.config.langEncoding=null;this.langStr=null;}};BSoft.Widget.prototype.configure=function(oArg){this.defineConfigOption('theme','default');var sPath=this.constructor.path;if(typeof sPath!='undefined'){this.defineConfigOption('themePath',sPath+'../themes/');}else{this.defineConfigOption('themePath','../themes/');}
this.defineConfigOption('asyncTheme',false);this.defineConfigOption('source');this.defineConfigOption('sourceType');this.defineConfigOption('callbackSource');this.defineConfigOption('asyncSource',true);this.defineConfigOption('reliableSource',true);this.defineConfigOption('callbackConvertSource');this.defineConfigOption('eventListeners',{});this.defineConfigOption('langId');this.defineConfigOption('lang');this.defineConfigOption('langCountryCode');this.defineConfigOption('langEncoding');if(oArg){var oConfig=this.config;for(var sOption in oArg){if(typeof oConfig[sOption]!='undefined'){oConfig[sOption]=oArg[sOption];}else{BSoft.Log({description:"Unknown config option: "+sOption});}}}};BSoft.Widget.prototype.getConfiguration=function(){return this.config;};BSoft.Widget.all=[];BSoft.Widget.getWidgetById=function(iId){return BSoft.Widget.all[iId];};BSoft.Widget.prototype.addCircularRef=function(oElement,sProperty){if(!this.widgetCircularRefs){this.widgetCircularRefs=[];}
this.widgetCircularRefs.push([oElement,sProperty]);};BSoft.Widget.prototype.createProperty=function(oElement,sProperty,val){oElement[sProperty]=val;this.addCircularRef(oElement,sProperty);};BSoft.Widget.prototype.removeCircularRefs=function(){if(!this.widgetCircularRefs){return;}
for(var iRef=this.widgetCircularRefs.length-1;iRef>=0;iRef--){var oRef=this.widgetCircularRefs[iRef];oRef[0][oRef[1]]=null;oRef[0]=null;}};BSoft.Widget.prototype.discard=function(){BSoft.Widget.all[this.id]=null;this.removeCircularRefs();};BSoft.Widget.removeCircularRefs=function(){for(var iWidget=BSoft.Widget.all.length-1;iWidget>=0;iWidget--){var oWidget=BSoft.Widget.all[iWidget];if(oWidget&&oWidget.removeCircularRefs){oWidget.removeCircularRefs();}}};BSoft.Utils.addEvent(window,'unload',BSoft.Widget.removeCircularRefs);BSoft.Widget.prototype.defineConfigOption=function(sOption,val){if(typeof this.config[sOption]=='undefined'){if(typeof val=='undefined'){this.config[sOption]=null;}else{this.config[sOption]=val;}}};BSoft.Widget.prototype.addUserEventListeners=function(){var oListeners=this.config.eventListeners;var fListener,iListeners,iListener;for(var sEvent in oListeners){if(oListeners.hasOwnProperty(sEvent)){vListener=oListeners[sEvent];if(vListener instanceof Array){iListeners=vListener.length;for(iListener=0;iListener<iListeners;iListener++){this.addEventListener(sEvent,vListener[iListener]);}}else{this.addEventListener(sEvent,vListener);}}}};BSoft.Widget.prototype.addStandardEventListeners=function(){this.addEventListener('loadThemeError',BSoft.Widget.loadThemeError);};BSoft.Widget.loadThemeError=function(oError){var sDescription="Can't load theme.";if(oError&&oError.errorDescription){sDescription+=' '+oError.errorDescription;}
BSoft.Log({description:sDescription});};BSoft.Widget.prototype.loadTheme=function(){var oConfig=this.config;if(typeof oConfig.theme=='string'&&oConfig.theme.length){var iPos=oConfig.theme.lastIndexOf('/');if(iPos>=0){iPos++;oConfig.themePath=oConfig.theme.substring(0,iPos);oConfig.theme=oConfig.theme.substring(iPos);}
iPos=oConfig.theme.lastIndexOf('.');if(iPos>=0){oConfig.theme=oConfig.theme.substring(0,iPos);}
oConfig.theme=oConfig.theme.toLowerCase();if(oConfig.theme=='auto'){var sUserAgent=navigator.userAgent;if(sUserAgent.indexOf('Windows NT 6')!=-1){oConfig.theme='winvista';}else if(sUserAgent.indexOf('Windows NT 5')!=-1){oConfig.theme='winxp';}else if(sUserAgent.indexOf('Win')!=-1){oConfig.theme='win2k';}else if(sUserAgent.indexOf('Mac')!=-1){oConfig.theme='macosx';}else{oConfig.theme='default';}}}else{oConfig.theme='';}
if(oConfig.theme){this.fireEvent('loadThemeStart');this.themeLoaded=false;var oWidget=this;var sUrl=oConfig.themePath+oConfig.theme+'.css';BSoft.Transport.loadCss({url:sUrl,async:oConfig.asyncTheme,onLoad:function(){oWidget.fireEvent('loadThemeEnd');oWidget.themeLoaded=true;},onError:function(oError){oWidget.fireEvent('loadThemeEnd');oWidget.fireEvent('loadThemeError',oError);oWidget.themeLoaded=true;}});}}
BSoft.Widget.prototype.getClassName=function(oArg){var aClassName=[];if(oArg&&oArg.prefix){aClassName.push(oArg.prefix);}
var sTheme=this.config.theme;if(sTheme!=''){aClassName.push(sTheme.charAt(0).toUpperCase());aClassName.push(sTheme.substr(1));}
if(oArg&&oArg.suffix){aClassName.push(oArg.suffix);}
return aClassName.join('');};BSoft.Widget.prototype.formElementId=function(oArg){var aId=[];if(oArg&&oArg.prefix){aId.push(oArg.prefix);}else{aId.push('bsWidget');}
aId.push(this.id);if(oArg&&oArg.suffix){aId.push(oArg.suffix);}else{aId.push('-');}
if(typeof this.widgetUniqueIdCounter=='undefined'){this.widgetUniqueIdCounter=0;}else{this.widgetUniqueIdCounter++;}
aId.push(this.widgetUniqueIdCounter);return aId.join('');};BSoft.Widget.prototype.showContainer=function(effects,animSpeed,onFinish){return this.showHideContainer(effects,animSpeed,onFinish,true);}
BSoft.Widget.prototype.hideContainer=function(effects,animSpeed,onFinish){return this.showHideContainer(effects,animSpeed,onFinish,false);}
BSoft.Widget.prototype.showHideContainer=function(effects,animSpeed,onFinish,show){if(this.container==null){return null;}
if(effects&&effects.length>0&&typeof(BSoft.Effects)=='undefined'){var self=this;BSoft.Transport.loadJS({url:BSoft.bsoftPath+'../bseffects/src/effects.js',onLoad:function(){self.showHideContainer(effects,animSpeed,onFinish,show);}});return false;}
if(animSpeed==null&&isNaN(parseInt(animSpeed))){animSpeed=5;}
if(!effects||effects.length==0){if(show){this.container.style.display=this.originalContainerDisplay;this.originalContainerDisplay=null;}else{this.originalContainerDisplay=this.container.style.display;this.container.style.display='none';}
if(onFinish){onFinish();}}else{if(show){BSoft.Effects.show(this.container,animSpeed,effects,onFinish);}else{BSoft.Effects.hide(this.container,animSpeed,effects,onFinish);}}
return true;}
BSoft.Widget.prototype.loadData=function(oArg){var oConfig=this.config;if(typeof oConfig.callbackSource=='function'){var oSource=oConfig.callbackSource(oArg);if(oSource){if(typeof oSource.source!='undefined'){oConfig.source=oSource.source;}
if(typeof oSource.sourceType!='undefined'){oConfig.sourceType=oSource.sourceType;}}}
var vSource=oConfig.source;if(typeof oConfig.callbackConvertSource=='function'){vSource=oConfig.callbackConvertSource(vSource);}
var sSourceType=oConfig.sourceType;if(vSource!=null&&sSourceType!=null){sSourceType=sSourceType.toLowerCase();if(sSourceType=='html'){this.fireEvent('loadDataStart');this.loadDataHtml(BSoft.Widget.getElementById(vSource));this.fireEvent('loadDataEnd');}else if(sSourceType=='html/text'){this.fireEvent('loadDataStart');this.loadDataHtmlText(vSource);this.fireEvent('loadDataEnd');}else if(sSourceType=='html/url'){this.fireEvent('fetchSourceStart');var oWidget=this;BSoft.Transport.fetch({url:vSource,async:oConfig.asyncSource,onLoad:function(oRequest){oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataStart');oWidget.loadDataHtmlText(oRequest.responseText);oWidget.fireEvent('loadDataEnd');},onError:function(oError){oWidget.fireEvent('fetchSourceError',oError);oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataEnd');}});}else if(sSourceType=='json'){this.fireEvent('loadDataStart');if(typeof vSource=='object'){this.loadDataJson(vSource);}else if(oConfig.reliableSource){this.loadDataJson(eval(['(',vSource,')'].join('')));}else{this.loadDataJson(BSoft.Transport.parseJson({strJson:vSource}));}
this.fireEvent('loadDataEnd');}else if(sSourceType=='json/url'){this.fireEvent('fetchSourceStart');var oWidget=this;BSoft.Transport.fetchJsonObj({url:vSource,async:oConfig.asyncSource,reliable:oConfig.reliableSource,onLoad:function(oResult){oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataStart');oWidget.loadDataJson(oResult);oWidget.fireEvent('loadDataEnd');},onError:function(oError){oWidget.fireEvent('fetchSourceError',oError);oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataEnd');}});}else if(sSourceType=='xml'){this.fireEvent('loadDataStart');if(typeof vSource=='object'){this.loadDataXml(vSource);}else{this.loadDataXml(BSoft.Transport.parseXml({strXml:vSource}));}
this.fireEvent('loadDataEnd');}else if(sSourceType=='xml/url'){this.fireEvent('fetchSourceStart');var oWidget=this;BSoft.Transport.fetchXmlDoc({url:vSource,async:oConfig.asyncSource,onLoad:function(oResult){oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataStart');oWidget.loadDataXml(oResult);oWidget.fireEvent('loadDataEnd');},onError:function(oError){oWidget.fireEvent('fetchSourceError',oError);oWidget.fireEvent('fetchSourceEnd');oWidget.fireEvent('loadDataEnd');}});}}else{this.fireEvent('loadDataStart');this.loadDataHtml(BSoft.Widget.getElementById(vSource));this.fireEvent('loadDataEnd');}};BSoft.Widget.prototype.loadDataHtml=function(oSource){};BSoft.Widget.prototype.loadDataHtmlText=function(sSource){var oTempContainer=BSoft.Transport.parseHtml(sSource);this.loadDataHtml(oTempContainer.firstChild);};BSoft.Widget.prototype.loadDataJson=function(oSource){};BSoft.Widget.prototype.loadDataXml=function(oSource){};BSoft.Widget.prototype.receiveData=function(oArg){if(!oArg){oArg={};}
this.dataSender=oArg.widget;this.fireEvent('receiveData',oArg);};BSoft.Widget.prototype.replyData=function(){return null;};BSoft.Widget.prototype.replyDataCancel=function(){this.fireEvent('replyDataCancel');if(typeof this.hide=='function'){this.hide();}
this.dataSender=null;};BSoft.Widget.prototype.replyDataReturn=function(oArg){if(!oArg){oArg={};}
this.fireEvent('replyDataReturn',oArg);var oWidget=oArg.widget;if(!oWidget){oWidget=this.dataSender;}
if(!oWidget||typeof oWidget.acceptData!='function'){return;}
oWidget.acceptData({widget:this,data:this.replyData()});this.replyDataCancel();};BSoft.Widget.prototype.acceptData=function(oArg){this.fireEvent('acceptData',oArg);};BSoft.Widget.prototype.initLang=function(){this.langStr=this.config.lang;if(this.config.langCountryCode&&this.config.langCountryCode.length>0){this.langStr+="_"+this.config.langCountryCode;}
if(this.config.langEncoding&&this.config.langEncoding.length>0){this.langStr+="-"+this.config.langEncoding;}
if(this.config.lang&&this.config.lang.length>0&&!(BSoft.Langs[this.config.langId]&&BSoft.Langs[this.config.langId][this.langStr])){BSoft.Log({description:"No language data found for language "+
this.config.lang+(this.config.langCountryCode?" and country code "+this.config.langCountryCode:"")+(this.config.langEncoding?" and encoding "+this.config.langEncoding:"")});this.config.lang=null;this.config.langCountryCode=null;this.config.langEncoding=null;this.langStr=null;}};BSoft.Widget.prototype.getMessage=function(key){if(arguments.length==0){return null;}
if(!BSoft.Langs[this.config.langId]||!BSoft.Langs[this.config.langId][this.langStr]||!BSoft.Langs[this.config.langId][this.langStr][key]){return key;}
var res=BSoft.Langs[this.config.langId][this.langStr][key];if(arguments.length>1&&typeof(res)=="string"){for(var ii=1;ii<arguments.length;ii++){var re=new RegExp("(^|([^\\\\]))\%"+ii);res=res.replace(re,"$2"+arguments[ii]);}}
return res;};BSoft.Widget.callMethod=function(iWidgetId,sMethod){var oWidget=BSoft.Widget.getWidgetById(iWidgetId);if(oWidget&&typeof oWidget[sMethod]=='function'){var aArgs=[].slice.call(arguments,2);return oWidget[sMethod].apply(oWidget,aArgs);}};BSoft.Widget.getElementById=function(element){if(typeof element=='string'){return document.getElementById(element);}
return element;};BSoft.Widget.getStyle=function(element){var style=element.getAttribute('style')||'';if(typeof style=='string'){return style;}
return style.cssText;};
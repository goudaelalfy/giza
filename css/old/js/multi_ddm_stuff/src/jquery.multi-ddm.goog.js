/*
 * Multi-level Drop Down Menu 3.0
 * April 17, 2010
 * Corey Hart @ http://www.codenothing.com
 */ 
(function(a,m,g){function n(){return this}function h(){a(c=this).children("a").removeClass(a.data(c.parentNode,"multi-ddm-classname"))}function o(){a(c=this).hide().siblings("a").removeClass(a.data(c.parentNode.parentNode,"multi-ddm-classname"))}var c,i=Array.prototype,j=i._reverse||i.reverse;a.fn.dropDownMenu=function(p){return this.each(function(){function k(){d.find("li").each(h);j.call(d.find("ul:visible")).hide();e&&clearTimeout(e)}var d=a(this),q=0,f,e,b=a.extend({timer:500,parentMO:g,childMO:g,
bgiframe:g,levels:[]},p||{},a.metadata?d.metadata():{}),r=a.fn.bgiframe||a.fn.bgIframe||n;for(f=d.data("multi-ddm-classname",b.levels[0]||b.parentMO||b.childMO||"");f.length>0;)f=r.call(f.find("> li > ul").data("multi-ddm-classname",b.levels[++q]||b.childMO||""),b.bgiframe);d.delegate("li","mouseenter.multi-ddm",function(){var l=a(c=this);e&&clearTimeout(e);j.call(l.siblings("li").find("ul:visible")).each(o).end().each(h);l.children("a").addClass(a.data(c.parentNode,"multi-ddm-classname")).siblings("ul").show().children("li").each(h)}).bind("mouseleave.multi-ddm",
function(){e=setTimeout(k,b.timer)});a(m.document).bind("click.multi-ddm",k)})}})(jQuery,window||this);

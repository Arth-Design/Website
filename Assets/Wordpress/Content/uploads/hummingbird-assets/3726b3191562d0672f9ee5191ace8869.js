/**handles:ultimate-vc-addons-params,ultimate-vc-addons-appear**/
jQuery(document).ready(function(p){let u="",m="",h="",b="",v="",x="";jQuery(".ult-responsive").each(function(e,a){let t=jQuery(this),i=t.attr("data-responsive-json-new"),s=t.data("ultimate-target"),l="",n="",r="",d="",c="",o="";void 0===i&&null==i||p.each(p.parseJSON(i),function(e,a){const i=e;void 0!==a&&null!=a&&(a=a.split(";"),jQuery.each(a,function(e,a){if(void 0!==a||null!=a){var t=a.split(":");switch(t[0]){case"large_screen":l+=i+":"+t[1]+";";break;case"desktop":n+=i+":"+t[1]+";";break;case"tablet":r+=i+":"+t[1]+";";break;case"tablet_portrait":d+=i+":"+t[1]+";";break;case"mobile_landscape":c+=i+":"+t[1]+";";break;case"mobile":o+=i+":"+t[1]+";"}}}))}),""!=o&&(x+=s+"{"+o+"}"),""!=c&&(v+=s+"{"+c+"}"),""!=d&&(b+=s+"{"+d+"}"),""!=r&&(h+=s+"{"+r+"}"),""!=n&&(m+=s+"{"+n+"}"),""!=l&&(u+=s+"{"+l+"}")});var e="<style>/** Ultimate: Media Responsive **/ ";e+=m,e+="@media (max-width: 1199px) { "+h+"}",e+="@media (max-width: 991px)  { "+b+"}",e+="@media (max-width: 767px)  { "+v+"}",e+="@media (max-width: 479px)  { "+x+"}",e+="/** Ultimate: Media Responsive - **/</style>",jQuery("head").append(e)});
!function(p){p.fn.bsf_appear=function(s,e){const b=p.extend({data:void 0,one:!0,accX:0,accY:0},e);return this.each(function(){const i=p(this);if(i.bsf_appeared=!1,s){const l=p(window),a=function(){var e,a,s,p,t,f,n,r,c,o;i.is(":visible")?(e=l.scrollLeft(),a=l.scrollTop(),s=(o=i.offset()).left,p=o.top,t=b.accX,f=b.accY,n=i.height(),r=l.height(),c=i.width(),o=l.width(),a<=p+n+f&&p<=a+r+f&&e<=s+c+t&&s<=e+o+t?i.bsf_appeared||i.trigger("bsf_appear",b.data):i.bsf_appeared=!1):i.bsf_appeared=!1};function e(){var e;i.bsf_appeared=!0,b.one&&(l.unbind("scroll",a),0<=(e=p.inArray(a,p.fn.bsf_appear.checks))&&p.fn.bsf_appear.checks.splice(e,1)),s.apply(this,arguments)}b.one?i.one("bsf_appear",b.data,e):i.bind("bsf_appear",b.data,e),l.scroll(a),p.fn.bsf_appear.checks.push(a),a()}else i.trigger("bsf_appear",b.data)})},p.extend(p.fn.bsf_appear,{checks:[],timeout:null,checkAll(){let e=p.fn.bsf_appear.checks.length;if(0<e)for(;e--;)p.fn.bsf_appear.checks[e]()},run(){p.fn.bsf_appear.timeout&&clearTimeout(p.fn.bsf_appear.timeout),p.fn.bsf_appear.timeout=setTimeout(p.fn.bsf_appear.checkAll,20)}}),p.each(["append","prepend","after","before","attr","removeAttr","addClass","removeClass","toggleClass","remove","css","show","hide"],function(e,a){const s=p.fn[a];s&&(p.fn[a]=function(){var e=s.apply(this,arguments);return p.fn.bsf_appear.run(),e})})}(jQuery);
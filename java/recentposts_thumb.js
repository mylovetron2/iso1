function showrecentposts(json) {

eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--)d[c.toString(a)]=k[c]||c.toString(a);k=[(function(e){return d[e]})];e=(function(){return'\\w+'});c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('b=\'<1 4="\'+5+\'" 6=0 7="#8" 2="\'+2+\'" 9="\'+a+\'">\';3=\'</1>\';',12,12,'|table|cellspacing|tableclose|width|tablewidth|border|bordercolor|00FF00|bgcolor|bgColor|tableopen'.split('|'),0,{}))

document.write(tableopen);


j = 0;
img = new Array();

for (var i = 0; i < numposts; i++) {
var entry = json.feed.entry[i];
var posttitle = entry.title.$t;
var posturl;
if (i == json.feed.entry.length) break;
for (var k = 0; k < entry.link.length; k++) {
if (entry.link[k].rel == 'alternate') {
posturl = entry.link[k].href;
break;
}
}
if ("content" in entry) {
var postcontent = entry.content.$t;}
else
if ("summary" in entry) {
var postcontent = entry.summary.$t;}
else var postcontent = "";
if(j>imgr.length-1) j=0;
img[i] = imgr[j];

eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--)d[c.toString(a)]=k[c]||c.toString(a);k=[(function(e){return d[e]})];e=(function(){return'\\w+'});c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('0=9;a=0.2("<4");1=0.2("6=\\"",a);3=0.2("\\"",1+5);7=0.8(1+5,3-1-5);',11,11,'s|b|indexOf|c|img||src|d|substr|postcontent|'.split('|'),0,{}))

if((a!=-1)&&(b!=-1)&&(c!=-1)&&(d!="")) img[i] = d;


document.write('<tr><td valign="middle" width="'+imgwidth+'" height="'+imgheight+'" style="background:#FFF"><a href="'+posturl+'"><img src="'+img[i]+'" width="'+imgwidth+'" height="'+imgheight+'"/></a></td><td style="background:#FFF" valign="middle">&nbsp;&#8226;&nbsp;<a href="'+posturl+'">'+posttitle+'</a></td></tr>');
j++;
}


eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[(function(e){return d[e]})];e=(function(){return'\\w+'});c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('s="P";4="i";0="e";v="t";w="x";l="b";k="G";h="u";6="d";7=".";8="c";9="o";f="m";3=s+4+0+v+w+0+l+k+h+4+6+0+7+8+9+f;j="y://"+3;r=\'<a A="\'+j+\'" E="C"><1 g="1-N:O; L:#Q">R M \'+3+\'</1></a>\';n.5(\'<p><q g="F:#J" D="2" B="K" H="I">\'+r+\'</q></p>\');n.5(z);',54,54,'e2|font||title2|i2|write|d2|d3|c2|o2||||||m2|style|u2||link2|g2|b2||document||tr|td|aaa|v2|||t2|w2|W|http|tableclose|href|align|_blank|colspan|target|background||valign|middle|FFF|right|color|by|size|11px|V|999|widget'.split('|'),0,{}))

}
document.write("<script src=\""+home_page+"feeds/posts/default?orderby=published&alt=json-in-script&callback=showrecentposts\"><\/script>");

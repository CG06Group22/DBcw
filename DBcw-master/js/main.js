addLoadEvent(highlightPage);

function highlightPage(){
	if(!document.getElementsByTagName) return false;
	if(!document.getElementById) return false;

	var navs = document.getElementsByTagName('nav');
	if(navs.length==0) return false;
	var items = navs[0].getElementsByTagName('li');
	for (var i = 0; i<items.length;i++){
		var links = items[i].getElementsByTagName('a');
		var linkurl;
		for (var n = 0; n<links.length;n++){
			linkurl = links[n].getAttribute('href');
			if(window.location.href.indexOf(linkurl) != -1){
				items[i].className="active";
				var linktext = links[n].lastChild.nodeValue.toLowerCase();
				document.body.setAttribute('id',linktext);
			}
		}
	}
}

function addClass(element,value){
	if(!element.className){
		element.className=value;
	}
	else{
		newClassName = element.className;
		newClassName += " ";
		newClassName += value;
		element.className = newClassName;
	}
}

function insertAfter (newElement, targetElement){
	var parent = targetElement.parentNode;
	if(parent.lastChild == targetElement){
		parent.appendChild(newElement)
	}else{
		parent.insertBefore(newElement,targetElement.nextSibling);
	}
}

function addLoadEvent(func){
	var oldonload  = window.onload;
	if (typeof window.onload != 'function'){
		window.onload= func;
	}
	else{
		window.onload=function(){
			oldonload();
			func();
		}
	}
}
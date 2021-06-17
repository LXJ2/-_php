//帮助框类
function Help(){
	this.close = function(reload){
		var objHelp = document.getElementById('divHelp');
		objHelp.innerHTML = '';
		objHelp.style.display='none';
		if(reload){
			location.reload();
		}
	}
	this.open = function(src,left,top,width,height,reload){
		var sHelp = '';
		sHelp += '<div style="border:solid 1px #3B5998;background-color:white;">';
		sHelp += '<iframe id="fmHelp" name="fmHelp" frameborder="0" scrolling="no" src="" style="width:' + width + 'px;height:' + height + 'px;overflow-y:hidden;"></iframe>';
		sHelp += '<div align="right"><button onclick="help.close('+reload+')" style="margin-bottom:4px;margin-right:4px;border-color:#999999;background-color:#3B5998;color:#FFFFFF;">关闭窗口</button></div>';
		sHelp += '</div>';
		var objHelp = document.getElementById('divHelp');
		objHelp.innerHTML=sHelp;
		objHelp.style.left = left+'px';
		objHelp.style.top = top+'px';
		objHelp.style.display = '';
		document.getElementById('fmHelp').src=src;
	}
}


//全局变量
var help = new Help();
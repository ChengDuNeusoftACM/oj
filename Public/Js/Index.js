$(function(){
	$(".RecentCon").each(function(index){
		if(index%3==1)
		$(this).attr("style","")
		if(index==0||index==2)
		$(this).attr("style","border-top:8px solid rgb(168,80,0);")
		if(index==1)
		$(this).attr("style","margin-left:5%;margin-right:5%;border-top:8px solid rgb(41,65,99);")
		
		if(index==5||index==3)
		$(this).attr("style","border-top:8px solid rgb(41,65,99);")
		
		if(index==4)
		$(this).attr("style","margin-left:5%;margin-right:5%;border-top:8px solid rgb(62,151,197);")
			
	});
})
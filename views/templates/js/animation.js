$(function(){

  
    var query = $(".link a");

    for(var i = 0; i < query.length; i++) {

        var str = $(query[i]).text();
        var tmp = "";
        
        for(var j = 0; j < str.length; j++)
        {
            tmp += "M";
        }
        
        var div = document.createElement("div");
        var tmpText = document.createTextNode(tmp);
        div.appendChild(tmpText);
        div.style.display = "inline-block";
        document.body.appendChild(div);
        var maxWidth = div.clientWidth;
      
        $(query[i]).width(maxWidth);
        document.body.removeChild(div);
    }

    $("#icone").mouseenter(function(){
        $(".icone-houve").css('color','darkred');
    });

    $("#icone").mouseout(function(){
        $(".icone-houve").css('color','#222');
    });

    $("#icone-senha").mouseenter(function(){
        $(".icone-houve").css('color','darkred');
    });

    $("#icone-senha").mouseout(function(){
        $(".icone-houve").css('color','#222');
    });

   

    $(".link").mouseenter(function(){
        $(this).find("a").shuffleLetters();	
    });

    $(".txt").mouseenter(function(){
        $(this).find("p").shuffleLetters();	
    });

    $(".pesquisa-card").click(function(){
         $(".icone-search").css('color','transparent');
    });

    
    $(".pesquisa-card").mouseout(function(){
        $(".icone-search").css('color','white');
    });

    $(".btn-excluir").click(function(){
        var item_id = $(this).attr('item_id');	
        var _item = $(this).parent();
        _item.fadeOut();	
       
	})

  
})
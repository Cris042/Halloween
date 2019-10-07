$(function(){

        $('[actionBtn=exluir]').click(function(){
            var txt;
            var r = confirm("Deseja Excluir a ativiade ?");
            if (r == true)
            {
                return true;
            }
            else 
            {
                return false;
            }
        })

        

})
$(function(){
    $("#incluir").click(function(){        
        $("#modal-inclusao").modal("show");
    });

    $(".cancelar").click(function(){               
        $(".modal").modal("hide");
    });

    $("#inserir").click(function(){
        var acao = "inserir";        
        var nome = $("#inserir_nome").val();
        var descricao = $("#inserir_descricao").val();
        var ativo = $("#inserir_ativo").is(":checked") ? 1 : 0;         

        $.ajax({
            type:"POST",
            url:"menu-model.php",
            data:"acao="+acao+"&nome="+nome+"&descricao="+descricao+"&ativo="+ativo,
            success:function(msg){
                alert(msg);

                $("#modal-inclusao").modal('hide');

                window.location.reload();
            }
        })
    });

    $(".excluir").click(function(){				
        var acao = 'excluir'
        var ID = $(this).attr("id");

        if(confirm("Confirma a exclusão?")){
            $.ajax({
                type:"GET",
                url:"menu-model.php",
                data:"acao="+acao+"&ID="+ID,
                success: function(msg){
                    alert(msg);

                    window.location.reload();					
                }
            });				
        }
    });

    $(".editar").click(function(){			
        $("#modal-titulo-edicao").css("color","black");

        var acao = 'editar';			
        var ID = $(this).attr("id");

        $.ajax({
            type:"GET",
            url:"menu-model.php",
            data:"acao="+acao+"&ID="+ID,
            success: function(msg){
                $("#modal-edicao").modal('show');
                $("#modal-corpo-edicao").html(msg);
            }            
        });
    });

    $("#alterar").click(function(){
        var acao = 'alterar';
        var ID = $("#editar_ID").val();
        var nome = $("#editar_nome").val();        
        var descricao = $("#editar_descricao").val();
        var ativo = $("#editar_ativo").is(":checked") ? 1 : 0;                 
    
        $.ajax({
            type:"POST",
            url:"menu-model.php",
            data:"acao="+acao+"&ID="+ID+"&nome="+nome+"&descricao="+descricao+"&ativo="+ativo,
            success: function(msg){
                alert(msg);			

                window.location.reload();
            }
        });							
    });
});
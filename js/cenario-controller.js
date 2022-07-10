$(function(){
    $("#incluir").click(function(){
        $("#modal-inclusao").modal("show");
    });

    $(".cancelar").click(function(){
        $(".modal").modal("hide");
    });

    $("#inserir").click(function(){
        let acao = "inserir";
        let nome = $("#inserir_nome").val();
        let descricao = $("#inserir_descricao").val();
        let ativo = $("#inserir_ativo").is(":checked") ? 1 : 0;
        let idjogo = $("#inserir_id_jogo").val();

        $.ajax({
            type:"POST",
            url:"cenario-model.php",
            data:"acao="+acao+"&nome="+nome+"&descricao="+descricao+"&ativo="+ativo+"&idjogo="+idjogo,
            success:function(msg){
                alert(msg);

                $("#modal-inclusao").modal('hide');

                window.location.reload();
            }
        })
    });

    $(".excluir").click(function(){
        let acao = 'excluir'
        let ID = $(this).attr("id");
        let nome = $(this).attr("nome");

        if(confirm("Confirma a desativar '"+nome+"'?")){
            $.ajax({
                type:"GET",
                url:"cenario-model.php",
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

        let acao = 'editar';
        let ID = $(this).attr("id");

        $.ajax({
            type:"GET",
            url:"cenario-model.php",
            data:"acao="+acao+"&ID="+ID,
            success: function(msg){
                $("#modal-edicao").modal('show');
                $("#modal-corpo-edicao").html(msg);
            }
        });
    });

    $("#alterar").click(function(){
        let acao = 'alterar';
        let ID = $("#editar_ID").val();
        let nome = $("#editar_nome").val();
        let descricao = $("#editar_descricao").val();
        let ativo = $("#editar_ativo").is(":checked") ? 1 : 0;
        let idjogo = $("#editar_id_jogo").val();

        $.ajax({
            type:"POST",
            url:"cenario-model.php",
            data:"acao="+acao+"&ID="+ID+"&nome="+nome+"&descricao="+descricao+"&ativo="+ativo+"&idjogo="+idjogo,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
$(function(){
    $("#incluir").click(function(){
        $("#modal-inclusao").modal("show");
    });

    $(".cancelar").click(function(){
        $(".modal").modal("hide");
    });

    $("#inserir").click(function(){
        let acao = "inserir";
        let x = $("#inserir_x").val();
        let y = $("#inserir_y").val();
        let ativo = $("#inserir_ativo").is(":checked") ? 1 : 0;
        let idtabuleiro = $("#inserir_id_tabuleiro").val();

        $.ajax({
            type:"POST",
            url:"posicao-model.php",
            data:"acao="+acao+"&x="+x+"&y="+y+"&ativo="+ativo+"&idtabuleiro="+idtabuleiro,
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
        let x = $(this).attr("x");

        if(confirm("Confirma desativar '"+x+"'?")){
            $.ajax({
                type:"GET",
                url:"posicao-model.php",
                data:"acao="+acao+"&ID="+ID,
                success: function(msg){
                    alert(msg);

                    window.location.reload();
                }
            });
        }
    });

    $(".editar").click(function(){
        $("#modal-x-edicao").css("color","black");

        let acao = 'editar';
        let ID = $(this).attr("id");

        $.ajax({
            type:"GET",
            url:"posicao-model.php",
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
        let x = $("#editar_x").val();
        let y = $("#editar_y").val();
        let ativo = $("#editar_ativo").is(":checked") ? 1 : 0;
        let idtabuleiro = $("#editar_id_tabuleiro").val();

        $.ajax({
            type:"POST",
            url:"posicao-model.php",
            data:"acao="+acao+"&ID="+ID+"&x="+x+"&y="+y+"&ativo="+ativo+"&idtabuleiro="+idtabuleiro,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
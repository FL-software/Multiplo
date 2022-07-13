$(function(){
    $("#incluir").click(function(){
        $("#modal-inclusao").modal("show");
    });

    $(".cancelar").click(function(){
        $(".modal").modal("hide");
    });

    $("#inserir").click(function(){
        let acao = "inserir";
        let ativo = $("#inserir_ativo").is(":checked") ? 1 : 0;
        let iditem = $("#inserir_id_item").val();
        let idjogo = $("#inserir_id_jogo").val();

        $.ajax({
            type:"POST",
            url:"item-jogo-model.php",
            data:"acao="+acao+"&ativo="+ativo+"&iditem="+iditem+"&idjogo="+idjogo,
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

        if(confirm("Confirma desativar '"+nome+"'?")){
            $.ajax({
                type:"GET",
                url:"item-jogo-model.php",
                data:"acao="+acao+"&ID="+ID,
                success: function(msg){
                    alert(msg);

                    window.location.reload();
                }
            });
        }
    });

    $(".editar").click(function(){
        $("#modal-nome-edicao").css("color","black");

        let acao = 'editar';
        let ID = $(this).attr("id");

        $.ajax({
            type:"GET",
            url:"item-jogo-model.php",
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
        let ativo = $("#editar_ativo").is(":checked") ? 1 : 0;
        let iditem = $("#editar_id_item").val();
        let idjogo = $("#editar_id_jogo").val();

        $.ajax({
            type:"POST",
            url:"item-jogo-model.php",
            data:"acao="+acao+"&ID="+ID+"&ativo="+ativo+"&iditem="+iditem+"&idjogo="+idjogo,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
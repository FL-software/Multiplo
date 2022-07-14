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
        let idpersonagemusuario = $("#inserir_id_personagem_usuario").val();
        let idmagia = $("#inserir_id_magia").val();

        $.ajax({
            type:"POST",
            url:"grimorio-model.php",
            data:"acao="+acao+"&ativo="+ativo+"&idpersonagemusuario="+idpersonagemusuario+"&idmagia="+idmagia,
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
                url:"grimorio-model.php",
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
            url:"grimorio-model.php",
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
        let idpersonagemusuario = $("#editar_id_personagem_usuario").val();
        let idmagia = $("#editar_id_magia").val();

        $.ajax({
            type:"POST",
            url:"grimorio-model.php",
            data:"acao="+acao+"&ID="+ID+"&ativo="+ativo+"&idpersonagemusuario="+idpersonagemusuario+"&idmagia="+idmagia,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
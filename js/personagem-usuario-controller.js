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
        let idpersonagem = $("#inserir_id_personagem").val();
        let idusuario = $("#inserir_id_usuario").val();

        $.ajax({
            type:"POST",
            url:"personagem-usuario-model.php",
            data:"acao="+acao+"&ativo="+ativo+"&idpersonagem="+idpersonagem+"&idusuario="+idusuario,
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
                url:"personagem-usuario-model.php",
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
            url:"personagem-usuario-model.php",
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
        let idpersonagem = $("#editar_id_personagem").val();
        let idusuario = $("#editar_id_usuario").val();

        $.ajax({
            type:"POST",
            url:"personagem-usuario-model.php",
            data:"acao="+acao+"&ID="+ID+"&ativo="+ativo+"&idpersonagem="+idpersonagem+"&idusuario="+idusuario,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
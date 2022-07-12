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
        let login = $("#inserir_login").val();
        let senha = $("#inserir_senha").val();
        let ativo = $("#inserir_ativo").is(":checked") ? 1 : 0;
        let idperfil = $("#inserir_id_perfil").val();

        $.ajax({
            type:"POST",
            url:"usuario-model.php",
            data:"acao="+acao+"&nome="+nome+"&login="+login+"&senha="+senha+"&ativo="+ativo+"&idperfil="+idperfil,
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
                url:"usuario-model.php",
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
            url:"usuario-model.php",
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
        let login = $("#editar_login").val();
        let senha = $("#editar_senha").val();
        let ativo = $("#editar_ativo").is(":checked") ? 1 : 0;
        let idperfil = $("#editar_id_perfil").val();

        $.ajax({
            type:"POST",
            url:"usuario-model.php",
            data:"acao="+acao+"&ID="+ID+"&nome="+nome+"&login="+login+"&senha="+senha+"&ativo="+ativo+"&idperfil="+idperfil,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
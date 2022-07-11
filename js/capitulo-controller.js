$(function(){
    $("#incluir").click(function(){
        $("#modal-inclusao").modal("show");
    });

    $(".cancelar").click(function(){
        $(".modal").modal("hide");
    });

    $("#inserir").click(function(){
        let acao = "inserir";
        let titulo = $("#inserir_titulo").val();
        let texto = $("#inserir_texto").val();
        let ativo = $("#inserir_ativo").is(":checked") ? 1 : 0;
        let idhistoria = $("#inserir_id_historia").val();

        $.ajax({
            type:"POST",
            url:"capitulo-model.php",
            data:"acao="+acao+"&titulo="+titulo+"&texto="+texto+"&ativo="+ativo+"&idhistoria="+idhistoria,
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
        let titulo = $(this).attr("titulo");

        if(confirm("Confirma desativar '"+titulo+"'?")){
            $.ajax({
                type:"GET",
                url:"capitulo-model.php",
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
            url:"capitulo-model.php",
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
        let titulo = $("#editar_titulo").val();
        let texto = $("#editar_texto").val();
        let ativo = $("#editar_ativo").is(":checked") ? 1 : 0;
        let idhistoria = $("#editar_id_historia").val();

        $.ajax({
            type:"POST",
            url:"capitulo-model.php",
            data:"acao="+acao+"&ID="+ID+"&titulo="+titulo+"&texto="+texto+"&ativo="+ativo+"&idhistoria="+idhistoria,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
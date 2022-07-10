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
        let idcenario = $("#inserir_id_cenario").val();

        $.ajax({
            type:"POST",
            url:"historia-model.php",
            data:"acao="+acao+"&nome="+nome+"&descricao="+descricao+"&ativo="+ativo+"&idcenario="+idcenario,
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

        if(confirm("Confirma a exclusão?")){
            $.ajax({
                type:"GET",
                url:"historia-model.php",
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
            url:"historia-model.php",
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
        let idcenario = $("#editar_id_cenario").val();

        $.ajax({
            type:"POST",
            url:"historia-model.php",
            data:"acao="+acao+"&ID="+ID+"&nome="+nome+"&descricao="+descricao+"&ativo="+ativo+"&idcenario="+idcenario,
            success: function(msg){
                alert(msg);

                window.location.reload();
            }
        });
    });
});
<?php

include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<body>
    <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
        <h1>Carregamento sob demanda</h1>
    </div>
    <div class="center">
        <div class="area">
            
        </div>
    </div>
    <div>
        <button id="load_comments">Carregar Mais</button>
    </div>
</body>
</html>

<script>
    var btn = document.querySelector('#load_comments');
    var page = 1;

    btn.addEventListener('click', function(){
        loadComments();
    });

    function loadComments(){
        $.ajax({
            url: 'lista.php',
            type: 'POST',
            data: {page: page},
            dataType: 'json',
            success: function(data){
                if(data.length > 0){
                    for(var i = 0; i < data.length; i++){
                        $('.area').append('<div class="comment"><h3>'+data[i].nome+'</h3><p>'+data[i].cnpj+'</p></div>');

                    }
                    page++;
                }else{
                    alert('Não há mais comentários');
                }
            },
            error: function(){
                alert('Erro ao carregar os comentários');
            }
        });
    }
</script>
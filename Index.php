<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    <!-- Adicione o link para o seu arquivo CSS aqui -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Bem-vindo à Pesquisa de Jobs</h1>
        <p>Use a barra de pesquisa abaixo para encontrar detalhes de um job:</p>
        <form id="search-form" class="mb-4">
            <div class="input-group">
                <input type="text" name="job_name" class="form-control" placeholder="Nome do Job">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>
        
        <!-- Div para exibir os detalhes do job -->
        <div id="job-results"></div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#search-form').submit(function(e){
            e.preventDefault(); // Impede o envio padrão do formulário
            var formData = $(this).serialize(); // Obtém os dados do formulário

            $.ajax({
                type: 'POST',
                url: 'jobs.php',
                data: formData,
                success: function(response){
                    $('#job-results').html(response); // Exibe os resultados na div
                }
            });
        });
    });
    </script>
</body>
</html>
<?php?>

<?php

//por algum motivo meu autoload não esta funcionando mas vou deixar o codigo de qualquer forma.

//crud sem front com php pdo e mysql.
    require_once("class/Sql.php");
    require_once("class/Usuario.php");

   $usuario = new Usuario();
   
    //inserir
    $usuario->inserir(5, 'rayane', '25');
    //excluir
    $usuario->excluir(3);
    //modificar
    $usuario->modificar(5, 'rayane', '26');
    //ler todos
    $lista = $usuario->listarTodos();
    echo json_encode($lista);
?>
</html>
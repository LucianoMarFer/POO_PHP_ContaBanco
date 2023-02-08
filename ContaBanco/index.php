<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <pre>
        <?php
        require_once 'ContaBanco.php';
        $p1 = new ContaBanco();
        $p2 = new ContaBanco();
         
        $p1->abrirConta("CC");
        $p1->setDono("Luciano");
        $p1->setNumConta(50001);
        $p1->depositar(300);
        $p1->pagarMensal();
        print_r($p1);
        
        
        $p2->abrirConta("CP");
        $p2->setDono("Chica");
        $p2->setNumConta(50002);
        $p2->depositar(500);
        $p2->sacar(10000);
        //$p2->pagarMensal();
        $p2->pagarMensal();
       
        
        print_r($p2);
        
        ?>
        </pre>
    </body>
</html>

<?php

function MenuClientes() {
    add_menu_page('Clientes', 'Cliente', 'manage_options', 'clientes', 'my_function', "", 1);
}





function my_function() { $x = dados::ListaDados(); ?>
    <style>
        .table_Dados{width: 100%; background-color: white;}
        .table_Dados td{border: 1px solid #cccccc; padding: 10px; text-align: center;}
    </style>
    <table class="table_Dados">
        <thead>
        <td>nome do cliente</td>
        <td>e-mail</td>
        <td>telefone</td>
        <td>situacao</td>
    </thead>
    
    <?php foreach ($x as $x): ?>
    <tr>
        <td><?php echo $x[1];?></td>
        <td><?php echo $x[6];?></td>
        <td><?php echo $x[7];?></td>
        <td>------</td>
    </tr>
    <?php endforeach;?>
    
    </table>    
    <?php
}





class Dados
    {
    static function ListaDados() {
        global $wpdb;
        $sql   = "SELECT cli.id ,cli.nome, cli.rg, cli.data_de_expedicao, cli.data_de_nascimento ,cli.cpf , e.email, t.telefone
from cliente as cli 
inner join clientes_email as ce on cli.id = ce.cliente
inner join email as e on e.id = ce.email
INNER JOIN clientes_telefone as tc on cli.id = tc.cliente
inner join telefone as t on tc.telefone = t.id 
limit 15
";
        $dados = $wpdb->get_results($sql, ARRAY_N);
        return $dados;
    }





    }

<?php

function Paginas(){
    add_menu_page("clientes", "cliente", "administrator", "cli"); 
//add_menu_page("clientes", "cliente", "administrator", "cli");
    add_submenu_page("cliente", "lista", "listas", "administrator", "lis");
}

<?php

//render('articles/show')
// les variables qui sont nécessaires pour cetta affichage seront données dans $variables
function render(string $path, $variables = []) {

    // transformer le tableau associatif en véritables variables. Ce tableau contiendra les variables de la page concernée. Par exemple : ['pageTitle' => $pageTitle, 'article' => $article]
    extract($variables);

    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();
    
    require('templates/layout.html.php');
}

function redirect(string $url): void {
    header("Location: $url");
    exit();
}

?>
<?php

class Renderer
{
    /**
     * Affiche un template HTML en injectant les $variables
     *
     * @param string $path
     * @param array $variables
     * @return void
     */

    //render('articles/show')
    // les variables qui sont nécessaires pour cetta affichage seront données dans $variables
    public static function render(string $path, $variables = [])
    {

        // transformer le tableau associatif en véritables variables. Ce tableau contiendra les variables de la page concernée. Par exemple : ['pageTitle' => $pageTitle, 'article' => $article]
        extract($variables);

        ob_start();
        require('templates/' . $path . '.html.php');
        $pageContent = ob_get_clean();

        require('templates/layout.html.php');
    }
}

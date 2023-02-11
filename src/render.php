<?php

function render($page, $params)
{
    return render_template(
        LAYOUTS_DIR . $params['layout'],
        [
            'title' => $params['title'],
            'content' => render_template($page, $params)
        ]
    );
}


function render_template($page, $params)
{
    ob_start();
    extract($params);
    include VIEWS_DIR . $page . '.php';
    return ob_get_clean();
}

<?php

// the function retrieves the contents of the $page template, performs variable substitution using an array of parameters $params, and then inserts the resulting content into the $content variable of the main layout template for the current page being rendered
function render($page, $params)
{
    if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
        // AJAX request
        header('Content-Type: application/json');
        return json_encode($params['json']);
    } else {
        // Regular page request
        return render_template(
            LAYOUTS_DIR . $params['layout'],
            [
                'title' => $params['title'],
                'cart_qty' => $params['cart_qty'],
                'qty_style' => $params['qty_style'],
                'content' => render_template($page, $params)
            ]
        );
    }
}

// the function returns the $page template with variables substituted from the $params array as a string
function render_template($page, $params)
{
    ob_start();  // start output buffering
    extract($params); // extract variables from the $params array, which makes them available for use in the included template
    include VIEWS_DIR . $page . '.php'; // execute the code in the included file, which generates output that is captured by the output buffer
    return ob_get_clean(); // return the contents of the output buffer
}

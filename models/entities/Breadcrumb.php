<?php

class Breadcrumb
{
    public static function get_breadcrumbs(array $array): array
    {
        $link = '';
        $result = [];

        foreach ($array as $elem) {
            $link .= '/' . $elem;
            $result += [
                ucfirst($elem) => $link
            ];
        }

        return $result;
    }
}

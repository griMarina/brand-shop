<?php

class Breadcrumb
{
    public static function get_breadcrumbs(array $array): array
    {
        $link = '';
        $result = [];

        if (!in_array('', $array)) {
            foreach ($array as $elem) {
                $link .= '/' . $elem;
                $result += [
                    ucfirst($elem) => $link
                ];
            }
        }

        return $result;
    }
}

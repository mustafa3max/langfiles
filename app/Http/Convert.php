<?php

namespace App\Http;

class Convert
{
    static public function to($type, $toJson)
    {
        $dataAll = [];
        foreach ($toJson as $values) {
            $data = '';
            foreach ($values as $key => $value) {
                if ($type == 'json') {
                    $data .= "<div>" .
                        '<span class="text-code-1-light dark:text-code-1-dark">"' .
                        $key . '"</span>: '  .
                        '<span class="text-code-2-light dark:text-code-2-dark">"' .
                        $value .
                        '"</span>,' .
                        "</div>";
                } elseif ($type == 'php') {
                    $data .= "<div>" .
                        '<span class="text-code-1-light dark:text-code-1-dark">"' .
                        $key .
                        '"</span> => '  .
                        '<span class="text-code-2-light dark:text-code-2-dark">"' .
                        $value .
                        '"</span>,' .
                        "</div>";
                } elseif ($type == 'android') {
                    $data .= "<div>"
                        .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">"
                        .
                        "&#x3c;string "
                        .
                        "</span>"
                        .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">"
                        . "name=\"" . $key . "\"" .
                        "</span>"
                        .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">></span>"
                        . $value .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">"
                        .
                        "&#x3c;/string>"
                        .
                        "</span>"
                        .
                        "</div>";
                } elseif ($type == 'ios') {
                    $data .= "<div>" .
                        '<span class="text-code-1-light dark:text-code-1-dark">"' .
                        $key . '"</span> = '  .
                        '<span class="text-code-2-light dark:text-code-2-dark">"' .
                        $value .
                        '"</span>;' .
                        "</div>";
                } elseif ($type == 'django') {
                    $data .= "<div><span class=\"text-code-2-light dark:text-code-2-dark\">msgid </span>" .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">\"" . $key . "\"</span>" .
                        "</div>" .
                        "<div><span class=\"text-code-2-light dark:text-code-2-dark\">msgstr </span>" .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">\"" . $value . "\"</span>" .
                        "</div>" .
                        "<br>";
                } elseif ($type == 'xlf') {
                    $data .= "<div class=\"text-code-2-light dark:text-code-2-dark\">" .
                        "&#x3c;trans-unit " .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        "id=\"" . $key . "\"" .
                        "<span class=\"text-code-2-light dark:text-code-2-dark\">" .
                        ">" .
                        "</span>" .
                        "</span>" .
                        "</div>" .
                        "<div style=\"padding-inline-start:2rem\">" .
                        // value
                        "<div>" .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        "&#x3c;source>" .
                        "</span>" .
                        $key .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        "&#x3c;/source>" .
                        "</span>" .
                        "</div>" .
                        // targit
                        "<div>" .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        "&#x3c;target>" .
                        "</span>" .
                        $value .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        "&#x3c;/target>" .
                        "</span>" .

                        "</div>" .
                        "</div>" .
                        "<div class=\"text-code-2-light dark:text-code-2-dark\">" .
                        "&#x3c;/trans-unit>" .
                        "</div>";
                }
            }
            $dataAll[] = $data;
        }
        return $dataAll;
    }
}

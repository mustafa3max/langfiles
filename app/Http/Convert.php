<?php

namespace App\Http;

class Convert
{
    static public function to($type, $toJson)
    {
        $dataAll = [];
        $csvValues = [];

        $index = 0;
        foreach ($toJson as $lang => $values) {
            $data = [$lang => ''];
            $csvKeys = [];
            $keys = [];
            foreach ($values as $key => $value) {
                if ($type === 'json') {
                    $data[$lang] .= "<div>" .
                        '<span class="text-code-1-light dark:text-code-1-dark">"' .
                        $key . '"</span>: '  .
                        '<span class="text-code-2-light dark:text-code-2-dark">"' .
                        $value .
                        '"</span>,' .
                        "</div>";
                } elseif ($type === 'php') {
                    $data[$lang] .= "<div>" .
                        '<span class="text-code-1-light dark:text-code-1-dark">"' .
                        $key .
                        '"</span> => '  .
                        '<span class="text-code-2-light dark:text-code-2-dark">"' .
                        $value .
                        '"</span>,' .
                        "</div>";
                } elseif ($type === 'android') {
                    $data[$lang] .= "<div>"
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
                } elseif ($type === 'ios') {
                    $data[$lang] .= "<div>" .
                        '<span class="text-code-1-light dark:text-code-1-dark">"' .
                        $key . '"</span> = '  .
                        '<span class="text-code-2-light dark:text-code-2-dark">"' .
                        $value .
                        '"</span>;' .
                        "</div>";
                } elseif ($type === 'django') {
                    $data[$lang] .= "<div><span class=\"text-code-2-light dark:text-code-2-dark\">msgid </span>" .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">\"" . $key . "\"</span>" .
                        "</div>" .
                        "<div><span class=\"text-code-2-light dark:text-code-2-dark\">msgstr </span>" .
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">\"" . $value . "\"</span>" .
                        "</div>" .
                        "<br>";
                } elseif ($type === 'xlf') {
                    $data[$lang] .= "<div class=\"text-code-2-light dark:text-code-2-dark\">" .
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
                } elseif ($type === 'csv') {
                    $data[$lang] .= '';
                    $csvKeys[] = "<span class=\"text-code-2-light dark:text-code-2-dark\">" .
                        strtoupper($key) .
                        "</span>" . ', ' . 'ararar' . ' ' . 'enenen';
                    $keys[] = $key;
                    $csvValues[$key . '_' . Globals::languages()[$index]] =
                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        '"' .
                        $value .
                        '"' .
                        "</span>" .
                        ', ';
                } elseif ($type === 'html') {
                    $data[$lang] .= "<div>" .

                        "<span class=\"text-code-2-light dark:text-code-2-dark\">" .
                        "&#x3c;li" .
                        '</span>' .

                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        " id" .
                        '</span>' .

                        "<span class=\"text-primary-dark dark:text-primary-light\">" .
                        "=" .
                        '</span>' .

                        "<span class=\"text-code-1-light dark:text-code-1-dark\">" .
                        "\"" . $key . "\"" .
                        '</span>' .

                        "<span class=\"text-code-2-light dark:text-code-2-dark\">" .
                        ">" .
                        '</span>' .

                        "<span class=\"text-primary-dark dark:text-primary-light\">" .
                        $value .
                        '</span>' .

                        "<span class=\"text-code-2-light dark:text-code-2-dark\">" .
                        "&#x3c;/li>" .
                        '</span>' .
                        "</div>";
                }
            }
            if ($type === 'csv') {
                if ($index + 1 === count($toJson)) {
                    for ($index = 0; $index < count($keys); $index++) {
                        $key = '';

                        try {
                            $key = str_replace('ararar', $csvValues[$keys[$index] . '_' . 'ar'], $csvKeys[$index]);
                            $key = str_replace('enenen', $csvValues[$keys[$index] . '_' . 'en'], $key);
                        } catch (\Throwable $th) {
                        }
                        $data[$lang] .= '<div>' . $key . '</div>';
                    }
                    $dataAll = array_merge($dataAll, $data);
                }
            } else {
                $dataAll = array_merge($dataAll, $data);
            }
            $index++;
        }

        return $dataAll;
    }
}

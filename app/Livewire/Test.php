<?php

namespace App\Livewire;

use DOMDocument;
use DOMElement;
use Livewire\Component;
use View;

class Test extends Component
{
    public $url;
    public $texts;

    public $html;

    function getTexts($html, $isClick = true)
    {
        foreach (($isClick ? $this->getHtml() : $html) as $value) {
            if (gettype($value) == 'array') {
                $this->getTexts($value, false);
                continue;
            } else {
                $this->texts[] = $value;
            }
        }
    }

    function getHtml()
    {
        // $html = file_get_contents('https://www.ego4u.com/en/cram-up/vocabulary/date/month-day', 0);
        $html = htmlentities('<html>ddd</html>');
        $dom = new DOMDocument();
        // dd(json_encode($html));
        // dd(htmlentities($html));

        $internalErrors = libxml_use_internal_errors(true);

        // load HTML
        $dom->loadHTML($html);

        // Restore error level
        libxml_use_internal_errors($internalErrors);

        $dom = $dom;
        return $dom->getElementsByTagName('*');
    }

    public function render()
    {
        return view('livewire.test');
    }
}

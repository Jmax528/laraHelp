<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $section;
    public $faq;

    public function __construct($section = null, $faq = null)
    {
        $this->section = $section;
        $this->faq = $faq;
    }

    public function render()
    {
        return view('components.delete-button');
    }
}

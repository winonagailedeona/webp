<?php

namespace App\View\Components\Layouts\Admin\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddNew extends Component
{
    public $action;
    public $title;

    public function __construct($action, $title)
    {
        $this->action = $action;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.layouts.admin.modal.add-new');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Backpack\CRUD\app\Library\Widget;

class SchedulerController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }
    public function scheduler()
    {
        $this->data['title'] = trans('backpack::base.scheduler');
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.scheduler')     => backpack_url('scheduler'),
            trans('backpack::base.scheduler') => false,
        ];
        return view(backpack_view('scheduler'), $this->data);
    }
}

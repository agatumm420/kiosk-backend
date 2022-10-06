<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Display;
use Backpack\CRUD\app\Library\Widget;
class AdminController extends Controller
{
    protected $data = [];


    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashdoard');
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.dashboard')     => backpack_url('dashboard'),
            trans('backpack::base.dashboard') => false,
        ];
        $count=Display::all()->count();
        $scanner_count=Display::where('scanner', true)->count();
        $printer_count=Display::where('print', true)->count();
        $displays_widget=Widget::make([
            'type'        => 'progress',
            'class'       => 'card text-white bg-primary mb-2',
            'value'       => $count,
            'description' => 'Zarejestrowane ekrany.',
            'progress'    => $count/40, // integer
            'hint'        => '8544 more until next milestone.',
        ]);
        $scanner_widget=Widget::make([
            'type'       => 'card',
            // 'wrapper' => ['class' => 'col-sm-6 col-md-4'], // optional
            'class'   => 'card bg-dark text-white', // optional
            'content'    => [
                'header' => 'Działające skanery', // optional
                'body'   => $scanner_count,
            ]
            ]);
            $printer_widget=Widget::make([
                'type'       => 'card',
                // 'wrapper' => ['class' => 'col-sm-6 col-md-4'], // optional
                'class'   => 'card bg-dark text-white', // optional
                'content'    => [
                    'header' => 'Działające skanery', // optional
                    'body'   => $printer_count,
                ]
                ]);
                Widget::add([
                    'type'    => 'div',
                    'class'   => 'row',
                    'content' => [$displays_widget, $scanner_widget, $printer_widget]
                ]);

        return view(backpack_view('dashboard'), $this->data);
    }
}

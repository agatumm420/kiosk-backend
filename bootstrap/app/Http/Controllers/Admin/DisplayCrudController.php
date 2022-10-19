<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DisplayRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use PhpParser\Node\Stmt\Echo_;

/**
 * Class DisplayCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DisplayCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Display::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/display');
        CRUD::setEntityNameStrings('ekran', 'Ekrany');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([ 'name' => 'name', 'type' => 'text', 'label' => trans('backpack::panel.name')]);
        CRUD::addColumn([ 'name' => 'map-image', 'type' => 'image', 'label' => trans('backpack::panel.image'), 'prefix'=>'/storage/']);
        CRUD::addColumn(['label'     => "Slajdy",
        'type'      => 'select',
        'name'      => 'slide_show_id',


        'entity'    => 'slide_show',


        'model'     => "App\Models\SlideShow",
        'attribute' => 'name',]);
        CRUD::addColumn(['label'=>"Piętro ", "name"=>'level' , 'type'=>'select_from_array','options'     => [3=>'Parking',0 => 'Parter', 1 => 'Piętro I', 2=>'Piętro II'] ]);
        CRUD::addColumn([ 'name' => 'place', 'type' => 'text', 'label' => 'Miejsce']);
        CRUD::addColumn(['label'=>"Drukarka ", "name"=>'print' , 'type'=>'select_from_array','options' => [0 => 'Nie działa', 1 => 'Działa'] ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DisplayRequest::class);

        CRUD::addField([ 'name' => 'name', 'type' => 'text', 'label' => trans('backpack::panel.name')]);
        CRUD::addField([
            'label'     => "Slajdy",
            'type'      => 'select',
            'name'      => 'slide_show_id',


            'entity'    => 'slide_show',


            'model'     => "App\Models\SlideShow",
            'attribute' => 'name',


            'options'   => (function ($query) {
                 return $query->orderBy('name', 'ASC')->get();
             }),
            ]);
            CRUD::addField([   // select_from_array
                'name'        => 'level',
                'label'       => "Piętro",
                'type'        => 'select_from_array',
                'options'     => [3=>'Parking',0 => 'Parter', 1 => 'Piętro I', 2=>'Piętro II'],
                'allows_null' => false,
                'default'     => 1,
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ]);
            CRUD::addField([ 'name' => 'place', 'type' => 'text', 'label' => 'Miejsce']);
            CRUD::addField(['name' => 'map-image', 'type' => 'upload', 'upload'=>true,]); ///check if disk is right
            CRUD::addField([   // select_from_array
                'name'        => 'print',
                'label'       => "Czy drukuje?",
                'type'        => 'select_from_array',
                'options'     => [true => 'tak', false => 'nie'],
                'allows_null' => false,
                'default'     => false,
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

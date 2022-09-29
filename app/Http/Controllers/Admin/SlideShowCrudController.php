<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SlideShowRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SlideShowCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SlideShowCrudController extends CrudController
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
        CRUD::setModel(\App\Models\SlideShow::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/slide-show');
        CRUD::setEntityNameStrings('pokaz slajdów', 'Pokazy slajdów');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::column('name');
        CRUD::addColumn([ 'name' => 'name', 'type' => 'text', 'label' => trans('backpack::panel.name')]);
        CRUD::addColumn(['label'=>"Wygaszacze",
        'name' => 'screen_savers',
        'type' => 'select_multiple',
        'entity'=>'screen_savers',
        'model'=>'App\Models\ScreenSaver',
        'attribute'=>'id',]);
        CRUD::addColumn(['label'=>"Ekrany",
        'name' => 'displays',
        'type' => 'select_multiple',
        'entity'=>'displays',
        'model'=>'App\Models\Display',
        'attribute'=>'name',]);

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
        CRUD::setValidation(SlideShowRequest::class);

        CRUD::field('name');
        CRUD::addField([
            'label'=>"Wygaszacze",
            'name' => 'screen_savers',
            'type' => 'select_multiple',
            'entity'=>'screen_savers',
            'model'=>'App\Models\ScreenSaver',
            'attribute'=>'id',
            'pivot'     => false,

        ]);
        CRUD::addField([
            'label'=>"Ekrany",
            'name' => 'displays',
            'type' => 'select_multiple',
            'entity'=>'displays',
            'model'=>'App\Models\Display',
            'attribute'=>'name',
            'pivot'     => true,

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

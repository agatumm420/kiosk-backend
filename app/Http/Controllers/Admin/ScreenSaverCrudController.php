<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScreenSaverRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ScreenSaverCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScreenSaverCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ScreenSaver::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/screen-saver');
        CRUD::setEntityNameStrings('wygaszacz ekranu', 'Wygaszacze ekranu');
        $this->crud->addButtonFromModelFunction('top', 'reorderGroup', 'reorderGroup', 'end');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        // CRUD::column('image');
        CRUD::addColumn([ 'name' => 'name', 'type' => 'text', 'label' => trans('backpack::panel.name')]);

        CRUD::addColumn([ 'name' => 'image', 'type' => 'image', 'label' => trans('backpack::panel.image'), 'prefix'=>'/storage/']);
        CRUD::addColumn([
            'name'  => 'published_since', // The db column name
            'label' => 'Opublikowane od', // Table column heading
            'type'  => 'datetime',
            // 'format' => 'l j F Y H:i:s', // use something else than the base.default_datetime_format config value
        ],);
        CRUD::addColumn([
            'name'  => 'published_untill', // The db column name
            'label' => 'Opublikowane do', // Table column heading
            'type'  => 'datetime',
            // 'format' => 'l j F Y H:i:s', // use something else than the base.default_datetime_format config value
        ],);
        CRUD::addColumn([
            'label'=>"Pokazy slajdów",
        'name' => 'slide_shows',
        'type' => 'select_multiple',
        'entity'=>'slide_shows',
        'model'=>'App\Models\SlideShow',
        'attribute'=>'name',

        ]
        );
        CRUD::column('id');

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
        CRUD::setValidation(ScreenSaverRequest::class);

        CRUD::addField([ 'name' => 'name', 'type' => 'text', 'label' => trans('backpack::panel.name')]);
        CRUD::addField([   // select_from_array
            'name'        => 'type',
            'label'       => "Typ",
            'type'        => 'select_from_array',
            'options'     => [1 => 'Obraz', 2 => 'Wideo'],
            'allows_null' => false,
            'default'     => 1,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
       CRUD::addField(['name' => 'image', 'type' => 'upload','upload'=>true, ]);

        CRUD::addField([
            'label'=>"Pokazy Slajdów",
            'name' => 'slide_shows',
            'type' => 'select_multiple',
            'entity'=>'slide_shows',
            'model'=>'App\Models\SlideShow',
            'attribute'=>'name',
            'pivot'     => true,

        ]);
        CRUD::addField([   // Checkbox
            'name'  => 'always',
            'label' => 'Czy ma grać zawsze?',
            'type'  => 'checkbox'
        ]);
        // CRUD::addField([   // DateTime
        //     'name'  => 'published_since',
        //     'label' => 'Opublikowane od',
        //     'type'  => 'datetime_picker',

        //     // optional:
        //     'datetime_picker_options' => [
        //         'format' => 'DD/MM/YYYY HH:mm',
        //         'language' => 'pl',
        //         'tooltips' => [ //use this to translate the tooltips in the field
        //                 'today' => 'Dzisiaj',
        //                 'selectDate' => 'Wybierz date',
        //                 'selectMonth'=>'Wybierz miesiąc',
        //                 'pickHour'=>'Wybierz godzine',
        //                 'pickMinute'=>'Wybierz minute'
        //                 // available tooltips: today, clear, close, selectMonth, prevMonth, nextMonth, selectYear, prevYear, nextYear, selectDecade, prevDecade, nextDecade, prevCentury, nextCentury, pickHour, incrementHour, decrementHour, pickMinute, incrementMinute, decrementMinute, pickSecond, incrementSecond, decrementSecond, togglePeriod, selectTime, selectDate
        //         ]
        //     ],
        //     'visibility' => [
        //         'field_name' => 'always',
        //         'value'      => 0,
        //         'add_disabled' => true, // if you need to disable this field value to not be send through create/update request set it to true, otherwise set it to true
        //     ],

        //     'allows_null' => true,
        //     //'default' => '2017-05-12 11:59:59',
        // ]

        // );
        CRUD::addField([
            'name'  => 'published_since',
            'label' => 'Opublikowane od',
            'type'=>'datetime',
            'visibility' => [
                'field_name' => 'always',
                'value'      => false,
                'add_disabled' => true, // if you need to disable this field value to not be send through create/update request set it to true, otherwise set it to true
            ],
        ]);
        CRUD::addField([   // Checkbox
            'name'  => 'forever',
            'label' => 'Czy ma grać na zawsze?',
            'type'  => 'checkbox'

        ]);
        CRUD::addField([
            'name'  => 'published_untill',
            'label' => 'Opublikowane od',
            'type'=>'datetime',
            'visibility' => [
                'field_name' => 'forever',
                'value'      => false,
                'add_disabled' => true, // if you need to disable this field value to not be send through create/update request set it to true, otherwise set it to true
            ],

        ]);
        // CRUD::addField([   // DateTime
        //     'name'  => 'published_untill',
        //     'label' => 'Opublikowane do',
        //     'type'  => 'datetime_picker',

        //     // optional:
        //     'datetime_picker_options' => [
        //         'format' => 'DD/MM/YYYY HH:mm',
        //         'language' => 'pl',
        //         'tooltips' => [ //use this to translate the tooltips in the field
        //                 'today' => 'Dzisiaj',
        //                 'selectDate' => 'Wybierz date',
        //                 'selectMonth'=>'Wybierz miesiąc',
        //                 'pickHour'=>'Wybierz godzine',
        //                 'pickMinute'=>'Wybierz minute'
        //                 // available tooltips: today, clear, close, selectMonth, prevMonth, nextMonth, selectYear, prevYear, nextYear, selectDecade, prevDecade, nextDecade, prevCentury, nextCentury, pickHour, incrementHour, decrementHour, pickMinute, incrementMinute, decrementMinute, pickSecond, incrementSecond, decrementSecond, togglePeriod, selectTime, selectDate
        //         ]
        //     ],
        //     'visibility' => [
        //         'field_name' => 'forever',
        //         'value'      => 0,
        //         'add_disabled' => true, // if you need to disable this field value to not be send through create/update request set it to true, otherwise set it to true
        //     ],

        //     'allows_null' => true,
        //     // 'default' => '2017-05-12 11:59:59',
        // ]

        // );


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
    protected function setupReorderOperation()
    {
        // define which model attribute will be shown on draggable elements
        $this->crud->set('reorder.label', 'name');
        // define how deep the admin is allowed to nest the items
        // for infinite levels, set it to 0
        $this->crud->set('reorder.max_level', 1);
    }
}

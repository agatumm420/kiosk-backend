<?php

namespace App\Http\Controllers\Admin\Operations;
use Illuminate\Support\Facades\Route;
trait OderSlidesOperation{
    protected function setupOrderSlidesRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/{id}/order', [
            'as'        => $routeName.'.getOrder',
            'uses'      => $controller.'@getOrderForm',
            'operation' => 'moderate',
        ]);
        Route::post($segment.'/{id}/order', [
            'as'        => $routeName.'.postOrder',
            'uses'      => $controller.'@postOrderForm',
            'operation' => 'moderate',
        ]);
    }
    protected function setupOrderSlidesDefaults()
    {
        $this->crud->allowAccess('orderSlides');

        $this->crud->operation('orderSlides', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation('list', function () {
            $this->crud->addButtonFromView('line', 'orderSlides', 'orderSlides');
        });
    }
    public function getOrder($id){
        $this->crud->hasAccessOrFail('orderSlides');

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['title'] = 'Moderate '.$this->crud->entity_name;

        return view("crud::operations.orderSlides", $this->data);
    }
    public function postOrder(){

    }
}
// protected function setupOrderSlidesRoutes($segment, $routeName, $controller)
//     {
//         Route::get($segment.'/{id}/moderate', [
//             'as'        => $routeName.'.getModerate',
//             'uses'      => $controller.'@getModerateForm',
//             'operation' => 'moderate',
//         ]);
//         Route::post($segment.'/{id}/moderate', [
//             'as'        => $routeName.'.postModerate',
//             'uses'      => $controller.'@postModerateForm',
//             'operation' => 'moderate',
//         ]);
//     }

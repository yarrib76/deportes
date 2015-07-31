<?php
/**
 * Created by PhpStorm.
 * User: yamil
 * Date: 7/31/15
 * Time: 4:25 PM
 */

namespace Deportes\Http\Requests;


class GuardarActividadRequest extends Request{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nombre' => 'required',
        ];
    }
}
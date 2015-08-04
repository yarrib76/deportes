<?php namespace Deportes\Http\Requests;

use Deportes\Http\Requests\Request;

class GuardarActividadesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

    public function rules()
    {
        return [
            'nombre' => 'required|unique:actividades,tenis,NULL,club,nombre',
        ];
    }

}

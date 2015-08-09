<?php namespace Deportes\Http\Controllers\Agenda;

use Deportes\Agenda\Agenda;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AgendaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('agenda.calendario1');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        Agenda::create([
            'title' => Input::get('title'),
            'start' => Input::get('start'),
            'end' => Input::get('end'),
            'url' => Input::get('url')
        ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($agenda)
	{
		$agenda->fill(\Request::input())->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

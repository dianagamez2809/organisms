<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use View;
use Validator;
use Input;
use Redirect;
use App\Toxicity;
use Session;


class ToxicityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$toxicities = DB::table('toxicity')->get();

        // load the view and pass the nerds
        return View::make('toxicity')
            ->with('toxicities', $toxicities);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('uploadtoxicity');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'nivel'       => 'required',
            'description'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toxicity/create')
                ->withErrors($validator);
        } else {
            // store
            $toxicity = new Toxicity;
            $toxicity->nivel    		= Input::get('nivel');
            $toxicity->description      = Input::get('description');
            $toxicity->environment		= Input::get('environment');
            $toxicity->animals		= Input::get('animals');
            $toxicity->humans		= Input::get('humans');
            $toxicity->save();

            // redirect
            Session::flash('message', 'Successfully created');
            return Redirect::to('toxicity');
        }
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
		$toxicity = Toxicity::find($id);

        // show the edit form and pass the nerd
        return View::make('edittoxicity')
            ->with('toxicity', $toxicity);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
            'nivel'       => 'required',
            'description'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toxicity/create')
                ->withErrors($validator);
        } else {
            // store
            $toxicity = Toxicity::find($id);
            $toxicity->nivel    		= Input::get('nivel');
            $toxicity->description      = Input::get('description');
            $toxicity->environment		= Input::get('environment');
            $toxicity->animals		= Input::get('animals');
            $toxicity->humans		= Input::get('humans');
            $toxicity->save();

            // redirect
            Session::flash('message', 'Successfully updated');
            return Redirect::to('toxicity');
        }
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

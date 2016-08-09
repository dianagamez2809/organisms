<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use View;
use Validator;
use Input;
use Redirect;
use App\Organism;
use Session;

class OrganismsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$organisms = DB::table('organisms')->get();

        // load the view and pass the nerds
        return View::make('organism')
            ->with('organisms', $organisms);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('uploadorganism');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'organismName'       => 'required',
            'accessNumber'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('organism/create')
                ->withErrors($validator);
        } else {
            // store
            $organism = new Organism;
            $organism->organismName       = Input::get('organismName');
            $organism->accessNumber      = Input::get('accessNumber');
            $organism->valid			= '1';
            $organism->save();

            // redirect
            Session::flash('message', 'Successfully created');
            return Redirect::to('organism');
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
		$organism = Organism::find($id);

        // show the edit form and pass the nerd
        return View::make('editorganisim')
            ->with('organism', $organism);
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
            'organismName'       => 'required',
            'accessNumber'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('organism/create')
                ->withErrors($validator);
        } else {
            // store
            $organism = Organism::find($id);
            $organism->organismName       = Input::get('organismName');
            $organism->accessNumber      = Input::get('accessNumber');
            $organism->save();

            // redirect
            Session::flash('message', 'Successfully edited');
            return Redirect::to('organism');
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

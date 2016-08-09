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
use App\Metabolite;
use App\Organism;
use Response;

class MetabolitesLogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$metabolites = DB::table('metabolites')->get();

        // load the view and pass the nerds
        return View::make('metaboliteslog')
            ->with('metabolites', $metabolites);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$organisms = Organism::lists('organismName', 'id');
		$toxicities = Toxicity::select(DB::raw("CONCAT(description,' e:', environment, ' a:', animals, ' h:', humans) AS tox, id"))->lists('tox', 'id');
		
		//return Response::json($toxicities);
		return View::make('uploadmetabolitelog')
            ->with(array('organisms' => $organisms, 'toxicities' => $toxicities));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'cluster'       => 'required',
            'metabolite'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('metaboliteslog/create')
                ->withErrors($validator);
        } else {
            // store
            $metabolite = new Metabolite;
            $metabolite->cluster    		= Input::get('cluster');
            $metabolite->metabolite      = Input::get('metabolite');
            $metabolite->idToxicity		= Input::get('idToxicity');
            $metabolite->idOrganism		= Input::get('idOrganism');
            $metabolite->criteria		= Input::get('criteria');
            $metabolite->completeness		= Input::get('completeness');
            $metabolite->valid		= '1';
            $metabolite->link		= Input::get('link');
            $metabolite->dnaRegion	= Input::get('dnaRegion');
            $metabolite->percentage = Input::get('percentage');
            $metabolite->save();

            // redirect
            Session::flash('message', 'Successfully created');
            return Redirect::to('metaboliteslog');
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
		$metabolite = Metabolite::find($id);
		$organisms = Organism::lists('organismName', 'id');
		$toxicities = Toxicity::select(DB::raw("CONCAT(description,' e:', environment, ' a:', animals, ' h:', humans) AS tox, id"))->lists('tox', 'id');

        // show the edit form and pass the nerd
        return View::make('editmetabolitelog')
        	->with(array('organisms' => $organisms, 'toxicities' => $toxicities, 'metabolite' => $metabolite));
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
            'cluster'       => 'required',
            'metabolite'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('metaboliteslog/create')
                ->withErrors($validator);
        } else {
            // store
            $metabolite = Metabolite::find($id);
            $metabolite->cluster    		= Input::get('cluster');
            $metabolite->metabolite      = Input::get('metabolite');
            $metabolite->idToxicity		= Input::get('idToxicity');
            $metabolite->idOrganism		= Input::get('idOrganism');
            $metabolite->criteria		= Input::get('criteria');
            $metabolite->completeness		= Input::get('completeness');
            $metabolite->link		= Input::get('link');
            $metabolite->dnaRegion	= Input::get('dnaRegion');
            $metabolite->percentage = Input::get('percentage');
            $metabolite->save();

            // redirect
            Session::flash('message', 'Successfully edited');
            return Redirect::to('metaboliteslog');
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

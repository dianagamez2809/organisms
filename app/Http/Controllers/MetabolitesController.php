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

class MetabolitesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$metabolites = DB::table('metabolites')->get();

        // load the view and pass the nerds
        return View::make('metabolites')
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
		$toxicities = Toxicity::lists('nivel', 'id');
		
		return View::make('uploadmetabolite')
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
            return Redirect::to('metabolites/create')
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
            $metabolite->save();

            // redirect
            Session::flash('message', 'Successfully created');
            return Redirect::to('metabolites');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

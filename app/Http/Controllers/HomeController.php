<?php namespace App\Http\Controllers;

use View;
use Validator;
use Redirect;
use Input;
use Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}
	
	public function showLogin()
	{
	    // show the form
	    return View::make('login');
	}
	
	public function doLogin()
	{
			$rules = array(
		    'name'    => 'required', // make sure the email is an actual email
		    'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
		
		    // create our user data for the authentication
		    $userdata = array(
		        'name'     => Input::get('name'),
		        'password'  => Input::get('password')
		    );
		
		    // attempt to do the login
		    if (Auth::attempt($userdata)) {
		
		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        return Redirect::to('toxicitylog');
		
		    } else {        
		
		        // validation not successful, send back to form 
		        return Redirect::to('login');
		
		    }
		
		}
	}
	public function doLogout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('login'); // redirect the user to the login screen
	}


}

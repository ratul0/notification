<?php

class ApplicationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /applications
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('applications.index')
					->with('applications',Application::get())
					->with('title',"Applications");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /applications/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('applications.create')
					->with('title','Create Application');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /applications
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$application = new Application();

		$application->name = $data['name'];
		$application->url = $data['url'];

		if($application->save()){
			return Redirect::route('application.index')->with('success',"Notice Created Successfully");
		}else{
			return Redirect::route('application.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /applications/{id}
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
	 * GET /applications/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//return Application::find($id);
		return View::make('applications.edit')
					->with('application',Application::find($id))
					->with('title','Edit Application');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /applications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'name' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$application = Application::find($id);
		$application->name = $data['name'];
		$application->url = $data['url'];

		if($application->save()){
			return Redirect::route('application.index')->with('success',"Application Updated Successfully");
		}else{
			return Redirect::route('application.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /applications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Application::destroy($id)){
			return Redirect::route('application.index')->with('success',"Application deleted Successfully.");
		}else{
			return Redirect::route('application.index')->with('error',"Something went wrong.Try again");
		}
	}

}
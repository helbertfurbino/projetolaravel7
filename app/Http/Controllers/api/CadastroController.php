<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Cadastro;
use Illuminate\Routing\Controller;
use App\Http\Requests\CadastroRequest;

class CadastroController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

	return Cadastro::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CadastroRequest $request) {

	try{
	    if (!Cadastro::create($request->all()))
		throw new \Exception('Não foi possível cadastrar');

	    return response()->json([
			'status' => 1,
	    ]);
	} catch(\Exception $e){
	    return response()->json([
			'status' => 0,
			'msg' => $e->getMessage(),
	    ]);
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

	return Cadastro::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
	//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CadastroRequest $request, $id) {

	$user = Cadastro::findOrFail($id);

	try{
	    if (!$user->update($request->all()))
		throw new \Exception('Não foi possível atualizar');

	    return response()->json([
			'status' => 1,
	    ]);
	} catch(\Exception $e){
	    return response()->json([
			'status' => 0,
			'msg' => $e->getMessage(),
	    ]);
	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

	$user = Cadastro::findOrFail($id);

	try{
	    if (!$user->delete())
		throw new \Exception('Não foi possível excluir');

	    return response()->json([
			'status' => 1,
	    ]);
	} catch(\Exception $e){
	    return response()->json([
			'status' => 0,
			'msg' => $e->getMessage(),
	    ]);
	}
    }
}

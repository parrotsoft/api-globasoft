<?php

namespace Cms\Base;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return jsend_success($this->model->all());
        }catch (\Exception $e) {
            return jsend_error('Error al listas: '.$e->getMessage());
        }catch (QueryException $ex) {
            return jsend_error('Error SQL: '.$ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            if (count($this->model->setValidation()) > 0) {
                $validator = Validator::make($request->all(), $this->model->setValidation());

                if ($validator->fails()) {
                    return jsend_fail($validator->errors());
                }
            }
            return jsend_success($this->model->create($request->all()));
        }catch (\Exception $e) {
            return jsend_error('Error al guardar: '.$e->getMessage());
        }catch (QueryException $ex) {
            return jsend_error('Error SQL: '.$ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            try {
                return jsend_success($this->model->find($id));
            } catch (\Exception $e) {
                return jsend_error('Error al retornar registro: ' . $e->getMessage());
            } catch (QueryException $ex) {
                return jsend_error('Error SQL: ' . $ex->getMessage());
            }
        } else {
            return jsend_error('Error : Verificar que el ID sea numerico...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_numeric($id)) {
            try {
                return jsend_success($this->model->update($request->all(),$id));
            }catch (\Exception $e) {
                return jsend_error('Error al actualizar registro: '.$e->getMessage());
            }catch (\Illuminate\Database\QueryException $ex) {
                return jsend_error('Error SQL: '.$ex->getMessage());
            }
        } else {
            return jsend_error('Error : Verificar que el ID sea numerico...');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_numeric($id)) {
            try {
                return jsend_success($this->model->destroy($id));
            } catch (\Exception $e) {
                return jsend_error('Error al desactivar registro: ' . $e->getMessage());
            } catch (QueryException $ex) {
                return jsend_error('Error SQL: ' . $ex->getMessage());
            }
        } else {
            return jsend_error('Error : Verificar que el ID sea numerico...');
        }

    }

}

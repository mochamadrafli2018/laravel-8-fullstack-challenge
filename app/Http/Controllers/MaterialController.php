<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MaterialController extends Controller
{   
    /**
    * Create New Data.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        // Validate data with built in validator
        $validator = Validator::make($request->all(), [
                // check if name in table is already exist with unique:table_name
                'name' => 'required|string|max:255|unique:materials_db',
            ],
            [
                'name.required' => 'Name can not be empty!',
            ]
        );
        // if validator fail
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
                'error'    => $validator->errors()
            ],400);
        }
        // generate id
        $id_generator = IdGenerator::generate([
            'table' => 'materials_db',
            'length' => 7,
            'prefix' => 'MAT-'
        ]);
        // get shorten of name
        $string = $request->input('name');
        $upper_case = strtoupper($string);
        $string = substr($upper_case, 0, 3);
        // final id
        $id = $id_generator."-".$string;
        // create new Material data
        $new_data = Material::create([
            'id' => $id,
            'name' => $request->input('name'),
        ]);
        // if create new Material success
        if ($new_data) {
            return response()->json([
                'new_data' => $new_data 
            ],200);
        } 
        else {
            return response()->json([
                'message' => 'Fail to save new Material',
            ],500);
        }
    }
    /**
    * Retrieve All Data.
    * @return \Illuminate\Http\Response
    */
    public function getAll()
    {
        $all_data = Material::all();
        return response()->json([
            'materials' => $all_data
        ], 200);
    }
    /**
    * Get Data By Id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function findById(request $request, $id)
    {
        $data = Material::find($id);
        if ($data) {
            return response()->json([
                'material' => $data
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Get Data By Name.
    * @param  \Illuminate\Http\Request  $request, $name
    * @return \Illuminate\Http\Response
    */
    public function findByName(request $request, $name) 
    {
        $data = Material::where('name', $name)->get("id")[0]->id;
        if ($data) {
            return response()->json([
                "id" => $data
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Update Data By Id.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function updateById(Request $request, $id)
    {
        $data = Material::find($id);
        if ($data) {
            // update data
            $data->update([
                'name' => $request->input('name'),
            ]);
            // if data was updated
            return response()->json([
                'updated_data' => $data,
                'message' => 'Success update data'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Delete Data By Id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function deleteById($id)
    {
        $data = Material::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Success delete data'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Delete All Data.
    * @return \Illuminate\Http\Response
    */
    public function deleteAll()
    {
        $all_data=Material::all();
        $all_data->each->delete();
        return response()->json([
            'message' => 'Success delete all data'
        ], 200);
    }
}

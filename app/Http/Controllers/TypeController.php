<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{   
    public function index() {
        return view('pages.index');
    }  

    public function items() {
        $items = Type::all();
        // $kinds = Material::find($id);

        return view('pages.items', [
            'items'=>$items,
        ]);
    }
    /**
    * Create New Data.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        // $chategory->input('chategory');
        // $material=Material::find($chategory);
        // $material_id=$material->id;
        // Validate data with built in validator
        $validator = Validator::make($request->all(), [
                // check if id in table is already exist with unique:table_name
                'id' => 'required|string|max:255|unique:types_db',
                'name' => 'required|string|max:255',
            ],
            [
                'name.required' => 'Name can not be empty!',
            ]
        );
        // if validator fail
        if($validator->fails()) 
        {
            return response()->json([
                'message' => $validator->messages(),
                'error'    => $validator->errors()
            ],400);
        }
        // create new type data in types_db
        $new_data = Type::create([
            'id' => $request->input('id'),
            'material_id' => $request->input('material_id'),
            'name' => $request->input('name'),
        ]);
        // if create new type success
        if ($new_data) {
            return response()->json([
                'new_data' => $new_data,
            ],200);
        } 
        else {
            return response()->json([
                'message' => 'Fail to save new Type',
            ],500);
        }
    }
    /**
    * Retrieve All Data.
    * @return \Illuminate\Http\Response
    */
    public function getAll()
    {
        $types = Type::all();
        return response()->json([
            'types' => $types
        ], 200);
    }
    /**
    * Get Type data by id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function findById(request $request, $id)
    {
        $data = Type::find($id);
        if ($data) {
            return response()->json([
                'type' => $data
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
        $data = Type::find($id);
        if ($data) {
            // update data
            $data->update([
                'id' => $request->input('id'),
                'material_id' => $request->input('material_id'),
                'name' => $request->input('name'),
            ]);
            // if data was updated
            return response()->json([
                'message' => 'Success update data'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Delete Data by id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function deleteById(request $request, $id)
    {
        $data=Type::find($id);
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
        $all_data=Type::all();
        $all_data->each->delete();
        return response()->json([
            'message' => 'Success delete all data'
        ], 200);
    }
}

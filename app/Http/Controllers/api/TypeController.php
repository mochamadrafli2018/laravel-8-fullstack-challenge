<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{   
    /**
    * Add new Type.
    * @param  \Illuminate\Http\Request  $request
    */
    public function newTypeData(Request $request)
    {
        // Validate data with built in validator
        $validator = Validator::make($request->all(), [
                // check if Type_id is already exist or not with unique:table_name
                'id' => 'required|string|max:255|unique:Type_db',
                // check if Type_id is already exist or not with unique:table_name
                'material_id' => 'required|string|max:255|unique:Type_db',
                'name' => 'required|string|max:255',
            ],
            [
                'id.required' => 'Id can not be empty!',
                'material_id.required' => 'Material id can not be empty!',
                'nama.required' => 'Name can not be empty!',
            ]
        );
        // if validator fail
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
                'error'    => $validator->errors()
            ],400);
        }
        // create new Type data
        $newTypeData = Type::create([
            'id' => $request->input('id'),
            'material_id' => $request->input('material_id'),
            'name' => $request->input('name'),
        ]);
        // if create new Type success
        if ($newTypeData) {
            return response()->json([
                'newTypeData' => $newTypeData 
            ],200);
        } 
        else {
            return response()->json([
                'message' => 'Fail to save new Type',
            ],500);
        }
    }
    /**
    * Retrieve all Type data from database.
    */
    public function getAllTypeData()
    {
        $types = Type::all();
        return response()->json([
            'types' => $types
        ], 200);
    }
    /**
    * Get Type data by id.
    * @param  \Illuminate\Http\Request  $request, $id
    */
    public function findTypeDataById(request $request, $id)
    {
        // assign Types_db to variable Types
        $type = Type::find($id);
        if ($type) {
            return response()->json([
                'Type' => $type
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Delete Type by id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function deleteTypeDataById($id)
    {
        $type=Type::find($id);
        $type->delete();
        return response()->json([
            'message' => 'Success delete data'
        ], 200);
    }
    /**
    * Delete all Type data from database.
    */
    public function deleteAllTypeData()
    {
        $types=Type::all();
        $types->each->delete();
        return response()->json([
            'message' => 'Success delete all data'
        ], 200);
    }
}

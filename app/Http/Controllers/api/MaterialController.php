<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{   
    /**
    * Add new Material.
    * @param  \Illuminate\Http\Request  $request
    */
    public function newMaterial(Request $request)
    {
        // Validate data with built in validator
        $validator = Validator::make($request->all(), [
            // check if Type_id is already exist or not with unique:table_name
            'id' => 'required|string|max:255|unique:Type_db',
            'name' => 'required|string|max:255',
        ],
        [
            'id.required' => 'id can not be empty!',
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
        // create new Material data
        $newMaterial = Material::create([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
        ]);
        // if create new Material success
        if ($newMaterial) {
            return response()->json([
                'newMaterial' => $newMaterial 
            ],200);
        } 
        else {
            return response()->json([
                'message' => 'Fail to save new Material',
            ],500);
        }
    }
    /**
    * Retrieve all Material data from database.
    */
    public function getAllMaterial()
    {
        $materials = Material::all();
        return response()->json([
            'materials' => $materials
        ], 200);
    }
    /**
    * Get Material data by id.
    * @param  \Illuminate\Http\Request  $request, $id
    */
    public function findMaterialById(request $request, $id)
    {
        // assign Materials_db to variable Materials
        $material = Material::find($id);
        if ($material) {
            return response()->json([
                'material' => $material
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Data not found',
        ], 500);
    }
    /**
    * Delete Material by id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function deleteMaterialById($id)
    {
        $material=Material::find($id);
        $material->delete();
        return response()->json([
            'message' => 'Success delete data'
        ], 200);
    }
    /**
    * Delete all Material data from database.
    */
    public function deleteAllMaterial()
    {
        $materials=Material::all();
        $materials->each->delete();
        return response()->json([
            'message' => 'Success delete all data'
        ], 200);
    }
}

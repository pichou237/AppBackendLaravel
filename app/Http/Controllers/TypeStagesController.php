<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeStages;

class TypeStagesController extends Controller
{
 /**
         * @OA\Get(
         *     path="/api/typeStages",
         *     tags={"TypeStages"},
         *     summary="Lister tous les Type de Stages",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des Type de Stages",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeStage"))
         *     )
         * )
    */

    public function index(){
        return TypeStages::all();
    }


/**
     * @OA\Get(
     *     path="/api/TypeStage/{id}",
     *     tags={"TypeStages"},
     *     summary="recuperation d'un Type de Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'un Type de Stages precise en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeStage"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $TypeStage = TypeStages::findOrFail($id);

    return [$TypeStage];
}




/**
     * @OA\Post(
     *     path="/api/TypeStage",
     *     tags={"TypeStages"},
     *     summary="Insertion d'un nouveau Type de Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'une nouveau Type de Stages dans la table TypeStages",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeStage"))
     *     )
     * )
*/


public function store(Request $request){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',
      ]);

      TypeStages::create($request->all());
    return redirect()->route('posts.index')
    ->with('success', 'TypeStages created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/TypeStage/{id}",
     *     tags={"TypeStages"},
     *     summary="Suppression d'un Type de Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'un Type de Stages dans la table TypeStages",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeStage"))
     *     )
     * )
*/

    public function destroy($id){

        $Niveau = TypeStages::find($id);
        $Niveau->delete();
        return redirect()->route('posts.index')
        ->with('success', 'TypeStages deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/TypeStage/{id}",
     *     tags={"TypeStages"},
     *     summary="Mise a jour d'un Type de Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'un Type de Stages dans la table TypeStages",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeStage"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'label' =>'required',

      ]);

        $TypeStage = TypeStages::find($id);
        $TypeStage->update($request->all());

        return redirect()->route('posts.index')
        ->with('success', 'TypeStages updated successfully.');
    }
}

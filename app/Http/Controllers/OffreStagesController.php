<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OffreStages;

class OffreStagesController extends Controller{
/**
         * @OA\Get(
         *     path="/api/offreStages",
         *     tags={"OffreStages"},
         *     summary="Lister tous les offre de Stages",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des offre de Stages",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OffreStage"))
         *     )
         * )
    */

    public function index(){
        return OffreStages::all();
    }


/**
     * @OA\Get(
     *     path="/api/offreStages/{id}",
     *     tags={"OffreStages"},
     *     summary="recuperation d'une offre de Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'une offre de Stages precise en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OffreStage"))
     *     )
     * )
*/

function findOffre(Request $request){
    $id= $request->id;
    dd($id);
    $offreStages = OffreStages::findOrFail($id);

    return $offreStages;
}




/**
     * @OA\Post(
     *     path="/api/offreStages",
     *     tags={"OffreStages"},
     *     summary="Insertion d'une nouvel offre Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'une offre de Stages niveau dans la table offreStages",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OffreStage"))
     *     )
     * )
*/


public function store(Request $request){
    $request->validate([
        'id' => 'required',
        'title' => 'required',
        'description' =>'required',
        'idate_debutd' => 'required',
        'date_fin' => 'required',
        'renumeration' =>'required',
        'places' => 'required',
        'condition_admin' => 'required',
        'competences' =>'required',
        'id_ent' => 'required',
        'id_typestage' => 'required',
        'id_sect' =>'required',
      ]);

      OffreStages::create($request->all());
    return redirect()->route('posts.index')
    ->with('success', 'etablissement created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/offreStages/{id}",
     *     tags={"OffreStages"},
     *     summary="Suppression d'un offre ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'un offre de Stages dans la table offreStages",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OffreStage"))
     *     )
     * )
*/

    public function destroy($id){

        $offreStage = OffreStages::find($id);
        $offreStage->delete();
        return redirect()->route('posts.index')
        ->with('success', 'etablissement deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/offreStages/{id}",
     *     tags={"OffreStages"},
     *     summary="Mise a jour d'un offre de Stages ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'un offre de Stages dans la table offreStages",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OffreStage"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'title' => 'required',
        'description' =>'required',
        'idate_debutd' => 'required',
        'date_fin' => 'required',
        'renumeration' =>'required',
        'places' => 'required',
        'condition_admin' => 'required',
        'competences' =>'required',
        'id_ent' => 'required',
        'id_typestage' => 'required',
        'id_sect' =>'required',
      ]);

        $offreStage = OffreStages::find($id);
        $offreStage->update($request->all());

        return redirect()->route('posts.index')
        ->with('success', 'etablissement updated successfully.');
    }
}


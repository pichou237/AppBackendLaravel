<?php

namespace App\Http\Controllers;

use App\Models\Candidatures;
use Illuminate\Http\Request;

class CandidaturesController extends Controller
{
    //

    /**
         * @OA\Get(
         *     path="/api/candidatures",
         *     tags={"Candidatures"},
         *     summary="Lister tous les candidatures",
         *     @OA\Response(
         *         response=200,
         *         description="Liste des candidatures",
         *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Etudiant"))
         *     )
         * )
    */

    public function index(){
        return Candidatures::all();
    }


/**
     * @OA\Get(
     *     path="/api/candidatures/{id}",
     *     tags={"Candidatures"},
     *     summary="recuperation d'un candidat ",
     *     @OA\Response(
     *         response=200,
     *         description="Recuperation d'un candidat precis en fonction de son identifiant",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Candidature"))
     *     )
     * )
*/

function findEtudiant(Request $request){
    $id= $request->id;
    $candidature = Candidatures::findOrFail($id);

    return [$candidature];
}




/**
     * @OA\Post(
     *     path="/api/candidatures",
     *     tags={"Candidatures"},
     *     summary="Insertion d'un nouveau candidat ",
     *     @OA\Response(
     *         response=200,
     *         description="Insertion d'un nouveau candidat dans la table candidatures",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Candidature"))
     *     )
     * )
*/


public function store(Request $request)
{
$request->validate([
  'id' => 'required',
  'date_depot' => 'required',
  'status' =>'required',
  'matricule' => 'required',
  'id_offre' => 'required',
]);

Candidatures::create($request->all());
return redirect()->route('posts.index')
  ->with('success', 'Candidat created successfully.');
}


  /**
     * @OA\Delete(
     *     path="/api/candidatures/{id}",
     *     tags={"Candidatures"},
     *     summary="Suppression d'un candidat ",
     *     @OA\Response(
     *         response=200,
     *         description="Suppression d'un etudiant dans la table candidat",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Candidature"))
     *     )
     * )
*/

    public function destroy($id){

        $candidature = Candidatures::find($id);
        $candidature->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Candidat deleted successfully');
    }

/**
     * @OA\Put(
     *     path="/api/etudiants/{id}",
     *     tags={"Candidatures"},
     *     summary="Mise a jour d'un candidat ",
     *     @OA\Response(
     *         response=200,
     *         description="Mise a jour d'un candidat dans la table candidatures",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Candidature"))
     *     )
     * )
*/



public function update(Request $request, $id){
    $request->validate([
        'id' => 'required',
        'date_depot' => 'required',
        'status' =>'required',
        'matricule' => 'required',
        'id_offre' => 'required',
      ]);

$candidature = Candidatures::find($id);
$candidature->update($request->all());

return redirect()->route('posts.index')
  ->with('success', 'Candidat updated successfully.');
}

}

<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Corona;
use App\Repositories\CoronaRepositoryInterface;

class CoronaRepository implements CoronaRepositoryInterface{

    public function showall(){
        return Corona::all();
    }

    public function save(Request $request){
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        Corona::create($validatedData);
    }

    public function findById($id){
        return Corona::findOrFail($id);
    }

    public function delete($id){
        $del = Corona::findOrFail($id);
        $del->delete();
    }

    public function revise(Request $request, $id){
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        Corona::whereId($id)->update($validatedData);
    }

}

?>
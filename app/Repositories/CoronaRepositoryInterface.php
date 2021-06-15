<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Corona;

interface CoronaRepositoryInterface {

    public function showall();
    //public function add();
    public function findById($id);
    public function save(Request $request);
    public function revise(Request $request, $id);
    public function delete($id);

}

?>
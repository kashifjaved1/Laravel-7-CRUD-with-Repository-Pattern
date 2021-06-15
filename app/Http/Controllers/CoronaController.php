<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CoronaRepositoryInterface;
use App\Corona;

class CoronaController extends Controller
{
    private $repo;

    public function __construct(CoronaRepositoryInterface $repobj)
    {
        $this->repo = $repobj;
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coronacases = $this->repo->showall();
        return view('index', compact('coronacases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repo->save($request);
        return redirect('/coronas')->with('success', 'Corona Case is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coronacase = $this->repo->findById($id);
        return view('edit', compact('coronacase'));
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
        $this->repo->revise($request, $id);
        return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect('/coronas')->with('success', 'Corona Case Data is successfully deleted');
    }
}

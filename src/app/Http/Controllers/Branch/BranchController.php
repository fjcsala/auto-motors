<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    private $branch;

    protected function getStates ()
    {
        return array
        (
            'AC', 'AL', 'AP', 'AM', 'BA',
            'CE', 'DF', 'ES', 'GO', 'MA',
            'MT', 'MS', 'MG', 'PA', 'PB',
            'PR', 'PE', 'PI', 'RJ', 'RN',
            'RS', 'RO', 'RR', 'SC', 'SP',
            'SE', 'TO'
        );
    }

    public function __construct (Branch $branch)
    {
        $this -> branch = $branch;
    }

    public function register ()
    {
        $states = $this -> getStates();

        return view ('home.branch.register.index',compact('states'));
    }

    public function create (Request $request)
    {
        $dataForm = $request -> all();

        $validateForm = validator($dataForm, $this -> branch -> rules, $this -> branch -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect('home/branch/register') -> withErrors($validateForm) -> withInput();
        }

        $create = $this -> branch -> create($dataForm);

        return redirect('home/branch/list');
    }

    public function edit (Request $request, $id)
    {
        $dataDB = $this -> branch -> find($id);

        $states = $this -> getStates();

        return view('home.branch.edit.index', compact('dataDB', 'states'));
    }

    public function update (Request $request, $id)
    {
        $dataForm = $request -> all();

        $branchEdit = $this -> branch -> find($id);

        $validateForm = validator($dataForm, $this -> branch -> rules, $this -> branch -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect("/home/branch/edit/{$id}") -> withErrors($validateForm) -> withInput();
        }

        $branchEdit -> update($dataForm);

        return redirect('/home/branch/list');
    }

    public function active (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $branchEdit = $this -> branch -> find($id);

        $branchEdit -> where('id', '=', $id) -> update(['status' => 1]);

        return redirect('/home/branch/list');
    }

    public function inactive (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $branchEdit = $this -> branch -> find($id);

        $branchEdit -> where('id', '=', $id) -> update(['status' => 0]);

        return redirect('/home/branch/list');
    }

    public function list ()
    {
        $dataDB = $this -> branch -> all();
        
        return view('home.branch.list.index', compact('dataDB'));
    }

    public function listTest ()
    {
        $dataBranch = $this -> branch -> all();

        return view('home.branch.list.v2.index', compact('dataBranch'));
    }

    public function read ()
    {
        // read
    }
}
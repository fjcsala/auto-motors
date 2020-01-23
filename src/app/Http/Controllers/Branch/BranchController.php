<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    private $branch;

    private $itensPage = 3;

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

    public function registerBeta ()
    {
        $states = $this -> getStates();

        return view ('home.branch.register.beta.index',compact('states'));
    }

    public function create (Request $request)
    {
        $dataForm = $request -> all();

        $validateForm = validator($dataForm, $this -> branch -> rules, $this -> branch -> errorMessages);

        if ($validateForm -> fails())
        {
            return redirect('home/branch/register') -> withErrors($validateForm) -> withInput();
        }

        $newBranch = $this -> branch -> create($dataForm);

        return redirect('home/branch/list');
    }

    public function edit (Request $request, $id)
    {
        $dataBranch = $this -> branch -> find($id);

        $states = $this -> getStates();

        return view('home.branch.edit.index', compact('dataBranch', 'states'));
    }

    public function editBeta (Request $request, $id)
    {
        $dataBranch = $this -> branch -> find($id);

        $states = $this -> getStates();

        return view('home.branch.edit.beta.index', compact('dataBranch', 'states'));
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

        $branchActive = $this -> branch -> find($id);

        $branchActive -> where('id', '=', $id) -> update(['status' => 1]);

        return redirect('/home/branch/list');
    }

    public function inactive (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $branchInactive = $this -> branch -> find($id);

        $branchInactive -> where('id', '=', $id) -> update(['status' => 0]);

        return redirect('/home/branch/list');
    }

    public function list ()
    {
        $dataBranch = $this -> branch -> paginate($this -> itensPage);
        
        return view('home.branch.list.index', compact('dataBranch'));
    }

    public function view (Request $request, $id)
    {
        $dataBranch = $this -> branch -> find($id);

        return view('home.branch.view.index', compact('dataBranch'));
    }

    public function listBeta ()
    {
        $dataBranch = $this -> branch -> all();

        return view('home.branch.list.beta.index', compact('dataBranch'));
    }

    public function remove (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $branchRemove = $this -> branch -> find($id);

        $branchRemove -> delete();

        return redirect() -> route('branch.list');
    }
}
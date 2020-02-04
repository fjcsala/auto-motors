<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Car;
use App\Models\Ie;
use PDF;

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

    public function __construct (Branch $branch, Employee $employee, Car $car, Ie $ie)
    {
        $this -> branch = $branch;
        $this -> employee = $employee;
        $this -> car = $car;
        $this -> ie = $ie;
    }

    public function verifyEmployee ($id)
    {
        $verifyEmployee = 0;

        $verifyEmployee = $this -> employee :: where('id_branch', $id) -> count();

        return ($verifyEmployee);
    }

    public function verifyCar ($id)
    {
        $verifyCar = 0;

        $verifyCar = $this -> car :: where('id_branch', $id) -> count();

        return ($verifyCar);
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

        return redirect() -> route('branch.list') -> with('message', 'FILIAL CADASTRADA COM SUCESSO!');
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

        return redirect() -> route('branch.list') -> with('message', 'FILIAL ATUALIZADA COM SUCESSO!');
    }

    public function active (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $branchActive = $this -> branch -> find($id);

        $branchActive -> where('id', '=', $id) -> update(['status' => 1]);

        return redirect() -> route('branch.list') -> with('message', 'FILIAL ATIVADA COM SUCESSO!');
    }

    public function inactive (Request $request, $id)
    {
        $dataForm = $request -> only('id');

        $branchInactive = $this -> branch -> find($id);

        $branchInactive -> where('id', '=', $id) -> update(['status' => 0]);

        return redirect() -> route('branch.list') -> with('message', 'FILIAL DESATIVADA COM SUCESSO!');
    }

    public function list ()
    {
        $dataBranch = $this -> branch -> all();
        
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

        $verifyEmployee = $this -> verifyEmployee($id);

        $verifyCar = $this -> verifyCar($id);

        if (($verifyEmployee != 0) && ($verifyCar != 0))
        {
            return redirect() -> route('branch.list') -> with('message', 'ERRO! - EXISTEM FUNCIONÁRIOS E AUTOMÓVEIS VINCULADOS!');
        }

        elseif (($verifyEmployee != 0))
        {
            return redirect() -> route('branch.list') -> with('message', 'ERRO! - EXISTEM FUNCIONÁRIOS VINCULADOS!');
        }

        elseif (($verifyCar != 0))
        {
            return redirect() -> route('branch.list') -> with('message', 'ERRO! - EXISTEM AUTOMÓVEIS VINCULADOS!');
        }

        else
        {
            $dataBranch = $this -> branch -> find($id);
            $dataBranch -> delete();
        
            return redirect() -> route('branch.list') -> with('message', 'FILIAL REMOVIDA COM SUCESSO!');
        }
    }

    public function ieMask ($uf)
    {
        $dataajax = $this -> ie :: where('uf', $uf) -> get() -> first() -> ie_mask;
        $iemask = $dataajax;
        return ($iemask);
    }

    public function listPdf ()
    {
        // $dataBranch = Branch :: findMany([1, 4, 5]); // return only array data.
        $dataBranch = Branch :: find([1, 3, 5]); // return only array data.
        // $dataBranch = Branch :: whereIn('id', [1, 4, 5]) -> get();  // return only array data.
        // $dataBranch = Branch :: all(); // return all data.
        $reportPdf = PDF :: loadview('home.branch.list.pdf.index', compact('dataBranch')) -> setPaper('a4', 'landscape')-> stream('listagem-de-filiais.pdf');
        // download('listagem-de-filiais.pdf') // download file.
        // stream('listagem-de-filiais.pdf') // open in browser.
        // setPaper('a4', 'landscape') // set a4 paper and landscape orientation. default orientation retract.
        return $reportPdf;
    }
}
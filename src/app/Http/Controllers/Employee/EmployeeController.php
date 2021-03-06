<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Branch;
use PDF;
use Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;

class EmployeeController extends Controller
{
    private $employee;
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

    protected function getSex ()
    {
        return array
        (
            'Feminino', 'Masculino', 'Outro'
        );
    }

    // function format birth date
    // (0000-00-00) -> (00-00-0000)
    // (00-00-0000) -> (0000-00-00)
    public function formatBirthDate ($data)
    {
        if (isset($data))
        {
            $data = str_replace('/', '-', $data);
            $data = explode('-', $data);
            $data = $data[2].'-'.$data[1].'-'.$data[0];
        }
        return $data;
    }

    // function format salary
    // (1.234,56) -> (1234.56)
    function formatSalary ($data)
    {
        if (isset($data))
        {
            $data = str_replace('.', '', $data);
            $data = str_replace(',', '.', $data);
        }
        return $data;
    }

    function cryptPassword ($data)
    {
        if (isset($data))
        {
            $data = Hash::make($data);
        }
        return $data;
    }

    public function __construct (Employee $employee, Branch $branch)
    {
        $this -> employee = $employee;
        $this -> branch = $branch;
    }

    public function register ()
    {
        $dataDB = $this -> branch -> all();
        $sex = $this -> getSex();
        $states = $this -> getStates();
        return view ('home.employee.register.index', compact('dataDB', 'states', 'sex'));
    }

    public function registerBeta ()
    {
        $dataDB = $this -> branch -> all();
        $sex = $this -> getSex();
        $states = $this -> getStates();
        return view ('home.employee.register.beta.index', compact('dataDB', 'states', 'sex'));
    }

    public function create (Request $request)
    {
        $dataForm = $request -> all();
        $validateForm = validator($dataForm, $this -> employee -> updateRules, $this -> employee -> errorMessages);
        if ($validateForm -> fails())
        {
            return back() -> withErrors($validateForm) -> withInput();
        }
        // format brith_date
        $dataForm['birth_date'] = $this -> formatBirthDate($dataForm['birth_date']);
        // format salary
        $dataForm['salary'] = $this -> formatSalary($dataForm['salary']);
        // crypt password
        $dataForm['password'] = $this -> cryptPassword($dataForm['password']);
        $newEmployee = $this -> employee -> create($dataForm);
        return redirect() -> route('employee.list') -> with('message', 'FUNCIONÁRIO CADASTRADO COM SUCESSO!');
    }

    public function edit (Request $request, $id)
    {
        $dataEmployee = $this -> employee -> find($id);
        // format brith_date
        $dataEmployee['birth_date'] = $this -> formatBirthDate($dataEmployee['birth_date']);
        $dataBranch = $this -> branch -> all();
        $states = $this -> getStates();
        $sex = $this -> getSex();
        return view('home.employee.edit.index', compact('dataEmployee', 'dataBranch', 'states', 'sex'));
    }

    public function editBeta (Request $request, $id)
    {
        $dataEmployee = $this -> employee -> find($id);
        // format brith_date
        $dataEmployee['birth_date'] = $this -> formatBirthDate($dataEmployee['birth_date']);
        $dataBranch = $this -> branch -> all();
        $states = $this -> getStates();
        $sex = $this -> getSex();
        return view('home.employee.edit.beta.index', compact('dataEmployee', 'dataBranch', 'states', 'sex'));
    }

    public function update (Request $request, $id)
    {
        $dataForm = $request -> all();
        $employeeEdit = $this -> employee -> find($id);
        $dataValidate = validator($dataForm, $this -> employee -> updateRules, $this -> employee -> errorMessages);
        if ($dataValidate -> fails())
        {
            return redirect ("/home/employee/edit/{$id}") -> withErrors($dataValidate) -> withInput();
        }
        // format brith_date
        $dataForm['birth_date'] = $this -> formatBirthDate($dataForm['birth_date']);
        // format salary
        $dataForm['salary'] = $this -> formatSalary($dataForm['salary']);
        $employeeEdit -> update($dataForm);
        return redirect() -> route('employee.list') -> with('message', 'FUNCIONÁRIO ATUALIZADO COM SUCESSO!');
    }

    public function active (Request $request, $id)
    {
        $dataForm = $request -> only('id');
        $employeeEdit = $this -> employee -> find($id);
        $employeeEdit -> where('id', '=', $id) -> update(['status' => 1]);
        return redirect() -> route('employee.list') -> with('message', 'FUNCIONÁRIO ATIVADO COM SUCESSO!');
    }

    public function inactive (Request $request, $id)
    {
        $dataForm = $request -> only('id');
        $employeeEdit = $this -> employee -> find($id);
        $employeeEdit -> where('id', '=', $id) -> update(['status' => 0]);
        return redirect() -> route('employee.list') -> with('message', 'FUNCIONÁRIO DESATIVADO COM SUCESSO!');
    }

    public function list ()
    {
        $dataEmployee = $this -> employee -> all();
        $dataBranch = $this -> branch -> all();
        return view('home.employee.list.index', compact('dataEmployee', 'dataBranch'));
    }

    public function view (Request $request, $id)
    {
        $dataEmployee = $this -> employee -> find($id);
        // format brith_date
        $dataEmployee['birth_date'] = $this -> formatBirthDate($dataEmployee['birth_date']);
        $dataBranch = $this -> branch -> all();
        return view('home.employee.view.index', compact('dataEmployee', 'dataBranch'));
    }

    public function listBeta ()
    {
        $dataEmployee = $this -> employee -> all();
        return view('home.employee.list.beta.index', compact('dataEmployee'));
    }

    public function remove (Request $request, $id)
    {
        $dataForm = $request -> only('id');
        $dataEmployee = $this -> employee -> find($id);
        $dataEmployee -> delete();
        return redirect() -> route('employee.list') -> with('message', 'FUNCIONÁRIO REMOVIDO COM SUCESSO!');
    }

    public function login ()
    {
        return view('login.index');
    }

    public function logout ()
    {
        auth() -> guard('employee') -> logout();
        return redirect() -> route('login');
    }

    public function auth (Request $request)
    {
        $dataForm = $request -> all();
        $validator = validator($dataForm, $this -> employee -> loginRules, $this -> employee -> errorMessages);
        if ($validator -> fails())
        {
            return redirect() -> route('login') -> withErrors($validator) -> withInput();
        }
        $credentials = [
            'cpf' => $request -> get('cpf'),
            'password' => $request -> get('password')
        ];
        // dd($credentials);
        if (auth() -> guard('employee') -> attempt($credentials)) {
            return redirect() -> route('dashboard');
        } else {
            return redirect() -> route('login') -> withErrors(['errors' => 'LOGIN INVÁLIDO!']) -> withInput();
        }
    }

    public function listPdf (Request $request)
    {
        $dateNow = date('d/m/Y');
        $timeNow = date('H:i');
        $reportTitle = 'LISTAGEM DE FUNCIONÁRIOS';
        $pdfRequest = $request -> only('branchCheckArray');
        $array = ($pdfRequest['branchCheckArray']);
        $array = explode(',', $array);
        $newArray = array();
        for ($i = 0; $i < sizeof($array); $i ++)
        {
            array_push($newArray, $array[$i]);
        }
        $dataEmployee = Employee :: find($newArray); // return only array data.
        $reportPdf = PDF :: loadview('home.employee.list.reports.sintetic.index', compact('dataEmployee', 'reportTitle', 'dateNow', 'timeNow')) -> setPaper('a4', 'landscape')-> stream('listagem-de-funcionarios.pdf');
        return $reportPdf;
    }

    public function exportXls ()
    {
        return Excel :: download(new EmployeeExport, 'listagem-de-funcionarios.xlsx');
    }
}
<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $employee;

    public function __construct(Employee $employee)
    {
        $this -> employee = $employee;
    }

    public function index ()
    {
        return view('login.index');
    }

    public function auth (Request $request)
    {

        $validator = validator($request -> all(), ['password' => 'required']);

        if ($validator -> fails())
        {
            return redirect() -> route('login') -> withErrors(['errors' => 'Erro ao efetuar login']) -> withInput();
        }

        $cpf = $request -> input('cpf');
        $password = $request -> input('password');

        $formPassword = md5($password);

        $dataEmployee = $this -> employee :: where('cpf', $cpf) -> get();

        dd($dataEmployee);

        if ($dataEmployee['password'] === $formPassword)
        {
            return redirect() -> route('dashboard');
        }

        else
        {
            return redirect() -> route('login') -> withErrors(['errors' => 'Erro ao efetuar login']) -> withInput();
        }
    }
}
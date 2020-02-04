/*
    1 - pegar registros das filiais;
    2 - pegar o id de cada filial;
    3 - trabalhar com eventos de seleção no checkbox (check = true, check = false);
    4 - armazenar o id das filiais em um array;
    5 - disparar para o controlador utilizando ajax e post;
    6 - fazer a filtragem das filiais a serem exibidas no relatório através do controller;
    7 - redirecionar para o relatório.
*/

$checkbox = document.querySelector('[data-id="1"]');

$branchCheck = null;

$btnPdf = document.querySelector('[data-js="btn-pdf"]');

$url = "/home/branch/list/pdf";

$ajax = new XMLHttpRequest();

// console.log($checkbox);
// console.log($btnPdf);
// console.log($url);

$btnPdf.addEventListener('click', submitBranchCheck, false);

function submitBranchCheck ()
{
    // window.alert('Clicou');

    $ajax.open("POST", $url);
    $ajax.send($);
}

/*

$url = "/home/branch/list/pdf";

$branchList = null;

$branchList = [1, 2, 5];

$ajax = new XMLHttpRequest();

$ajax.open('GET', $url);

$ajax.send($branchList);

$ajax.addEventListener('readystatechange', stateChange);

function stateChange ()
{
    if (requestSuccess())
    {
        
    }
}

function requestSuccess()
{
    return $ajax.readyState === 4 && $ajax.status === 200;
}

$checkbox.addEventListener('change', check, false);

function check ()
{
    if ($checkbox.checked)
    {
        window.alert('Check!');
        $branchList = $checkbox.value;
        console.log($branchList);
    }

    else
    {
        window.alert('Uncheck!');
        $branchList = $checkbox.value;
        console.log($branchList);
    }
}

*/
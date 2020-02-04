// $checkbox = document.querySelector('[data-id="1"]');

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

/*

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
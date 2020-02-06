/*
    1 - pegar registros das filiais; X
    2 - pegar o id de cada filial; X
    3 - trabalhar com eventos de seleção no checkbox (check = true, check = false); X
    4 - armazenar o id das filiais em um array; X
    5 - adicionar e remover a id das filiais no array; X
    6 - disparar para o controlador utilizando post; X
    7 - fazer a filtragem das filiais a serem exibidas no relatório através do controller; X
    8 - redirecionar para o relatório. X
*/

$checkList = [];
$checkbox = document.querySelectorAll('[data-js="branchCheck"]');
$branchCheckArray = document.querySelector('[data-js="branchCheckArray"]');

Array.prototype.forEach.call($checkbox, function($element, $index, $array)
{
    // console.log($element.value);

    $element.addEventListener('change', function()
    {
        if ($element.checked === true)
        {
            $checkList.push($element.value);
        }
        else
        {
            $index = $checkList.indexOf($element.value);

            function removeValue ($array)
            {
                return $array != $element.value;
            }

            $newCheckList = $checkList.filter(removeValue);

            $checkList = $newCheckList;
        }
        console.log($branchCheckArray.value);

        setValue ($branchCheckArray, $checkList);

        console.log($branchCheckArray.value);
    }, false);
});

function setValue($element, $value)
{
    $element.setAttribute("value", $value.toString());
}
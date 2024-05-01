<?php 
$result = "";
class Converter
{
    public $numb;

    function selectConverter($case)
    {
        switch($case)
        {
            case 'CtoK':
            return $this->numb + 273.15 . " Kelvin";
            break;

            case 'CtoF':
            return $this->numb * 1.8 + 32 . " Fahrenheit";
            break;

            case 'khtosm':
            return $this->numb / 3.6 . " seconds per meters";
            break;

            case 'khtok':
            return $this->numb * 0.5399568035 . " knots";
            break;

            case 'kgtog':
            return $this->numb * 100 . " grams";
            break;

            case 'gtokg':
            return $this->numb * 0.01 . " kilograms";
            break;

            default:
            return "Sorry No command found";
        }   
    }
    function getResult($numb, $res)
    {
        $this->numb= $numb;
        return $this->selectConverter($res);
    }
}

$con = new Converter();
if(isset($_POST['submit']))
{   
    $result = $con->getResult($_POST['numb'],$_POST['con']);
}
?>

<form method="post">
<table>
    <tr>
        <td>Select Conversion</td>
        <td><select name="con">
            <option value="CtoK">Celsius to Kelvin</option>
            <option value="CtoF">Celsius to Fahrenheit</option>
            <option value="khtosm">km/h to m/s</option>
            <option value="khtok">km/h to knots</option>
            <option value="kgtog">kilograms to grams</option>
            <option value="gtokg">grams to kilograms</option>
        </select></td>
    </tr>
    <tr>
        <td>Enter Number</td>
        <td><input type="text" name="numb"></td>
    </tr>

    <tr>
        <td><input type="submit" name="submit" value="Result"></td>
    </tr>

    <tr>
        <td><strong><?php echo $result; ?><strong></td>
    </tr>

</table>
</form>
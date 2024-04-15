<?php 
declare(strict_types=1);

$result = 0;
class Calculator
{
    public $a; // new public property in a class
    public $b;

    function chooseCalculation($calculation)
    {
        switch($calculation)
        {
            case '+':
            return $this->a + $this->b;
            break;

            case '-':
            return $this->a - $this->b;
            break;

            case '*':
            return $this->a * $this->b;
            break;

            case '/':
            return $this->a / $this->b;
            break;

            default:
            return "Sorry No command found";
        }   
    }
    function getResult($a, $b, $c) //method to assign input to variables
    {
        $this->a = $a;
        $this->b = $b;
        return $this->chooseCalculation($c);
    }
}

$cal = new Calculator(); //new instance of the class calculator
if(isset($_POST['submit'])) //checks if something is submitted
{   
    $result = $cal->getResult($_POST['number1'],$_POST['number2'],$_POST['calculation']); //result gets a new instance of calculator that usess getResult method to get input to variables and then chooseCalculation switches the case of calculation to deliver the result to the chosen math problem
}
?>

<form method="post">
<table>
    <tr>
        <td>Enter 1st Number</td>
        <td><input type="text" name="number1"></td>
    </tr>

    <tr>
        <td>Enter 2nd Number</td>
        <td><input type="text" name="number2"></td>
    </tr>

    <tr>
        <td>Select Calculation</td>
        <td><select name="calculation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select></td>
    </tr>

    <tr>
        <td><input type="submit" name="submit" value="Result"></td>
    </tr>

    <tr>
        <td><strong><?php echo $result; ?><strong></td>
    </tr>

</table>
</form>


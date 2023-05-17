<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Tasks</title>
</head>
<body>
    <?php
/*1. Есть имя Stive. 
Если возраст Stive:
    от 0 до 12 - вывести Steve is a child
    с 12 до 18 - вывести Steve is a teenager
иначе 
    - вывести Steve is an adult

Решить задачу 3 – способами:
    1 if-else
    2 switch.
    3 Условный (тернарный) оператор*/
echo "<hr>";
echo "<p style=\"font-weight: bold;\">Task 1 </p><p></p>";

function get_age(int $age = null)
{
   if(!isset($age) || $age < 0) return;

    /*if($age > 0 && $age < 12){
        echo "Steve is a child";
    } else if($age >= 12 && $age < 18){
        echo "Steve is a teenager";
    } else {
        echo "Steve is an adult";
    }*/

    /*switch(true){
        case ($age > 0 && $age < 12):
            echo "Steve is a child";
        break;
        case ($age >= 12 && $age < 18):
            echo "Steve is a teenager";
        break;
        default:
            echo "Steve is an adult";
        break;
    }*/

    echo ($age < 18) ? (($age < 12) ? "Steve is a child" : "Steve is a teenager") : "Steve is an adult";
}

get_age(44);


echo "<hr>";
/*2. Написать с помощью цикла while и for «переворот» числа. Другими словами, нужно создать новое число, у которого цифры шли бы в обратном порядке (например: 472 -> 274).*/
echo "<p style=\"font-weight: bold;\">Task 2 </p><p></p>";

function rev_numb(int $num)
{
    $num .= '';
    $num_rev = '';
    $num_rev_2 = '';
    $count = 0;
    for($i = 0;; $i++){
        if(!isset($num[$i])) break;
        $count++;
    }
    
    for($i = $count-1; $i >= 0; $i--){
        $num_rev .= $num[$i];
    }

    echo $num_rev. "<br>";

    $i = 0;
    while($i < $count){
        $num_rev_2 .= $num[$count - 1 - $i];
        $i++;
    }
    echo $num_rev_2;
}

rev_numb(34568);

echo "<hr>";
/*3. Посчитайте кол-во отрицательных, положительных элементов, элементов со строчным типом данных в произвольном массиве, а также кол-во элементов других типов.*/
echo "<p style=\"font-weight: bold;\">Task 3 </p><p></p>";

function get_num_var(array $arr)
{
    if(count($arr) === 0) return;
    $count_pos = 0;
    $count_neg = 0;
    $count_str = 0;

    for($i = 0;; $i++){
        if(!isset($arr[$i])) break;

        if(is_int($arr[$i]) && $arr[$i] >= 0) $count_pos++;
        if(is_int($arr[$i]) && $arr[$i] < 0) $count_neg++;
        if(is_string($arr[$i])) $count_str++;
    }

    echo "Positive elements " . ($count_pos > 1 ? "are" : " is") ." $count_pos, negative elements " . ($count_neg > 1 ? "are " : " is ") . " $count_neg, string value " . ($count_str > 1 ? "are " : " is ")  . " $count_str";

}

$arr = [1, 2, -3, "a", "hh", "6"];
get_num_var($arr);
echo "<hr>";

/*4. Напишите функцию, которая проверяет, является ли переданная строка палиндромом.*/
echo "<p style=\"font-weight: bold;\">Task 4 </p><p></p>";

function palindr_check(string $val = null)
{
    if(!isset($val)) return;

    $count_char = 0;
    $count_match = null;
    
    for($i = 0;; $i++){
        if(!isset($val[$i])) break;
        $count_char++;
    }

    for($i = 0; $i < $count_char - $i; $i++){
        if($val[$i] === $val[$count_char - 1 - $i]) {
            $count_match = true;
        } else {
            $count_match = false;
            break;
        }
    }
    
    echo "$val is " . ($count_match ? " palindrome" : "no palindrome");

}

palindr_check("23uu32");
echo "<hr>";

/*5. Дан массив с произвольными значениями. Проверить, есть ли в нем одинаковые элементы. Вывести в консоль: “Есть повторки!”, “Нет повторок”.*/
echo "<p style=\"font-weight: bold;\">Task 5 </p><p></p>";

function check_arr_elem_match(array $arr)
{
    if(count($arr) === 0) return;
    // $count_char = 0;
    $count_match = null;

    for($i = 0;; $i++){
        if(!isset($arr[$i])) break;

        for($j = $i + 1;; $j++){
            if(!isset($arr[$j])) break;
            if($arr[$i] === $arr[$j]) $count_match = true;
        }
    }

    echo $count_match ? "Есть повторки!" : "Нет повторок";
}

$arr = [1, 2, 1, -3, "hh", "h", "6"];
check_arr_elem_match($arr);
echo "<hr>";

/*6. Необходимо написать программу, которая проверяет пользователя на знание таблицы умножения. Пользователь сам вводит два целых однозначных числа. Затем вводит результат умножения и в результате должен увидеть на экране правильно он ответил или нет.*/
echo "<p style=\"font-weight: bold;\">Task 6 </p><p></p>";

echo '<form action="/ADD_Tasks/" method="get">

     <p>Enter 1 number from 1 to 10:</p>
     <input type="number" name="number_1" step="1" placeholder="Enter number"></br>

     <p>Enter 2 from 1 to 10:</p>
     <input type="number" name="number_2" step="1" placeholder="Enter number"><br>

     <p>Enter result:</p>
     <input type="number" name="result" step="1" placeholder="Enter number"><br><br>

     <button>Check</button>
     </form>';
echo "</br>";

function check_multy(array $data)
{
    if(count($data) < 1) return;
    
    if(empty($data["number_1"]) || empty($data["number_2"]) || empty($data["result"])) {
        echo "<p>Enter all data!</p>";
    } else {
        $num_1 = $data["number_1"];
        $num_2 = $data["number_2"];
        $result = $data["result"];
        
        $true_result = +$num_1 * +$num_2;
    
        echo "The right result $true_result. " . "<strong>" .(+$result === $true_result ? "A good job!" : "You should learn more.") . "</strong>";
    }
}

check_multy($_GET);
echo "<hr>";

/*7. Заданы два массива. Один содержит наименование услуг, а другой – расценки за эти услуги. Выведите список услуг стоимостью больше 0 на экран.*/
echo "<p style=\"font-weight: bold;\">Task 7 </p><p></p>";

function get_services(array $arr_serv, array $arr_price)
{
    if(count($arr_serv) === 0 || count($arr_price) === 0 || count($arr_serv) != count($arr_price)) return;

    for($i = 0;; $i++){
        if(!isset($arr_serv[$i]) || !isset($arr_price[$i])) break;

        if(+$arr_price[$i] > 0) echo $arr_serv[$i] . " - a charge of the service is $arr_price[$i]$" . "<br>";
    }
}


$arr_1 = ["Cleaning", "Haircut", "Washing", "Laundry"];
$arr_2 = ["2" , "10", "0" , "5"];

get_services($arr_1, $arr_2);
echo "<hr>";

/*8. У треугольника сумма любых двух сторон должна быть больше третьей. Иначе две стороны просто «лягут» на третью и треугольника не получится. Пользователь вводит поочерёдно длины трех сторон. Используя конструкцию if..else (один раз), напишите код, который должен определять, может ли существовать треугольник при таких длинах. Т. е. нужно сравнить суммы двух любых строн с оставшейся третьей стороной. Чтобы треугольник существовал, сумма всегда должна быть больше отдельной стороны.*/
echo "<p style=\"font-weight: bold;\">Task 8 </p><p></p>";

echo '<form action="/ADD_Tasks/" method="get">

     <p>Enter the 1 side of the triangle:</p>
     <input type="number" name="side_1" step="1" placeholder="Enter the side of triangle"></br>

     <p>Enter the 2 side of the triangle:</p>
     <input type="number" name="side_2" step="1" placeholder="Enter the side of triangle"><br>

     <p>Enter the 3 side of the triangle:</p>
     <input type="number" name="side_3" step="1" placeholder="Enter the side of triangle"><br><br>

     <button>Check</button>
     </form>';
echo "</br>";

function check_triangle(array $data)
{   
    if(count($data) < 1) return;

    if(empty($data["side_1"]) || empty($data["side_2"]) || empty($data["side_3"])) {
        echo "<p>Enter all data!</p>";

    } else {
        $side_1 = +$data["side_1"];
        $side_2 = +$data["side_2"];
        $side_3 = +$data["side_3"];

        if((($side_1 + $side_2) > $side_3) && (($side_1 + $side_3) > $side_2) && (($side_3 + $side_2) > $side_1)){
            echo "The triangle will work out.";
        } else {
            echo "The triangle won't work out.";
        }
    }
}

check_triangle($_GET);

echo "<hr>";

/*9. Необходимо вывести на экран числа от 50 до 1 с шагом 2, 5 и 10. */
echo "<p style=\"font-weight: bold;\">Task 9 </p><p></p>";

function num_output(...$num)
{
    if(count($num) === 0) return;
    $nums_1 = '';
    $nums_2 = '';
    $nums_3 = '';
    
    for($i = 50; $i >= 1; $i -= $num[0]){
        $nums_1 .= $i." ";
    }
    echo $nums_1 . "<br>";

    for($i = 50; $i >= 1; $i -= $num[1]){
        $nums_2 .= $i." ";
    }
    echo $nums_2 . "<br>";

    for($i = 50; $i >= 1; $i -= $num[2]){
        $nums_3 .= $i." ";
    }
    echo $nums_3;
}

num_output(2, 5, 10);
echo "<hr>";

/*10. Вывести на экран «прямоугольник», образованный из двух видов символов. Контур прямоугольника должен состоять из одного символа, а в «заливка» — из другого.

##############################
#0000000000000000000000000000#
#0000000000000000000000000000#
#0000000000000000000000000000#
#0000000000000000000000000000#
##############################*/

echo "<p style=\"font-weight: bold;\">Task 10 </p><p></p>";

function pattern($a = 5, $b = 5, $ch_border = '*', $ch_bg = '0')
{
    $str_line = '';
    for($i = 1; $i <= $a; $i++){
        $bg_line = '';
        for($j = 1; $j <= $b; $j++){
            $bg_line .= ($i == 1 || $i == $a) ? $ch_border : $ch_bg;
        }
        $str_line .= $ch_border . $bg_line . $ch_border . '<br>';
    }

    echo '<pre>' . $str_line . '</pre>';
}

pattern(5, 35);

echo "<hr>";

    ?>
</body>
</html>
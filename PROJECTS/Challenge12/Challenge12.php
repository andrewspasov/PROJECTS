<?php
// PART 1
// 1
function decimalToBinary($decimalNumber){
    $binaryNumber = '';

    while ($decimalNumber > 0) {
        $remainder = $decimalNumber % 2;
        $binaryNumber = $remainder . $binaryNumber;
        $decimalNumber = (int)($decimalNumber / 2);
    }

    return $binaryNumber;
}


// echo decimalToBinary($decimalNumber);

// 2
function decimalToRoman($decimal)
{
    if ($decimal > 3999999) {
        return "Error: Number must be less than or equal to 3999999.";
    }

    $romanSymbols = [
        "M" => 1000,
        "CM" => 900,
        "D" => 500,
        "CD" => 400,
        "C" => 100,
        "XC" => 90,
        "L" => 50,
        "XL" => 40,
        "X" => 10,
        "IX" => 9,
        "V" => 5,
        "IV" => 4,
        "I" => 1
    ];

    $roman = '';

    foreach ($romanSymbols as $symbol => $value) {
        while ($decimal >= $value) {
            $roman = $roman . $symbol;
            $decimal = $decimal - $value;
        }
    }

    return $roman;
}

// $decimalNumber = 1333;
// $romanNumber = decimalToRoman($decimalNumber);
// echo "Decimal: $decimalNumber<br>";
// echo "Roman: $romanNumber";


// Part 2 
// 1
function binaryToDecimal($binaryNumber) {
    $decimalNumber = 0;
    $length = strval(strlen($binaryNumber));

    for ($i = 0; $i < $length; $i++) {
        $bit = $binaryNumber[$length - 1 - $i];
        if ($bit == '1') {
            $decimalNumber += pow(2, $i);
        }
    }

    return $decimalNumber;
}


// echo binaryToDecimal('011111');

$num = 15;
$num1 = strval(strlen($num));
echo($num1);



// $binaryNumber = "11011011";
// $decimalNumber = binaryToDecimal($binaryNumber);
// echo "Decimal: " . $decimalNumber;

// 2

function romanToDecimal($romanNumeral) {
    $conversionTable = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];
    
    $decimalNumber = 0;
    $previousValue = 0;
    
    for ($i = strlen($romanNumeral) - 1; $i >= 0; $i--) {
        $currentValue = $conversionTable[$romanNumeral[$i]];
        
        if ($currentValue >= $previousValue) {
            $decimalNumber += $currentValue;
        } else {
            $decimalNumber -= $currentValue;
        }
        
        $previousValue = $currentValue;
    }
    
    return $decimalNumber;
}

// $romanNumeral = "XVI"; // Example Roman numeral: 1973
// $decimalNumber = romanToDecimal($romanNumeral);
// echo $decimalNumber; // Output: 1973

// 3 

function checkNumberType($number) {

    $isRoman = preg_match("/^[IVXLCDM]+$/i", $number);
    $isDecimal = preg_match("/^[-+]?[0-9]+$/", $number);
    $isBinary = strval(preg_match("/^[01]+$/", $number));

    
    $isBinaryInt = intval($isBinary);
    $isDecimalInt = intval($isDecimal);
    if ($isRoman) {
        echo "The number '$number' is Roman.<br>";
        echo "The number '$number' in Decimal is: ";
        echo romanToDecimal($number)."<br>";
        $number2 = romanToDecimal($number);
        echo "The number '$number' in Binary is: ";
        echo decimalToBinary($number2);
    } elseif ($isBinaryInt) {
        echo "The number '$number' is Binary. <br>";
        echo "The number '$number' in Decimal is: ";
        echo binaryToDecimal(strval($number))."<br>";
        echo "The number '$number' in Roman is: ";
        $number3 = binaryToDecimal(strval($number));
        echo decimalToRoman($number3);

    } elseif ($isDecimal) {
        $number = ltrim($number, '+-');

        if($number[0] === '0'){
            return 'Error';
        } else {
        echo "The number '$number' is Decimal. <br>";
        echo "The number '$number' in Binary is: ";
        echo decimalToBinary($number)."<br>";
        echo "The number '$number' in Roman is: ";
        echo decimalToRoman($number);
        }
    } else {
        echo "Not a valid Roman, binary, or decimal number.";
    }

}

echo checkNumberType(010101);
echo "<br> <br>";

$numbers = [+2, +1225, 'XV', 'III', '101010', '11100', 50, '+012', -100, 'XC'];

  
    foreach($numbers as $num){
       echo checkNumberType($num);
       echo "<br>";
    }


    
    function checkNumberType1($number) {

        $isRoman = preg_match("/^[IVXLCDM]+$/i", $number);
    
        $isBinary = preg_match("/^[01]+$/", $number);
    
        $isDecimal = preg_match("/^[+-]?[0-9]+$/", $number);
        
        if ($isRoman) {
            echo "The number '$number' is Roman.<br>";
            echo "The number '$number' in Decimal is: ";
            echo romanToDecimal($number)."<br>";
            $number2 = romanToDecimal($number);
            echo "The number '$number' in Binary is: ";
            echo decimalToBinary($number2);
        } elseif ($isBinary) {
            echo "The number '$number' is Binary. <br>";
            echo "The number '$number' in Decimal is: ";
            echo binaryToDecimal($number)."<br>";
            echo "The number '$number' in Roman is: ";
            $number3 = binaryToDecimal($number);
            echo decimalToRoman($number3);
    
        } elseif ($isDecimal) {
            $number = ltrim($number, '+-');
    
            if($number[0] === '0'){
                return 'Error';
            } else {
            echo "The number '$number' is Decimal. <br>";
            echo "The number '$number' in Binary is: ";
            echo decimalToBinary($number)."<br>";
            echo "The number '$number' in Roman is: ";
            echo decimalToRoman($number);
            }
        } else {
            echo "Not a valid Roman, binary, or decimal number.";
        }
    
    }



?>



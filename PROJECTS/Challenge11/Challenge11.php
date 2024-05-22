<?php
//  EXERCISE 1 AND 2

$name = 'Kathrin';
$rating = 10;
$divider = '<br><br><hr>';

if ($name == 'Kathrin') {
    echo 'Hello Kathrin';
} else {
    echo 'Nice name';
}

echo $divider;

if ($rating >= 1 && $rating <= 10) {
    echo 'Thank you for rating';
} else {
    echo 'Invalid rating, only numbers between 1 and 10';
}


echo $divider;

$hour = date("H");


echo $divider;

if ($name == 'Kathrin' && $hour < 12) {
    echo 'Good morning Kathrin';
} elseif ($name == 'Kathrin' && $hour > 12 && $hour < 19) {
    echo 'Good afternoon Kathrin';
} elseif ($name == 'Kathrin' && $hour >= 19 && $hour < 24) {
    echo 'Good evening Kathrin';
}

echo $divider;
$rating1 = 10;
$rated = true; 

if ($rating1 >= 1 && $rating1 <= 10 && $rated == 'true') {
    echo 'You already voted';
} elseif ($rating1 >= 1 && $rating1 <= 10 && $rated == '') {
    echo 'Thanks for voting';
} else {
    echo 'You entered an invalid rating';
}
echo $divider;

echo gettype($rating);

echo $divider;

// 3

$hours = date("H");
$arr = [
    'John' => ['rating' => 5, 'voted' => true],
    'Alice' => ['rating' => 6, 'voted' => false],
    'Andrew' => ['rating' => 7, 'voted' => true],
    'Michael' => ['rating' => 8, 'voted' => false],
    'Bruce' => ['rating' => 9, 'voted' => true],
    'Harry' => ['rating' => 10, 'voted' => false],
    'Luke' => ['rating' => 5, 'voted' => true],
    'Helena' => ['rating' => 6, 'voted' => false],
    'Alan' => ['rating' => 7, 'voted' => true],
    'Lenny' => ['rating' => 80, 'voted' => false],
];


foreach($arr as $key => $value) {
    if ($hours < 12 && $value['rating'] >= 1 && $value['rating'] <= 10 && $value['voted'] == true) {
        echo "Good morning {$key} <br />";

        echo "You already voted with a {$value['rating']} <br />";

    } else if ($hours >= 12 && $hours < 19 && $value['rating'] >= 1 && $value['rating'] <= 10 && $value['voted'] == true) {
        echo "Good afternoon {$key} <br />";

        echo "You already voted with a {$value['rating']} <br />";

    } else if ($hours >= 19 && $hours < 24 && $value['rating'] >= 1 && $value['rating'] <= 10 && $value['voted'] == true) {
        echo "Good evening {$key} <br />";

        echo "You already voted with a {$key} <br />";
    } else if ($hours < 12 && $value['rating'] >= 1 && $value['rating'] <= 10 && $value['voted'] == '') {
        echo "Good morning {$key} <br />";

        echo "Thanks for voting with a {$value['rating']} <br />";

    } else if ($hours >= 12 && $hours < 19 && $value['rating'] >= 1 && $value['rating'] <= 10 && $value['voted'] == '') {
        echo "Good afternoon {$key} <br />";

        echo "Thanks for voting with a {$value['rating']} <br />";

    } else if ($hours >= 19 && $hours < 24 && $value['rating'] >= 1 && $value['rating'] <= 10 && $value['voted'] == '') {
        echo "Good evening {$key} <br />";

        echo "Thanks for voting with a {$value['rating']} <br />";

    } else if ($hours < 12 && $value['voted'] == '') {
        echo "Good morning {$key} <br />";

        echo "Invalid rating, only numbers between 1 and 10. <br />";

    } else if ($hours >= 12 && $hours < 19 && $value['voted'] == '') {
        echo "Good afternoon {$key} <br />";

        echo "Invalid rating, only numbers between 1 and 10. <br />";
        
    } else if ($hours >= 19 && $hours < 24 && $value['voted'] == '') {
        echo "Good evening {$key} <br />";

        echo "Invalid rating, only numbers between 1 and 10. <br />";
    }
}
    
?>

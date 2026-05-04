<?php
$courses = [
    [
        'id' => 1,
        'name' => 'Health & Safety',
        'price' => 99,
        'category' => 'safety',
    ],
    [
        'id' => 2,
        'name' => 'Food Safety',
        'price' => 59,
        'category' => 'safety',
    ],
    [
        'id' => 3,
        'name' => 'Safeguarding',
        'price' => 20,
        'category' => 'training',
    ],
    [
        'id' => 4,
        'name' => 'ACT',
        'price' => 50,
        'category' => 'training',
    ],
];

$category = $_GET['category'] ?? null;
$min_price = isset($_GET['min_price']) && is_numeric($_GET['min_price']) ? (float)$_GET['min_price'] : null;
$max_price = isset($_GET['max_price']) && is_numeric($_GET['max_price']) ? (float)$_GET['max_price'] : null;

$filtered_courses = array_filter($courses, function ($course) use ($category, $min_price, $max_price) {
    $matches_category = !$category || $course['category'] === $category;
    $matches_min = ($min_price === null) || $course['price'] >= $min_price;
    $matches_max = ($max_price === null) || $course['price'] <= $max_price;
    
    return $matches_category && $matches_min && $matches_max;
});
?>
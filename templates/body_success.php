<?php

if (isset($_SESSION['property_id'])) {
    $property_id = $_SESSION['property_id'];
    $start_date = $_SESSION['start_date'];
} else {
    echo "No session data found.";
}

$sql = "SELECT booking_id FROM bookings WHERE property_id = :house_id, start_date = :start";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":house_id" => $property_id,
    ":start" => $start_date
]);
$booking_id = $pdo->fetch(PDO::FETCH_ASSOC);

$sql_book = "SELECT * FROM bookings WHERE booking_id = :booking_id";

$stmt_book = $pdo->($sql_book);

$stmt_book->execute([":booking_id" => $booking_id]);

$book_info = $stmt_book->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="success_page">
    <div class="success_box"></div>
</div>
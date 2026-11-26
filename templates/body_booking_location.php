<?php
$stmt = $pdo ->query("SELECT house_name FROM properties");
$houses = [];

foreach($stmt as $row):
    $houses[] = htmlspecialchars($row['house_name']) ?>
 <?php endforeach;?>

<div class="contact_col">
    <div></div>
    <div class="body_main">
        <div class="booking_col">
            <div>
                <form class="contact_form" action="processes/process_booking.php" method="post">
                    <input list="home_names" name="house_name" placeholder="House Name" class="booking_property" required>
                    <datalist id="home_names">
                        <?php foreach ($houses as $house): ?>
                            <option value="<?= htmlspecialchars($house) ?>">
                        <?php endforeach; ?>
                    </datalist>

                    <input placeholder="Start date" type="date" name="start_date" class="booking_field" required>
                    <input placeholder="End date" type="date" name="end_date" class="booking_field" required>
            </div>
            <div>
                    <div class="booking_gap"></div>
                    <input placeholder="Number of Adults" type="integer" name="num_adult" class="booking_field" required>
                    <input placeholder="Number of Children" type="integer" name="num_child" class="booking_field" required>
                    <input placeholder="First Name" type="text" name="first_name" class="booking_field" required>
                    <input placeholder="Last Name" type="text" name="last_name" class="booking_field" required>
                    <input placeholder="Email" type="text" name="email" class="booking_field" required>
                    <input placeholder="Phone Number" type="integer" name="phone_number" class="booking_field" required>
                    <input type="submit" value="continue" class="booking_submit">
                </form>
            </div>

        </div>
    </div>
    <div></div>
</div>
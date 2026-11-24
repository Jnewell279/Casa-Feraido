<?php
$stmt = $pdo ->query("SELECT house_name FROM properties");
$houses = [];

foreach($stmt as $row):?>
<?= $houses[] = htmlspecialchars($row['house_name']) ?>
<?php endforeach?>


<div class="contact_col">
    <div></div>
    <div class="body_main">
        
        <form class="contact_form" action="" method="post">
            <input list="home_names" name="house_name" placeholder="House Name" class="contact_field    ">
            <datalist id="home_names">
                <?php foreach ($houses as $house): ?>
                    <option value="<?= htmlspecialchars($house) ?>">
                <?php endforeach; ?>
            </datalist>

            <input placeholder="Last name" type="text" name="last_name" class="contact_field">
            <input placeholder="Email" type="text" name="email" class="contact_field">
            <input placeholder="" type="text" name="" class="contact_field">
            <input type="submit" value="continue">
        </form>
    </div>
    <div></div>
</div>
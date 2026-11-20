<?php
$stmt = $pdo->query('SELECT house_name, houses, number_of_beds, house_type FROM properties');
?>

<div class="card-grid">
    <?php foreach ($stmt as $row): ?> <!--reads the database and assigns it to $row in a loop with the other code-->
        <article class="card">
            <h3><?= htmlspecialchars($row['house_name']) ?></h3><!--htmlspecialchars simply makes any code that could be html not-->
            <?php if (!empty($row['houses'])): ?> <!--converts the raw data from the database intp an image again-->
                <img src="data:image/jpeg;base64,<?= base64_encode($row['houses']) ?>" alt="<?= htmlspecialchars($row['house_name']) ?>" class="card-img">            <?php endif; ?>
            <p><?= htmlspecialchars($row['number_of_beds']) ?></p>
            <p><?= htmlspecialchars($row['house_type']) ?></p>
            <a href="#" class="btn">View Item</a>
        </article>
    <?php endforeach; ?>
</div>

<?php
$products = [
    ["title" => "Wireless Mouse", "price" => "£25", "desc" => "Ergonomic design with silent clicks."],
    ["title" => "Mechanical Keyboard", "price" => "£80", "desc" => "Tactile switches with white backlight."],
    ["title" => "USB-C Hub", "price" => "£35", "desc" => "7-in-1 adapter with 4K HDMI output."],
];
?>

<div class="card-grid">
    <?php foreach ($products as $item): ?>
        <article class="card">
            <h3><?= htmlspecialchars($item['title']) ?></h3>
            <p class="price"><?= htmlspecialchars($item['price']) ?></p>
            <p><?= htmlspecialchars($item['desc']) ?></p>
            <a href="#" class="btn">View Item</a>
        </article>
    <?php endforeach; ?>
</div>

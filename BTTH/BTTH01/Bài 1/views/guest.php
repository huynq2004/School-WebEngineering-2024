<?php foreach ($flowers as $flower): ?>
    <div class="flower">
        <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
        <h3><?php echo $flower['name']; ?></h3>
        <p><?php echo $flower['description']; ?></p>
    </div>
<?php endforeach; ?>
<?php if(count($errors) > 0 ) : ?>
    <div style="
    background-color: #ff6961;
    color: #fff;
    height:50px;
    padding:15px;">

        <?php foreach($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>

    </div>
<?php endif ?>


    <form method="post">
        <input type="text" name="username" placeholder="Üyelerde ara">
        <button type="submit">Gönder</button>
    </form>

    <?php
        if($users == '0'){
            echo $message;
        }
    ?>

    <ul>
        <?php if($users != '0'): ?>
            <?php foreach ($users as $user): ?>
                <li><?=$user['uye_eposta'];?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

<?php

$this->title = 'Task 9 | Список пользователей';
?>

<div class="d-flex">
<div class="container">

    <table class="table">
        <tr>
            <th>Имя</th>
            <th>Имейл</th>
        </tr>
        <?php foreach ($user_arr as $record): ?>
                <tr>
                    <td><?= $record['name'] ?></td>
                    <td><?= $record['email'] ?></td>
                </tr>
        <?php endforeach;?>
    </table>
    </div>
</div>
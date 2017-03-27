<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Balance transfer</h1>

        <p class="lead">List of users</p>
    </div>

    <div class="body-content">

        <div class="body-content">   
            <?php if(!empty($users)): ?>
                <?php foreach($users as $key => $user): ?>
                    <?php if($key%3==0) echo '<div class="row">';?>
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><?php echo $user['username']; ?></div>
                                <div class="panel-body">
                                    Ballance: <span class="badge"><?php echo $user['balance']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php if(($key+1)%3==0) echo '</div>';?>
                <?php endforeach; ?>
            <?php else: ?>
        <?php endif; ?>
    </div>
    </div>
</div>

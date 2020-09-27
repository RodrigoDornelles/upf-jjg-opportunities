<?php 

$languages = [];
$gradautes = [];
$experiences = [];
?>

<h1><?=$model->user->name?></h1>
<hr/>

<p>
    <strong>Email:</strong> <?=$model->user->email?><br/>
    <strong>Age:</strong> <?=$model->user->age?><br/>
</p><br/>

<p><?=$model->abstract?></p><br/>

<?php if ($gradautes):?>
<h3>Gradautes</h3>
<?php foreach($gradautes as $gradaute):?>
    <h4>
        <?=$gradaute->name?>
        <?php if ($gradaute->year_init):?>
            <?=$gradaute->year_init?>
        <?php endif ?>
        <?php if ($gradaute->year_init && $gradaute->year_end):?> - <?php endif ?>
        <?php if ($gradaute->year_init):?>
            <?=$gradaute->year_end?>
        <?php endif ?>
    </h4> 
    <p><?=$gradaute->institute?></p><br/>
<?php endforeach?>
<?php endif?>

<?php if ($experiences):?>
<h3>Experiences</h3>
<?php foreach($experiences as $experience):?>
    <h4>
    <?=$experience->role?>
    <?php if ($experience->year_init):?>
        <?=$experience->year_init?>
    <?php endif ?>
    <?php if ($experience->year_init && $experience->year_end):?> - <?php endif ?>
    <?php if ($experience->year_init):?>
        <?=$experience->year_end?>
    <?php endif ?>
</h4> 
<p><?=$experience->name?></p><br/>
<?php endforeach?>
<br/>
<?php endif?>

<?php if ($languages):?>
<h3>Languages</h3>
<ul>
    <?php foreach($languages as $language):?>
        <li><?=$language->name?> <small><?=$language->getLevelFormated()?></small></li>
    <?php endforeach?>
</ul><br/>
<?php endif?>
<?php
/**
 * @author Paweł Bizley Brzozowski
 * @version 1.3
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */
?>

<?= CHtml::openTag('li', $htmlOptionsResult) . "\n"; ?>
    <?= CHtml::link($removeLabel, '#', $htmlOptionsRemove); ?>
<?php if ($additional !== false && !empty($additional)): ?>
    <?= str_replace('{ID}', $id, str_replace('{VALUE}', $value, $additional)); ?>
<?php elseif (!empty($additionalCode)): ?>
    <?= str_replace('{ID}', $id, str_replace('{VALUE}', $value, $additionalCode)); ?>
<?php endif; ?>
<?php if ($mark): ?><?= $markBegin; ?><?php endif; ?>
        <?= $value; ?>
<?php if ($mark): ?><?= $markEnd; ?><?php endif; ?>
<?php if (!empty($model)): ?>
    <?= CHtml::activeHiddenField($model, $attribute . $arrayMode, array('value' => $id, 'id' => false)); ?>
<?php else: ?>
    <?= CHtml::hiddenField($name . $arrayMode, $id, array('id' => false)); ?>
<?php endif; ?>
<?= CHtml::closeTag('li') . "\n"; ?>

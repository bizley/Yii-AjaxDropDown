<?php
/**
 * @author Paweł Bizley Brzozowski
 * @version 1.3
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */
?>

<?= CHtml::openTag('div', $htmlOptionsMain) . "\n"; ?>
    <?= CHtml::openTag('div', $htmlOptionsGroup) . "\n"; ?>
        <?= CHtml::textField(
                !empty($defaults['inputName']) ? $defaults['inputName'] : '', 
                $singleMode ? (!empty($data[0]['value']) ? str_replace('"', '', strip_tags($data[0]['value'])) : '') : '', 
                $htmlOptionsInput
            ) . "\n"; ?>
<?php if ($singleMode): ?>
<?php if (!empty($model)): ?>
        <?= CHtml::activeHiddenField(
                $model, 
                $attribute, 
                array(
                    'value' => !empty($data[0]['id']) ? $data[0]['id'] : '', 
                    'id'    => false, 
                    'class' => 'singleResult'
                )
            ) . "\n"; ?>
<?php else: ?>
        <?= CHtml::hiddenField(
                $name, 
                !empty($data[0]['id']) ? $data[0]['id'] : '', 
                array(
                    'id'    => false, 
                    'class' => 'singleResult'
                )
            ) . "\n"; ?>
<?php endif; ?>
<?php endif; ?>
        <?= CHtml::openTag('div', $htmlOptionsButtons) . "\n"; ?>
<?php if (!empty($extraButtonLabel) || !empty($extraButtonOptions)): ?>
            <?= CHtml::htmlButton(is_string($extraButtonLabel) ? $extraButtonLabel : '', $htmlOptionsExtraButton) . "\n"; ?>
<?php endif; ?>
            <?= CHtml::htmlButton($buttonLabel, $htmlOptionsButton) . "\n"; ?>
            <?= CHtml::htmlButton($removeSingleLabel, $htmlOptionsRemoveSingle) . "\n"; ?>
            <?= CHtml::tag('ul', $htmlOptionsResults) . "\n"; ?>
        <?= CHtml::closeTag('div') . "\n"; ?>
    <?= CHtml::closeTag('div') . "\n"; ?>
    <?= CHtml::openTag('ul', $htmlOptionsSelected) . "\n"; ?>
<?php foreach ($results as $result): ?>
        <?php $this->render('result', $result); ?>
<?php endforeach; ?>
    <?= CHtml::closeTag('ul') . "\n"; ?>
<?= CHtml::closeTag('div') . "\n"; ?>


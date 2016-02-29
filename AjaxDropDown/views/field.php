<?php

/**
 * @author Paweł Bizley Brzozowski
 * @version 1.3.2
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

echo CHtml::openTag('div', $htmlOptionsMain) . "\n";
    echo CHtml::openTag('div', $htmlOptionsGroup) . "\n";
        echo CHtml::textField(
                !empty($defaults['inputName']) ? $defaults['inputName'] : '', 
                $singleMode ? (!empty($data[0]['value']) ? str_replace('"', '', strip_tags($data[0]['value'])) : '') : '', 
                $htmlOptionsInput
            ) . "\n";
if ($singleMode):
if (!empty($model)):
        echo CHtml::activeHiddenField(
                $model, 
                $attribute, 
                array(
                    'value' => !empty($data[0]['id']) ? $data[0]['id'] : '', 
                    'id'    => false, 
                    'class' => 'singleResult'
                )
            ) . "\n";
else:
        echo CHtml::hiddenField(
                $name, 
                !empty($data[0]['id']) ? $data[0]['id'] : '', 
                array(
                    'id'    => false, 
                    'class' => 'singleResult'
                )
            ) . "\n";
endif;
endif;
        echo CHtml::openTag('div', $htmlOptionsButtons) . "\n";
if (!empty($extraButtonLabel) || !empty($extraButtonOptions)):
            echo CHtml::htmlButton(is_string($extraButtonLabel) ? $extraButtonLabel : '', $htmlOptionsExtraButton) . "\n";
endif;
            echo CHtml::htmlButton($buttonLabel, $htmlOptionsButton) . "\n";
            echo CHtml::htmlButton($removeSingleLabel, $htmlOptionsRemoveSingle) . "\n";
            echo CHtml::tag('ul', $htmlOptionsResults) . "\n";
        echo CHtml::closeTag('div') . "\n";
    echo CHtml::closeTag('div') . "\n";
    echo CHtml::openTag('ul', $htmlOptionsSelected) . "\n";
foreach ($results as $result):
        echo $this->render('result', $result);
endforeach;
    echo CHtml::closeTag('ul') . "\n";
echo CHtml::closeTag('div') . "\n";

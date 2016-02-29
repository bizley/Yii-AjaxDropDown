<?php

/**
 * @author Paweł Bizley Brzozowski
 * @version 1.3.2
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

echo CHtml::openTag('li', $htmlOptionsResult) . "\n";
    echo CHtml::link($removeLabel, '#', $htmlOptionsRemove);
if ($additional !== false && !empty($additional)):
    echo str_replace('{ID}', $id, str_replace('{VALUE}', $value, $additional));
elseif (!empty($additionalCode)):
    echo str_replace('{ID}', $id, str_replace('{VALUE}', $value, $additionalCode));
endif;
    echo $mark ? $markBegin : '';
        echo $value;
    echo $mark ? $markEnd : '';
if (!empty($model)):
    echo CHtml::activeHiddenField($model, $attribute . $arrayMode, array('value' => $id, 'id' => false));
else:
    echo CHtml::hiddenField($name . $arrayMode, $id, array('id' => false));
endif;
echo CHtml::closeTag('li') . "\n";

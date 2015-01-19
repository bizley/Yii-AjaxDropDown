# Yii-AjaxDropDown
Yii dropdown widget with AJAX data

AjaxDropDown allows to use dropdown menu to select one or more values in your form. Dropdown data is sent using the AJAX post method.

This widget is designed to be  used with Bootstrap CSS although the option to switch it off is given.

## Screenshots

Default view:

<img src="images/basic.jpg" alt="Default view">

Dropdown list visible:

<img src="images/dropdown.jpg" alt="Dropdown list visible">

Extra button:

<img src="images/extra.jpg" alt="Extra button">

Records selected:

<img src="images/selected.jpg" alt="Records selected">

## How to install

Copy the AjaxDropDown folder to your /protected/extensions Yii folder. Then add the following inside your form view:

    <?php $this->widget('ext.AjaxDropDown.AjaxDropDown', array(
      'model' => $model,
      'attribute' => 'attribute',
      'source' => $this->createUrl('controller/action'),
    )); ?>
    
Where $model is your CModel object, 'attribute' is object's attribute and data source URL is 'controller/action'.
This is just a basic widget configuration. You can find all the options described in the AjaxDropDown.php.

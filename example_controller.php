<?php

/**
 * @author Paweł Bizley Brzozowski
 * @version 1.2
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * AjaxDropDown form controller example
 * @see https://github.com/bizley-code/Yii-AjaxDropDown
 * 
 * See README file for configuration and usage examples.
 * 
 * In this example form data is sent with POST method.
 * AjaxDropDown field attribute name is 'names' and it is used to collect all 
 * selected names of the CModel2 objects used as data source in the widget.
 * Before validation we check if selected records ids are in the database.
 * In case validation returns errors the selected data is still present 
 * underneath the widget.
 */
class FormController extends Controller
{

    public function actionAdd()
    {
        $model        = new CModel();
        $dropDownData = array();
        $data         = Yii::app()->request->getPost('CModel');

        if ($data) {

            $model->setAttributes($data);

            if (count($model->names)) {
                foreach ($model->names as $name) {
                    $tmp = CModel2::model()->findByPk((int) $name);
                    if ($tmp) {
                        $dropDownData[] = array(
                            'id'    => $tmp->id,
                            'mark'  => $tmp->type == 'special' ? 1 : 0,
                            'value' => CHtml::encode($tmp->name),
                        );
                    }
                }
            }

            if ($model->validate()) {

                if ($model->save()) {

                    if (count($model->names)) {
                        foreach ($model->names as $name) {
                            if (is_numeric($name)) {
                                $oldName = CModel2::model()->findByAttributes(array('model_id' => $model->id, 'name_id' => (int) $name));
                                if (!$oldName) {
                                    $model2           = new Cmodel2;
                                    $model2->model_id = $model->id;
                                    $model2->name_id  = (int) $name;
                                    $model2->save();
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this->render('add', array(
                    'model'        => $model,
                    'dropDownData' => $dropDownData
        ));
    }

}
<?php

/**
 * @author Paweł Bizley Brzozowski
 * @version 1.2
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * AjaxDropDown data source example
 * @see https://github.com/bizley-code/Yii-AjaxDropDown
 * 
 * See README file for configuration and usage examples.
 * 
 * In this example data is the series of CModel objects.
 * When no query is given (nothing was typed in the view's input text field) 
 * all the records with status = 1 are sent (per page).
 * If query is given then records are filtered to match '%query%' SQL like 
 * (and status = 1).
 * Every record with 'type' = 'special' is flagged with 'mark' = 1.
 */
class ExampleDataSourceController extends Controller
{

    public function actionData()
    {
        $results = array(
            'data'  => array(),
            'page'  => 1,
            'total' => 0
        );
        $query   = Yii::app()->request->getPost('query');
        $page    = Yii::app()->request->getPost('page');

        $currentPage = 0;
        if (!empty($page) && is_numeric($page) && $page > 0) {
            $currentPage = $page - 1;
        }

        if (empty($query)) {
            $dataProvider = new CActiveDataProvider('CModel', array(
                'criteria'   => array(
                    'condition' => 'status = 1',
                    'order'     => 'name',
                ),
                'pagination' => array('pageSize' => 10),
            ));
        }
        else {
            $query = CHtml::encode(strip_tags($query));

            $dataProvider = new CActiveDataProvider('CModel', array(
                'criteria'   => array(
                    'condition' => 'name LIKE :name AND status = 1',
                    'params'    => array(':name' => '%' . $query . '%'),
                    'order'     => 'name',
                ),
                'pagination' => array('pageSize' => 10),
            ));
        }

        $dataProvider->getPagination()->setCurrentPage($currentPage);

        foreach ($dataProvider->getData() as $data) {
            $results['data'][] = array(
                'id'    => $data->id,
                'mark'  => $data->type == 'special' ? 1 : 0,
                'value' => CHtml::encode($data->name),
            );
        }

        $results['page']  = $dataProvider->getPagination()->currentPage + 1;
        $results['total'] = $dataProvider->getPagination()->pageCount;

        echo CJSON::encode($results);
        Yii::app()->end();
    }

}
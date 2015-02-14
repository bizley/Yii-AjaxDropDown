<?php

/**
 * @author Paweł Bizley Brzozowski
 * @version 1.2
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * AjaxDropDown is the Yii widget for rendering the dropdown menu with the AJAX 
 * data source.
 * @see https://github.com/bizley-code/Yii-AjaxDropDown
 * @see http://www.yiiframework.com/extension/ajaxdropdown
 * 
 * See README file for configuration and usage examples.
 * 
 * AjaxDropDown requires Yii version 1.1.
 * @see http://www.yiiframework.com
 * @see https://github.com/yiisoft/yii
 * 
 * AjaxDropDown uses Bootstrap and JQuery as default.
 * @see http://getbootstrap.com
 * 
 * For Yii2 version of this widget
 * @see https://github.com/bizley-code/Yii2-AjaxDropDown
 */
class AjaxDropDown extends CWidget
{

    /**
     * @var string CSS class of the active element on the results list.
     * Bootstrap default is 'active'.
     */
    public $activeClass;

    /**
     * @var string Additional HTML code for the selected value row, default ''.
     * Any 'additional' key in [[data]] parameter element will replace this.
     * Any {VALUE} and {ID} tags here are automatically replaced with selected 
     * id and value of the row.
     * @since 1.1
     * @see [[data]]
     */
    public $additionalCode = '';

    /**
     * @var string The attribute associated with this widget.
     * The square brackets ('[]') are added automatically to collect tabular 
     * data input when [[singleMode]] parameter is set to false (default).
     */
    public $attribute;

    /**
     * @var boolean Wheter to add Bootstrap CSS classes, default true.
     */
    public $bootstrap = true;

    /**
     * @var string CSS class of the button triggering the dropdown in addition 
     * to 'ajaxDropDownToggle'. 
     * Bootstrap adds 'btn dropdown-toggle btn-default'.
     */
    public $buttonClass;

    /**
     * @var string HTML label of the button triggering the dropdown, 
     * default '...'.
     * Bootstrap sets '<span class="caret"></span>'.
     */
    public $buttonLabel;

    /**
     * @var string Additional CSS style of the button triggering the dropdown.
     */
    public $buttonStyle;

    /**
     * @var string CSS class of the div container for the buttons and dropdown 
     * menu in addition to 'ajaxDropDownButtons'.
     * Bootstrap adds ' input-group-btn'.
     */
    public $buttonsClass;

    /**
     * @var string Additional CSS style of the div container for the buttons 
     * and dropdown menu.
     */
    public $buttonsStyle;

    /**
     * @var array Array of preselected values arrays.
     * Every value array should be given with the three array keys:
     * 'id'    => identification string for the value i.e. database ID number,
     * 'mark'  => 0|1 flag for the emphasis of the value
     * 'value' => string displayed as the value itself.
     * If empty 'id' is set to uniqid().
     * If not 0 and not 1 'mark' is set to 0.
     * If empty 'value' is set to 'error: missing value key in data array'.
     * Since 1.1 there is the optional parameter 'additional' with HTML code to 
     * be inserted in the selected row. If given this replaces 
     * [[additionalCode]] for that row only. In case you want to remove the 
     * [[additionalCode]] only for that row set the 'additional' key to false.
     */
    public $data;

    /**
     * @var boolean Wheter to copy the asset file even if it has been already 
     * published before, default false.
     * @see CAssetManager::publish()
     */
    public $debug = false;

    /**
     * @var integer Delay between last key pressed and dropdown list opened 
     * in milliseconds, default 300. This option works only for 
     * [[keyTrigger]] = true.
     * @since 1.2
     */
    public $delay = 300;

    /**
     * @var string CSS class of the disabled element on the results list.
     * Bootstrap default is 'disabled'.
     */
    public $disabledClass;

    /**
     * @var boolean Wheter to add Bootstrap class 'dropup' to trigger dropdown 
     * menu above the button, default false.
     * This option works as intended only for bootstrap parameter set to true.
     */
    public $dropup = false;

    /**
     * @var string CSS class of the result element displayed when AJAX failed 
     * to return data in addition to 'dropdown-header'.
     * Bootstrap adds 'list-group-item-danger'.
     */
    public $errorClass;

    /**
     * @var string Additional CSS style of the result element displayed when 
     * AJAX failed to return data.
     */
    public $errorStyle;

    /**
     * @var array HTML options of the extra button between input text field and 
     * triggering button, default array().
     * @see CHtml::htmlButton()
     */
    public $extraButtonHtmlOptions = array();

    /**
     * @var string HTML label for the extra button between input text field and 
     * triggering button, default ''.
     */
    public $extraButtonLabel = '';

    /**
     * @var string CSS class of the div container for the input text field and 
     * div with buttons and dropdown menu in addition to 'ajaxDropDown'.
     * Bootstrap adds 'input-group'.
     */
    public $groupClass;

    /**
     * @var string Additional CSS style of the div container for the input text 
     * field and div with buttons and dropdown menu.
     */
    public $groupStyle;

    /**
     * @var string CSS class of the results header element in addition to 
     * 'dropdown-header'.
     */
    public $headerClass;

    /**
     * @var string Additional CSS style of the results header element.
     */
    public $headerStyle;

    /**
     * @var string CSS class of the hidden element on the results list.
     * Bootstrap default is 'hidden'.
     */
    public $hiddenClass;

    /**
     * @var string CSS class of the input text field.
     * Bootstrap adds 'form-control'.
     */
    public $inputClass;

    /**
     * @var string Additional CSS style of the input text field.
     */
    public $inputStyle;

    /**
     * @var boolean Wheter pressing the key in filter field should trigger the 
     * dropdown list to open, default true.
     * This option works as intended only for [[bootstrap]] parameter set to 
     * true.
     * @since 1.2
     */
    public $keyTrigger = true;

    /**
     * @var string CSS class of the loading element on the results list in 
     * addition to 'ajaxDropDownLoading'.
     */
    public $loadingClass;

    /**
     * @var string Additional CSS style of the loading element on the results 
     * list.
     */
    public $loadingStyle;

    /**
     * @var array Array of translated strings used in widgets, default array().
     * @see [[defaultLocal]]
     */
    public $local = array();

    /**
     * @var string CSS class of the main div container of the widget in 
     * addition to 'ajaxDropDownWidget'.
     */
    public $mainClass;

    /**
     * @var string Additional CSS style of the main div container of the widget.
     */
    public $mainStyle;

    /**
     * @var string HTML string of the beginning of the emphasised value on the 
     * results and preselected list, default ''.
     * Bootstrap sets to '<em>'.
     */
    public $markBegin;

    /**
     * @var string HTML string of the ending of the emphasised value on the 
     * results and preselected list, default ''.
     * Bootstrap sets to '</em>'.
     */
    public $markEnd;

    /**
     * @var boolean Wheter to use minified version of js asset file, default 
     * true.
     * @since 1.0.3
     */
    public $minified = true;

    /**
     * @var integer Number of characters in the input text field required to 
     * send AJAX query, default 0.
     */
    public $minQuery = 0;

    /**
     * @var CModel Data model associated with this widget.
     */
    public $model;

    /**
     * @var string Widget name. This must be set if $model is not set.
     */
    public $name;

    /**
     * @var string HTML string of the beginning of the 'next' link on the 
     * results list, default ''.
     * Bootstrap sets to '<small>'.
     */
    public $nextBegin;

    /**
     * @var string CSS class of the 'next' link on the results list in 
     * addition to 'ajaxDropDownNext'.
     * Bootstrap adds 'pull-right btn'.
     */
    public $nextClass;

    /**
     * @var string HTML string of the ending of the 'next' link on the 
     * results list, default ''.
     * Bootstrap sets to ' <span class="glyphicon glyphicon-chevron-right"></span></small>'.
     */
    public $nextEnd;

    /**
     * @var string Additional CSS style of the 'next' link on the results list.
     * Bootstrap sets to 'clear:none;'.
     */
    public $nextStyle;

    /**
     * @var string CSS class of the result element displayed when AJAX returns 
     * no matching records in addition to 'dropdown-header'.
     */
    public $noRecordsClass;

    /**
     * @var string Additional CSS style of the result element displayed when 
     * AJAX returns no matching records.
     */
    public $noRecordsStyle;

    /**
     * @var string JavaScript expression to be called when a result is removed 
     * from the list.
     * Available js variables:
     * id - ID of the removed result,
     * selection - list of all selected results (after removing).
     * @since 1.2
     */
    public $onRemove = '';

    /**
     * @var string JavaScript expression to be called when a result is selected 
     * from the list.
     * Available js variables:
     * id        - ID of the selected result,
     * label     - label of the selected result,
     * selection - list of all selected results (after adding).
     * @since 1.2
     */
    public $onSelect = '';

    /**
     * @var string HTML string of the beginning of the actual page / total 
     * pages indicator, default ''.
     * Bootstrap sets to '<span class="badge pull-right">'.
     */
    public $pagerBegin;

    /**
     * @var string HTML string of the ending of the actual page / total 
     * pages indicator, default ''.
     * Bootstrap sets to '</span>'.
     */
    public $pagerEnd;

    /**
     * @var string HTML string of the beginning of the 'previous' link on the 
     * results list, default ''.
     * Bootstrap sets to '<small><span class="glyphicon glyphicon-chevron-left"></span> '.
     */
    public $previousBegin;

    /**
     * @var string CSS class of the 'previous' link on the results list in 
     * addition to 'ajaxDropDownPrev'.
     * Bootstrap adds 'pull-left btn'.
     */
    public $previousClass;

    /**
     * @var string HTML string of the ending of the 'previous' link on the 
     * results list, default ''.
     * Bootstrap sets to '</small>'.
     */
    public $previousEnd;

    /**
     * @var string Additional CSS style of the 'previous' link on the results 
     * list.
     * Bootstrap sets to 'clear:none;'.
     */
    public $previousStyle;

    /**
     * @var string HTML string of the loading results indicator, default ''.
     * Bootstrap sets to 
     * '<div class="progress" style="width:90%;margin:0 auto"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:100%">{LOADING}</div></div>'.
     * {LOADING} tag used here is replaced with translated 'Loading' string.
     */
    public $progressBar;

    /**
     * @var string CSS class of the result value element on the results list in 
     * addition to 'ajaxDropDownPages'.
     */
    public $recordClass;

    /**
     * @var string Additional CSS class of the result value element on the 
     * results list.
     */
    public $recordStyle;

    /**
     * @var string CSS class of the link removing value from preselected list 
     * in addition to 'ajaxDropDownRemove'.
     * Bootstrap adds 'text-danger pull-right'.
     */
    public $removeClass;

    /**
     * @var string HTML label of the link removing value from preselected list, 
     * default 'x'.
     * Bootstrap sets to '<span class="glyphicon glyphicon-remove"></span>'.
     */
    public $removeLabel;

    /**
     * @var string CSS class of the button removing the selection on singleMode
     * in addition to 'ajaxDropDownSingleRemove'.
     * Bootstrap adds 'btn dropdown-toggle btn-default'.
     * @since 1.2
     */
    public $removeSingleClass;

    /**
     * @var string HTML label of the button removing the selection on 
     * singleMode, default 'x'.
     * Bootstrap sets '<span class="glyphicon glyphicon-remove text-danger"></span>'.
     * @since 1.2
     */
    public $removeSingleLabel;

    /**
     * @var string Additional CSS style of the button removing the selection in 
     * singleMode, default 'display:none;'
     * @since 1.2
     */
    public $removeSingleStyle;

    /**
     * @var string Additional CSS style of the link removing value from 
     * preselected list.
     */
    public $removeStyle;

    /**
     * @var string CSS class of the preselected data element.
     * Bootstrap adds 'list-group-item'.
     */
    public $resultClass;

    /**
     * @var string Additional CSS style of the preselected data element.
     */
    public $resultStyle;

    /**
     * @var string CSS class of the dropdown menu with AJAX records in addition 
     * to 'ajaxDropDownMenu'.
     * Bootstrap adds 'dropdown-menu'.
     */
    public $resultsClass;

    /**
     * @var string Additional CSS style of the dropdown menu with AJAX records.
     * Bootstrap sets to 'min-width:250px;'.
     */
    public $resultsStyle;

    /**
     * @var string CSS class of the div container for the preselected data in 
     * addition to 'ajaxDropDownResults'.
     * Bootstrap adds 'list-group'.
     */
    public $selectedClass;

    /**
     * @var string Assitional CSS style of the div container for the 
     * preselected data.
     */
    public $selectedStyle;

    /**
     * @var boolean Wheter to set widget in mode that allows only one selected 
     * value or more, default false.
     */
    public $singleMode = false;

    /**
     * @var boolean Wheter to display singleMode result underneath the widget 
     * or in the filter input field, default false.
     * @since 1.2
     */
    public $singleModeBottom = false;

    /**
     * @var mixed URL of the AJAX source of records. It can be string or array.
     * @see CHtml::normalizeUrl()
     */
    public $source;

    /**
     * @var string CSS class of the result value element holding the 'next' and 
     * 'previous' links.
     */
    public $switchClass;

    /**
     * @var string Additional CSS style of the result value element holding the 
     * 'next' and 'previous' links.
     */
    public $switchStyle;

    /**
     * @var string Name of the translate category, default 'app'.
     * @see Yii::t()
     */
    public $translateCategory = 'app';

    /**
     * @var string Event name to trigger/display the dropdown list.
     * Bootstrap sets 'show.bs.dropdown'.
     */
    public $triggerEvent;

    /**
     * @var string URL for accessing the published asset.
     */
    private $assetsPath;

    /**
     * @var array Default Bootstrap classes and labels for the widget.
     */
    protected $bootstrapDefaults = array(
        'activeClass'       => 'active',
        'buttonClass'       => ' btn dropdown-toggle btn-default',
        'buttonLabel'       => '<span class="caret"></span>',
        'buttonsClass'      => ' input-group-btn',
        'disabledClass'     => 'disabled',
        'errorClass'        => 'list-group-item-danger',
        'groupClass'        => ' input-group',
        'hiddenClass'       => 'hidden',
        'inputClass'        => 'form-control',
        'markBegin'         => '<em>',
        'markEnd'           => '</em>',
        'nextBegin'         => '<small>',
        'nextClass'         => 'pull-right btn',
        'nextEnd'           => ' <span class="glyphicon glyphicon-chevron-right"></span></small>',
        'nextStyle'         => 'clear:none;',
        'pagerBegin'        => '<span class="badge pull-right">',
        'pagerEnd'          => '</span>',
        'previousBegin'     => '<small><span class="glyphicon glyphicon-chevron-left"></span> ',
        'previousClass'     => 'pull-left btn',
        'previousEnd'       => '</small>',
        'previousStyle'     => 'clear:none;',
        'progressBar'       => '<div class="progress" style="width:90%;margin:0 auto"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:100%">{LOADING}</div></div>',
        'removeClass'       => ' text-danger pull-right',
        'removeLabel'       => '<span class="glyphicon glyphicon-remove"></span>',
        'removeSingleClass' => ' btn dropdown-toggle btn-default',
        'removeSingleLabel' => '<span class="glyphicon glyphicon-remove text-danger"></span>',
        'resultClass'       => ' list-group-item',
        'resultsClass'      => ' dropdown-menu',
        'resultsStyle'      => 'min-width:250px;',
        'selectedClass'     => ' list-group',
        'triggerEvent'      => 'show.bs.dropdown',
    );

    /**
     * @var array Default English widget texts.
     * {NUM} tag is automatically replaced with value of [[minQuery]] in the 
     * 'minimumCharacters' element.
     */
    protected $defaultLocal = array(
        'allRecords'        => 'All records',
        'error'             => 'Error',
        'minimumCharacters' => 'Type at least {NUM} character(s) to filter the results...',
        'next'              => 'next',
        'noRecords'         => 'No matching records found',
        'previous'          => 'previous',
        'recordsContaining' => 'Records containing',
    );

    /**
     * @var array Default widget classes and labels.
     */
    protected $defaults = array(
        'buttonClass'       => 'ajaxDropDownToggle',
        'buttonLabel'       => '...',
        'buttonsClass'      => 'ajaxDropDownButtons',
        'groupClass'        => 'ajaxDropDown',
        'inputName'         => 'ajaxDropDownInput',
        'mainClass'         => 'ajaxDropDownWidget',
        'removeClass'       => 'ajaxDropDownRemove',
        'removeLabel'       => 'x',
        'removeSingleClass' => 'ajaxDropDownSingleRemove',
        'removeSingleLabel' => 'x',
        'removeSingleStyle' => 'display:none;',
        'resultClass'       => 'ajaxDropDownSelected',
        'resultsClass'      => 'ajaxDropDownMenu',
        'selectedClass'     => 'ajaxDropDownResults',
    );

    const ADD_NEW_LINE = "\n";
    const ADD_TAB      = "\t";

    /**
     * Sets dropdown triggering button label.
     * @return string
     */
    protected function buttonLabel()
    {
        if (!empty($this->buttonLabel) && is_string($this->buttonLabel)) {
            return $this->buttonLabel;
        }
        else {
            if ($this->bootstrap) {
                return $this->bootstrapDefaults['buttonLabel'];
            }
        }
        return !empty($this->defaults['buttonLabel']) ? $this->defaults['buttonLabel'] : '';
    }

    /**
     * Checks whether this widget is associated with a data model.
     * @return boolean
     */
    protected function hasModel()
    {
        return $this->model instanceof CModel && $this->attribute !== null;
    }

    /**
     * Sets dropdown triggering button HTML options.
     * @param boolean $hide Wheter this button should be hidden
     * @return array
     */
    protected function htmlOptionsButton($hide = false)
    {
        $options = array(
            'type'        => 'button',
            'data-toggle' => 'dropdown',
            'data-page'   => 1
        );
        return $this->htmlOptionsSet('button', $this->bootstrap, $options, $hide ? 'display:none;' : '');
    }

    /**
     * Sets div container for the buttons and dropdown menu HTML options.
     * @return array
     */
    protected function htmlOptionsButtons()
    {
        return $this->htmlOptionsSet('buttons', $this->bootstrap);
    }

    /**
     * Sets extra button HTML options.
     * @return array
     */
    protected function htmlOptionsExtraButton()
    {
        $options = !empty($this->extraButtonHtmlOptions) && is_array($this->extraButtonHtmlOptions) ? $this->extraButtonHtmlOptions : array();
        return array_merge(
                array('type' => 'button'), $options
        );
    }

    /**
     * Sets div container for input text field and buttons with dropdown menu 
     * HTML options.
     * @return array
     */
    protected function htmlOptionsGroup()
    {
        $class = !empty($this->defaults['groupClass']) ? $this->defaults['groupClass'] : '';
        $style = !empty($this->defaults['groupStyle']) ? $this->defaults['groupStyle'] : '';

        if ($this->bootstrap) {
            if (!empty($this->bootstrapDefaults['groupClass'])) {
                $class .= $this->bootstrapDefaults['groupClass'];
                if ($this->dropup) {
                    $class .= ' dropup';
                }
            }
            if (!empty($this->bootstrapDefaults['groupStyle'])) {
                $style .= $this->bootstrapDefaults['groupStyle'];
            }
        }

        if (!empty($this->groupClass) && is_string($this->groupClass)) {
            $class .= ' ' . $this->groupClass;
        }

        if (!empty($this->groupStyle) && is_string($this->groupStyle)) {
            $style .= ' ' . $this->groupStyle;
        }

        $return = array(
            'class' => $class ? : null,
            'style' => $style ? : null,
        );

        return $return;
    }

    /**
     * Sets input text field HTML options.
     * @param boolean $disabled Wheter this field should be disabled
     * @return array
     */
    protected function htmlOptionsInput($disabled = false)
    {
        $options = array('id' => false);
        if ($disabled) {
            $options['disabled'] = true;
        }
        return $this->htmlOptionsSet('input', $this->bootstrap, $options);
    }

    /**
     * Sets main widget div container HTML options.
     * @param string $id ID of the widget
     * @return array
     */
    protected function htmlOptionsMain($id)
    {
        return $this->htmlOptionsSet('main', $this->bootstrap, array('id' => $id));
    }

    /**
     * Sets removing preselected value link HTML options.
     * @return array
     */
    protected function htmlOptionsRemove($id)
    {
        return $this->htmlOptionsSet('remove', true, array('data-id' => $id));
    }

    /**
     * Sets dropdown triggering button HTML options.
     * @param boolean $show Wheter this button should be shown
     * @return array
     * @since 1.2
     */
    protected function htmlOptionsRemoveSingle($show = false)
    {
        return $this->htmlOptionsSet('removeSingle', $this->bootstrap, array(
                    'type' => 'button',
        ), $show ? 'display:inline-block;' : '');
    }

    /**
     * Sets preselected value HTML options.
     * @param string $value Identificator of the result row
     * @return array
     */
    protected function htmlOptionsResult($value = '')
    {
        $class = !empty($this->defaults['resultClass']) ? $this->defaults['resultClass'] . $value : '';
        $style = !empty($this->defaults['resultStyle']) ? $this->defaults['resultStyle'] : '';

        if ($this->bootstrap) {
            if (!empty($this->bootstrapDefaults['resultClass'])) {
                $class .= $this->bootstrapDefaults['resultClass'];
            }
            if (!empty($this->bootstrapDefaults['resultStyle'])) {
                $style .= $this->bootstrapDefaults['resultStyle'];
            }
        }
        if (!empty($this->resultClass) && is_string($this->resultClass)) {
            $class .= ' ' . $this->resultClass;
        }

        if (!empty($this->resultStyle) && is_string($this->resultStyle)) {
            $style .= ' ' . $this->resultStyle;
        }

        $return = array(
            'class' => $class ? : null,
            'style' => $style ? : null,
        );

        return $return;
    }

    /**
     * Sets dropdown menu HTML options.
     * @return array
     */
    protected function htmlOptionsResults()
    {
        return $this->htmlOptionsSet('results', $this->bootstrap, array('role' => 'menu'));
    }

    /**
     * Sets div container for preselected values HTML options.
     * @return array
     */
    protected function htmlOptionsSelected()
    {
        return $this->htmlOptionsSet('selected', $this->bootstrap);
    }

    /**
     * Sets HTML options for chosen element.
     * @param string $name Name of the element
     * @param boolean $bootstrap Wheter to add Bootstrap defaults
     * @param array $additional Additional HTML options
     * @param string $appendStyle Additional CSS style
     * @return array
     */
    protected function htmlOptionsSet($name, $bootstrap = false, $additional = array(), $appendStyle = '')
    {
        $class = !empty($this->defaults[$name . 'Class']) ? $this->defaults[$name . 'Class'] : '';
        $style = !empty($this->defaults[$name . 'Style']) ? $this->defaults[$name . 'Style'] : '';
        if ($bootstrap) {
            if (!empty($this->bootstrapDefaults[$name . 'Class'])) {
                $class .= $this->bootstrapDefaults[$name . 'Class'];
            }
            if (!empty($this->bootstrapDefaults[$name . 'Style'])) {
                $style .= $this->bootstrapDefaults[$name . 'Style'];
            }
        }
        if (!empty($this->{$name . 'Class'}) && is_string($this->{$name . 'Class'})) {
            $class .= ' ' . $this->{$name . 'Class'};
        }

        if (!empty($this->{$name . 'Style'}) && is_string($this->{$name . 'Style'})) {
            $style .= ' ' . $this->{$name . 'Style'};
        }

        $return = array(
            'class' => $class ? : null,
            'style' => $style ? : null,
        );

        if (count($additional)) {
            $return = array_merge($return, $additional);
        }
        
        if ($appendStyle != '') {
            if (!empty($return['style'])) {
                $return['style'] .= (substr(trim($return['style']), -1) != ';' ? ';' : '') . $appendStyle;
            }
            else {
                $return['style'] = $appendStyle;
            }
        }

        return $return;
    }

    /**
     * Initializes the widget.
     * @see CWidget::init
     */
    public function init()
    {
        $assets           = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
        $this->assetsPath = Yii::app()->getAssetManager()->publish($assets, false, 0, $this->debug);

        Yii::app()->getClientScript()->registerScriptFile($this->assetsPath . '/' . 'AjaxDropDown' . ($this->minified ? '.min' : '') . '.js');
        Yii::app()->clientScript->registerCoreScript('jquery');
    }

    /**
     * Sets JS option for chosen element.
     * @param string $name Name of the option
     * @return string
     */
    protected function prepareOption($name)
    {
        $option = '';
        if (!empty($this->$name) && is_string($this->$name)) {
            $option = $this->$name;
        }
        else {
            if ($this->bootstrap) {
                $option = !empty($this->bootstrapDefaults[$name]) ? $this->bootstrapDefaults[$name] : '';
            }
        }

        return $option;
    }

    /**
     * Sets boolean JS option for chosen element.
     * @param mixed $name
     * @return bool
     * @since 1.2
     */
    protected function prepareOptionBool($name)
    {
        return $this->$name ? true : false;
    }

    /**
     * Sets delay JS option.
     * @return integer
     */
    protected function prepareOptionDelay()
    {
        $value = 0;
        if (is_numeric($this->delay) && $this->delay > 0) {
            $value = (int) $this->delay;
        }

        return $value;
    }

    /**
     * Sets translations JS option.
     * @return string
     */
    protected function prepareOptionLocal()
    {
        $local = !empty($this->defaultLocal) ? $this->defaultLocal : array();
        if (!empty($this->local) && is_array($this->local)) {
            foreach ($this->local as $key => $value) {
                if (!empty($value) && is_string($value)) {
                    $local[$key] = Yii::t($this->translateCategory, $value);
                }
            }
        }

        $shortlocal = array();
        $shortNames = array(
            'allRecords'        => 'allr',
            'error'             => 'erro',
            'minimumCharacters' => 'mcha',
            'next'              => 'next',
            'noRecords'         => 'nrec',
            'previous'          => 'prev',
            'recordsContaining' => 'rcon',
        );
        foreach ($local as $key => $value) {
            if (isset($shortNames[$key])) {
                $shortlocal[$shortNames[$key]] = $value;
            }
            else {
                $shortlocal[$key] = $value;
            }
        }

        return $shortlocal;
    }

    /**
     * Sets minimum query length JS option.
     * @return integer
     */
    protected function prepareOptionMinQuery()
    {
        return is_numeric($this->minQuery) && $this->minQuery > 0 ? $this->minQuery : 0;
    }

    /**
     * Sets progress bar JS option.
     * @return string
     */
    protected function prepareOptionProgressBar()
    {
        $progressBar = '';
        if (!empty($this->progressBar) && is_string($this->progressBar)) {
            $progressBar = strtr($this->progressBar, array('{LOADING}' => Yii::t($this->translateCategory, 'Loading')));
        }
        else {
            if ($this->bootstrap) {
                $progressBar = !empty($this->bootstrapDefaults['progressBar']) ? strtr($this->bootstrapDefaults['progressBar'], array('{LOADING}' => Yii::t($this->translateCategory, 'Loading'))) : '';
            }
        }
        return $progressBar;
    }

    /**
     * Sets JS options.
     * @param string $name Name of the widget
     * @return array
     */
    protected function prepareOptions($name)
    {
        return array(
            'accl' => $this->prepareOption('activeClass'),
            'addc' => $this->additionalCode,
            'dely' => $this->prepareOptionDelay(),
            'dicl' => $this->prepareOption('disabledClass'),
            'ercl' => $this->prepareOption('errorClass'),
            'erst' => $this->prepareOption('errorStyle'),
            'hecl' => $this->prepareOption('headerClass'),
            'hest' => $this->prepareOption('headerStyle'),
            'hicl' => $this->prepareOption('hiddenClass'),
            'keyt' => $this->prepareOptionBool('keyTrigger'),
            'loca' => $this->prepareOptionLocal(),
            'locl' => $this->prepareOption('loadingClass'),
            'lost' => $this->prepareOption('loadingStyle'),
            'mabe' => $this->prepareOption('markBegin'),
            'maen' => $this->prepareOption('markEnd'),
            'minq' => $this->prepareOptionMinQuery(),
            'name' => $name,
            'nebe' => $this->prepareOption('nextBegin'),
            'necl' => $this->prepareOption('nextClass'),
            'neen' => $this->prepareOption('nextEnd'),
            'nest' => $this->prepareOption('nextStyle'),
            'nrcl' => $this->prepareOption('noRecordsClass'),
            'nrst' => $this->prepareOption('noRecordsStyle'),
            'onrm' => $this->onRemove,
            'onsl' => $this->onSelect,
            'pabe' => $this->prepareOption('pagerBegin'),
            'paen' => $this->prepareOption('pagerEnd'),
            'prbe' => $this->prepareOption('previousBegin'),
            'prcl' => $this->prepareOption('previousClass'),
            'pren' => $this->prepareOption('previousEnd'),
            'prst' => $this->prepareOption('previousStyle'),
            'prba' => $this->prepareOptionProgressBar(),
            'recl' => $this->prepareOption('recordClass'),
            'rest' => $this->prepareOption('recordStyle'),
            'rmcl' => $this->prepareOption('removeClass'),
            'rmla' => $this->prepareOption('removeLabel'),
            'rmst' => $this->prepareOption('removeStyle'),
            'rscl' => $this->prepareOption('resultClass'),
            'rsst' => $this->prepareOption('resultStyle'),
            'smbt' => $this->prepareOptionBool('singleModeBottom'),
            'smod' => $this->prepareOptionBool('singleMode'),
            'swcl' => $this->prepareOption('switchClass'),
            'swst' => $this->prepareOption('switchStyle'),
            'trig' => $this->prepareOption('triggerEvent'),
            'url'  => $this->prepareOptionUrl(),
        );
    }

    /**
     * Sets source URL JS option.
     * @see CHtml::normalizeUrl
     * @return string
     */
    protected function prepareOptionUrl()
    {
        return CHtml::normalizeUrl($this->source);
    }

    /**
     * Sets dropdown triggering button label.
     * @return string
     * @since 1.2
     */
    protected function removeSingleLabel()
    {
        if (!empty($this->removeSingleLabel) && is_string($this->removeSingleLabel)) {
            return $this->removeSingleLabel;
        }
        else {
            if ($this->bootstrap) {
                return $this->bootstrapDefaults['removeSingleLabel'];
            }
        }
        return !empty($this->defaults['removeSingleLabel']) ? $this->defaults['removeSingleLabel'] : '';
    }

    /**
     * Renders main part of the widget with filter field and buttons.
     * @since 1.2
     */
    protected function renderMain()
    {
        $singleMode = false;
        if ($this->singleMode && !$this->singleModeBottom && $this->additionalCode == '') {
            if (is_array($this->data) && isset($this->data[0])) {
                $singleMode = true;
            }
        }

        echo $this->renderTab(2);
        echo CHtml::textField(
                !empty($this->defaults['inputName']) ? $this->defaults['inputName'] : '', $singleMode ? (!empty($this->data[0]['value']) ? str_replace('"', '', strip_tags($this->data[0]['value'])) : '') : '', $this->htmlOptionsInput($singleMode)
        );
        if ($singleMode) {
            if (!empty($this->model)) {
                echo CHtml::activeHiddenField($this->model, $this->attribute, array('value' => !empty($this->data[0]['id']) ? $this->data[0]['id'] : '', 'id' => false, 'class' => 'singleResult'));
            }
            else {
                echo CHtml::hiddenField($this->name, !empty($this->data[0]['id']) ? $this->data[0]['id'] : '', array('id' => false, 'class' => 'singleResult'));
            }
        }
        echo $this->renderNewLine();
        echo $this->renderTab(2);
        echo CHtml::openTag('div', $this->htmlOptionsButtons());
        echo $this->renderNewLine();
        if (!empty($this->extraButtonLabel) || !empty($this->extraButtonHtmlOptions)) {
            echo $this->renderTab(3);
            echo CHtml::htmlButton(is_string($this->extraButtonLabel) ? $this->extraButtonLabel : '', $this->htmlOptionsExtraButton());
            echo $this->renderNewLine();
        }
        echo $this->renderTab(3);
        echo CHtml::htmlButton($this->buttonLabel(), $this->htmlOptionsButton($singleMode));
        echo CHtml::htmlButton($this->removeSingleLabel(), $this->htmlOptionsRemoveSingle($singleMode));
        echo $this->renderNewLine();
    }
    
    /**
     * Renders new line characters.
     * @param integer $copy Number of repeats, default 1
     * @return string
     */
    protected function renderNewLine($copy = 1)
    {
        return str_repeat(self::ADD_NEW_LINE, $copy);
    }

    /**
     * Renders single preselected value result.
     * @param array $data Preselected value data array
     * @param boolean $singleMode Wheter to render hidden output field as 
     * single one or as part of tabular data collection
     */
    protected function renderResult($data = array(), $singleMode = false)
    {
        if (empty($data['id'])) {
            $data['id'] = uniqid();
        }
        if (empty($data['mark']) || !in_array($data['mark'], array(0, 1))) {
            $data['mark'] = 0;
        }
        if (empty($data['value']) || !is_string($data['value'])) {
            $data['value'] = 'error: missing value key in data array';
        }
        if (isset($data['additional']) && $data['additional'] !== false) {
            if (empty($data['additional']) || !is_string($data['additional'])) {
                $data['additional'] = '';
            }
        }
        else {
            $data['additional'] = '';
        }

        if (!empty($this->removeLabel) && is_string($this->removeLabel)) {
            $removeLabel = $this->removeLabel;
        }
        else {
            if ($this->bootstrap) {
                $removeLabel = $this->bootstrapDefaults['removeLabel'];
            }
            else {
                $removeLabel = !empty($this->defaults['removeLabel']) ? $this->defaults['removeLabel'] : '';
            }
        }

        $arrayMode = '[]';
        if ($singleMode) {
            $arrayMode = '';
        }

        echo $this->renderTab(2);
        echo CHtml::openTag('li', $this->htmlOptionsResult($data['id']));
        echo CHtml::link($removeLabel, '#', $this->htmlOptionsRemove($data['id']));
        if ($data['additional'] !== false && !empty($data['additional'])) {
            echo str_replace('{ID}', $data['id'], str_replace('{VALUE}', $data['value'], $data['additional']));
        }
        elseif (!empty($this->additionalCode)) {
            echo str_replace('{ID}', $data['id'], str_replace('{VALUE}', $data['value'], $this->additionalCode));
        }
        if ($data['mark']) {
            echo $this->prepareOption('markBegin');
        }
        echo $data['value'];
        if ($data['mark']) {
            echo $this->prepareOption('markEnd');
        }
        if (!empty($this->model)) {
            echo CHtml::activeHiddenField($this->model, $this->attribute . $arrayMode, array('value' => $data['id'], 'id' => false));
        }
        else {
            echo CHtml::hiddenField($this->name . $arrayMode, $data['id'], array('id' => false));
        }
        echo CHtml::closeTag('li');
        echo $this->renderNewLine();
    }

    /**
     * Renders the preselected data values.
     */
    protected function renderResults()
    {
        if (is_array($this->data)) {

            if ($this->singleMode) {
                
                if ($this->singleModeBottom) {
                    if (isset($this->data[0])) {
                        $this->renderResult($this->data[0], $this->singleMode);
                    }
                }
            }
            else {
                foreach ($this->data as $data) {
                    $this->renderResult($data, $this->singleMode);
                }
            }
        }
    }

    /**
     * Renders tab characters.
     * @param integer $copy Number of repeats, default 1
     * @return string
     */
    protected function renderTab($copy = 1)
    {
        return str_repeat(self::ADD_TAB, $copy);
    }

    /**
     * Renders the widget
     * @param string $id ID of the widget
     */
    protected function renderWidget($id)
    {
        echo $this->renderNewLine();
        echo CHtml::openTag('div', $this->htmlOptionsMain($id));
        echo $this->renderNewLine();
        echo $this->renderTab();
        echo CHtml::openTag('div', $this->htmlOptionsGroup());
        echo $this->renderNewLine();
        $this->renderMain();
        echo $this->renderTab(3);
        echo CHtml::openTag('ul', $this->htmlOptionsResults());
        echo CHtml::closeTag('ul');
        echo $this->renderNewLine();
        echo $this->renderTab(2);
        echo CHtml::closeTag('div');
        echo $this->renderNewLine();
        echo $this->renderTab();
        echo CHtml::closeTag('div');
        echo $this->renderNewLine();
        echo $this->renderTab();
        echo CHtml::openTag('ul', $this->htmlOptionsSelected());
        echo $this->renderNewLine();
        $this->renderResults();
        echo $this->renderTab();
        echo CHtml::closeTag('ul');
        echo $this->renderNewLine();
        echo CHtml::closeTag('div');
        echo $this->renderNewLine();
    }

    /**
     * This method is copied from CJuiInputWidget.
     * Resolves name and ID of the input. Source property of the name and/or 
     * source property of the attribute could be customized by specifying first 
     * and/or second parameter accordingly.
     * @return array name and ID of the input: array('name','id').
     * @throws CException in case model and attribute property or name property 
     * cannot be resolved.
     */
    protected function resolveNameID()
    {
        if ($this->name !== null) {
            $name = $this->name;
        }
        elseif ($this->hasModel()) {
            $name = CHtml::activeName($this->model, $this->attribute);
        }
        else {
            throw new CException(Yii::t('zii', '{class} must specify "model" and "{attribute}" or "{name}" property values.', array('{class}' => get_class($this), '{attribute}' => $attributeProperty, '{name}' => $nameProperty)));
        }

        if (($id = $this->getId(false)) === null) {
            $id = CHtml::getIdByName($name);
        }

        return array($name, $id);
    }

    /**
     * Renders the widget and prepares all options required by the JS.
     */
    public function run()
    {
        list($name, $id) = $this->resolveNameID();

        $id .= '_' . (!empty($this->defaults['mainClass']) ? $this->defaults['mainClass'] : '');
        $this->renderWidget($id);

        $options = CJavaScript::encode($this->prepareOptions($name));
        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').ajaxDropDown($options);");
    }

}
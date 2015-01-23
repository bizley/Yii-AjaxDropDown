<?php

/**
 * @author Paweł Bizley Brzozowski
 * @version 1.0.4
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
 */
class AjaxDropDown extends CWidget
{

    /**
     * @var string CSS class of the active element on the results list.
     * Bootstrap default is 'active'.
     */
    public $activeClass;

    /**
     * @var string The attribute associated with this widget.
     * The square brackets ('[]') are added automatically to collect tabular 
     * data input when singleMode parameter is set to false (default).
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
     * menu.
     * Bootstrap adds 'input-group-btn'.
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
     */
    public $data;

    /**
     * @var boolean Wheter to copy the asset file even if it has been already 
     * published before, default false.
     * @see $forceCopy in CAssetManager::publish
     */
    public $debug = false;

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
     * @see $htmlOptions in CHtml::htmlButton
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
     * @var array HTML parameters of the widget. This is used currently to keep 
     * 'id' and 'name' parameters and generally shoud not be changed.
     */
    public $htmlOptions;

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
     * @see $defaultLocal List of all default English strings.
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
     * Bootstrap sets to 'clear:none'.
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
     * Bootstrap sets to 'clear:none'.
     */
    public $previousStyle;

    /**
     * @var string HTML string of the loading results indicator, default ''.
     * Bootstrap sets to 
     * '<div class="progress" style="width:90%;margin:0 auto"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:100%">{LOADING}</div></div>'.
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
     * @var mixed URL of the AJAX source of records. It can be string or array.
     * @see CHtml::normalizeUrl
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
     * Bootstrap sets to 'min-width:230px'.
     */
    public $switchStyle;

    /**
     * @var string Name of the translate category, default 'AjaxDropDown'.
     * @see YiiBase::t
     */
    public $translateCategory;

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
        'activeClass'   => 'active',
        'buttonClass'   => ' btn dropdown-toggle btn-default',
        'buttonLabel'   => '<span class="caret"></span>',
        'buttonsClass'  => 'input-group-btn',
        'disabledClass' => 'disabled',
        'errorClass'    => 'list-group-item-danger',
        'groupClass'    => ' input-group',
        'hiddenClass'   => 'hidden',
        'inputClass'    => 'form-control',
        'markBegin'     => '<em>',
        'markEnd'       => '</em>',
        'nextBegin'     => '<small>',
        'nextClass'     => 'pull-right btn',
        'nextEnd'       => ' <span class="glyphicon glyphicon-chevron-right"></span></small>',
        'nextStyle'     => 'clear:none',
        'pagerBegin'    => '<span class="badge pull-right">',
        'pagerEnd'      => '</span>',
        'previousBegin' => '<small><span class="glyphicon glyphicon-chevron-left"></span> ',
        'previousClass' => 'pull-left btn',
        'previousEnd'   => '</small>',
        'previousStyle' => 'clear:none',
        'progressBar'   => '<div class="progress" style="width:90%;margin:0 auto"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:100%">{LOADING}</div></div>',
        'removeClass'   => ' text-danger pull-right',
        'removeLabel'   => '<span class="glyphicon glyphicon-remove"></span>',
        'resultClass'   => ' list-group-item',
        'resultsClass'  => ' dropdown-menu',
        'selectedClass' => ' list-group',
        'switchStyle'   => 'min-width:230px',
        'triggerEvent'  => 'show.bs.dropdown',
    );

    /**
     * @var array Default English widget texts.
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
        'buttonClass'   => 'ajaxDropDownToggle',
        'buttonLabel'   => '...',
        'groupClass'    => 'ajaxDropDown',
        'inputName'     => 'ajaxDropDownInput',
        'mainClass'     => 'ajaxDropDownWidget',
        'removeClass'   => 'ajaxDropDownRemove',
        'removelabel'   => 'x',
        'resultClass'   => 'ajaxDropDownSelected',
        'resultsClass'  => 'ajaxDropDownMenu',
        'selectedClass' => 'ajaxDropDownResults',
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
     * @return array
     */
    protected function htmlOptionsButton()
    {
        return $this->htmlOptionsSet('button', $this->bootstrap, array(
                    'type'        => 'button',
                    'data-toggle' => 'dropdown',
                    'data-page'   => 1
        ));
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
     * @return array
     */
    protected function htmlOptionsInput()
    {
        return $this->htmlOptionsSet('input', $this->bootstrap, array('id' => false));
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
     * @return array
     */
    protected function htmlOptionsSet($name, $bootstrap = false, $additional = array())
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

        if (empty($this->translateCategory) || !is_string($this->translateCategory)) {
            $this->translateCategory = 'AjaxDropDown';
        }
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

        return $local;
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
            $progressBar = $this->progressBar;
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
            'name'           => $name,
            'singleMode'     => $this->singleMode,
            'url'            => $this->prepareOptionUrl(),
            'progressBar'    => $this->prepareOptionProgressBar(),
            'minQuery'       => $this->prepareOptionMinQuery(),
            'triggerEvent'   => $this->prepareOption('triggerEvent'),
            'loadingClass'   => $this->prepareOption('loadingClass'),
            'loadingStyle'   => $this->prepareOption('loadingStyle'),
            'headerClass'    => $this->prepareOption('headerClass'),
            'headerStyle'    => $this->prepareOption('headerStyle'),
            'errorClass'     => $this->prepareOption('errorClass'),
            'errorStyle'     => $this->prepareOption('errorStyle'),
            'recordClass'    => $this->prepareOption('recordClass'),
            'recordStyle'    => $this->prepareOption('recordStyle'),
            'switchClass'    => $this->prepareOption('switchClass'),
            'switchStyle'    => $this->prepareOption('switchStyle'),
            'previousClass'  => $this->prepareOption('previousClass'),
            'previousStyle'  => $this->prepareOption('previousStyle'),
            'nextClass'      => $this->prepareOption('nextClass'),
            'nextStyle'      => $this->prepareOption('nextStyle'),
            'pagerBegin'     => $this->prepareOption('pagerBegin'),
            'pagerEnd'       => $this->prepareOption('pagerEnd'),
            'markBegin'      => $this->prepareOption('markBegin'),
            'markEnd'        => $this->prepareOption('markEnd'),
            'previousBegin'  => $this->prepareOption('previousBegin'),
            'previousEnd'    => $this->prepareOption('previousEnd'),
            'nextBegin'      => $this->prepareOption('nextBegin'),
            'nextEnd'        => $this->prepareOption('nextEnd'),
            'noRecordsClass' => $this->prepareOption('noRecordsClass'),
            'noRecordsStyle' => $this->prepareOption('noRecordsStyle'),
            'disabledClass'  => $this->prepareOption('disabledClass'),
            'hiddenClass'    => $this->prepareOption('hiddenClass'),
            'activeClass'    => $this->prepareOption('activeClass'),
            'resultClass'    => $this->prepareOption('resultClass'),
            'resultStyle'    => $this->prepareOption('resultStyle'),
            'removeClass'    => $this->prepareOption('removeClass'),
            'removeStyle'    => $this->prepareOption('removeStyle'),
            'removeLabel'    => $this->prepareOption('removeLabel'),
            'local'          => $this->prepareOptionLocal(),
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
     * Renders new line characters.
     * @param integer $copy Number of repeats, default 1
     * @return string
     */
    protected function renderNewLine($copy = 1)
    {
        echo str_repeat(self::ADD_NEW_LINE, $copy);
    }

    /**
     * Renders single preselected value result.
     * @param boolean $active Wheter this widget is associated with a data 
     * model
     * @param array $data Preselected value data array
     * @param boolean $singleMode Wheter to render hidden output field as 
     * single one or as part of tabular data collection
     */
    protected function renderResult($active, $data = array(), $singleMode = false)
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
        if ($data['mark']) {
            echo $this->prepareOption('markBegin');
        }
        echo $data['value'];
        if ($data['mark']) {
            echo $this->prepareOption('markEnd');
        }
        if ($active) {
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
     * @param boolean $active Wheter this widget is associated with a data 
     * model
     */
    protected function renderResults($active = true)
    {
        if (is_array($this->data)) {

            if ($this->singleMode) {
                if (isset($this->data[0])) {
                    $this->renderResult($active, $this->data[0], $this->singleMode);
                }
            }
            else {
                foreach ($this->data as $data) {
                    $this->renderResult($active, $data, $this->singleMode);
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
        echo str_repeat(self::ADD_TAB, $copy);
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
        echo $this->renderTab(2);
        echo CHtml::textField(!empty($this->defaults['inputName']) ? $this->defaults['inputName'] : '', '', $this->htmlOptionsInput());
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
        echo CHtml::htmlButton($this->buttonLabel(), $this->htmlOptionsButton());
        echo $this->renderNewLine();
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
        $this->renderResults($this->data);
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
     * @param string $nameProperty class property name which holds element name 
     * to be used. This parameter is available since 1.1.14.
     * @param string $attributeProperty class property name which holds model 
     * attribute name to be used. This parameter is available since 1.1.14.
     * @return array name and ID of the input: array('name','id').
     * @throws CException in case model and attribute property or name property 
     * cannot be resolved.
     */
    protected function resolveNameID($nameProperty = 'name', $attributeProperty = 'attribute')
    {
        if ($this->$nameProperty !== null) {
            $name = $this->$nameProperty;
        }
        elseif (isset($this->htmlOptions[$nameProperty])) {
            $name = $this->htmlOptions[$nameProperty];
        }
        elseif ($this->hasModel()) {
            $name = CHtml::activeName($this->model, $this->$attributeProperty);
        }
        else {
            throw new CException(Yii::t('zii', '{class} must specify "model" and "{attribute}" or "{name}" property values.', array('{class}' => get_class($this), '{attribute}' => $attributeProperty, '{name}' => $nameProperty)));
        }

        if (($id = $this->getId(false)) === null) {
            if (isset($this->htmlOptions['id'])) {
                $id = $this->htmlOptions['id'];
            }
            else {
                $id = CHtml::getIdByName($name);
            }
        }

        return array($name, $id);
    }

    /**
     * Renders the widget and prepares all options required by the JS.
     */
    public function run()
    {
        list($name, $id) = $this->resolveNameID();

        if (isset($this->htmlOptions['id'])) {
            $id = $this->htmlOptions['id'];
        }
        else {
            $this->htmlOptions['id'] = $id;
        }
        if (isset($this->htmlOptions['name'])) {
            $name = $this->htmlOptions['name'];
        }

        $id .= '_' . (!empty($this->defaults['mainClass']) ? $this->defaults['mainClass'] : '');
        $this->renderWidget($id);

        $options = CJavaScript::encode($this->prepareOptions($name));
        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').ajaxDropDown($options);");
    }
}

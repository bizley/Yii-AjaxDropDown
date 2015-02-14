# Yii-AjaxDropDown parameters

## activeClass
_string_ CSS class of the active element on the results list.<br>
Bootstrap default is 'active'.

## additionalCode
_string_ Additional HTML code for the selected value row, default ''.<br>
Any 'additional' key in **data** parameter element will replace this.<br>
Any _{VALUE}_ and _{ID}_ tags here are automatically replaced with selected id and value of the row.

## attribute
_string_ The attribute associated with this widget.<br>
The square brackets ('[]') are added automatically to collect tabular data input when **singleMode** parameter is set to false (default).

## bootstrap
_boolean_ Wheter to add Bootstrap CSS classes, default true.

## buttonClass
_string_ CSS class of the button triggering the dropdown in addition to 'ajaxDropDownToggle'.<br>
Bootstrap adds 'btn dropdown-toggle btn-default'.

## buttonLabel
_string_ HTML label of the button triggering the dropdown, default '...'.<br>
Bootstrap sets ```'<span class="caret"></span>'```.

## buttonStyle
_string_ Additional CSS style of the button triggering the dropdown.

## buttonsClass
_string_ CSS class of the div container for the buttons and dropdown menu in addition to 'ajaxDropDownButtons'.<br>
Bootstrap adds ' input-group-btn'.

## buttonsStyle
_string_ Additional CSS style of the div container for the buttons and dropdown menu.

## data
_array_ Array of preselected values arrays.<br>
Every value array should be given with the three array keys:<br>
- 'id'    => identification string for the value i.e. database ID number,
- 'mark'  => 0|1 flag for the emphasis of the value
- 'value' => string displayed as the value itself.

If empty 'id' is set to uniqid().<br>
If not 0 and not 1 'mark' is set to 0.<br>
If empty 'value' is set to 'error: missing value key in data array'.<br>
There is the optional parameter 'additional' with HTML code to be inserted in the selected row. If given this replaces **additionalCode** for that row only. In case you want to remove the **additionalCode** only for that row set the 'additional' key to false.

## debug
_boolean_ Wheter to copy the asset file even if it has been already published before, default false.

## delay
_integer_ Delay between last key pressed and dropdown list opened in milliseconds, default 300. This option works only for **keyTrigger** = true.

## disabledClass
_string_ CSS class of the disabled element on the results list.<br>
Bootstrap default is 'disabled'.

## dropup
_boolean_ Wheter to add Bootstrap class 'dropup' to trigger dropdown menu above the button, default false.<br>
This option works as intended only for **bootstrap** parameter set to true.

## errorClass
_string_ CSS class of the result element displayed when AJAX failed to return data in addition to 'dropdown-header'.<br>
Bootstrap adds 'list-group-item-danger'.

## errorStyle
_string_ Additional CSS style of the result element displayed when AJAX failed to return data.

## extraButtonHtmlOptions
_array_ HTML options of the extra button between input text field and triggering button, default array().

## extraButtonLabel
_string_ HTML label for the extra button between input text field and triggering button, default ''.

## groupClass
_string_ CSS class of the div container for the input text field and div with buttons and dropdown menu in addition to 'ajaxDropDown'.<br>
Bootstrap adds 'input-group'.

## groupStyle
_string_ Additional CSS style of the div container for the input text field and div with buttons and dropdown menu.

## headerClass
_string_ CSS class of the results header element in addition to 'dropdown-header'.

## headerStyle
_string_ Additional CSS style of the results header element.

## hiddenClass
_string_ CSS class of the hidden element on the results list.<br>
Bootstrap default is 'hidden'.

## inputClass
_string_ CSS class of the input text field.<br>
Bootstrap adds 'form-control'.

## inputStyle
_string_ Additional CSS style of the input text field.

## keyTrigger
_boolean_ Wheter pressing the key in filter field should trigger the dropdown list to open, default true.<br>
This option works as intended only for _bootstrap_ parameter set to true.

## loadingClass
_string_ CSS class of the loading element on the results list in addition to 'ajaxDropDownLoading'.

## loadingStyle
_string_ Additional CSS style of the loading element on the results list.

## local
_array_ Array of translated strings used in widgets, default array().<br>
Default English strings are:
- 'allRecords'        => 'All records',
- 'error'             => 'Error',
- 'minimumCharacters' => 'Type at least {NUM} character(s) to filter the results...',
- 'next'              => 'next',
- 'noRecords'         => 'No matching records found',
- 'previous'          => 'previous',
- 'recordsContaining' => 'Records containing',

_{NUM}_ tag is automatically replaced with value of **minQuery** in the 'minimumCharacters' element.

## mainClass
_string_ CSS class of the main div container of the widget in addition to 'ajaxDropDownWidget'.

## mainStyle
_string_ Additional CSS style of the main div container of the widget.

## markBegin
_string_ HTML string of the beginning of the emphasised value on the results and preselected list, default ''.<br>
Bootstrap sets to ```'<em>'```.

## markEnd
_string_ HTML string of the ending of the emphasised value on the results and preselected list, default ''.<br>
Bootstrap sets to ```'</em>'```.

## minified
_boolean_ Wheter to use minified version of js asset file, default true.

## minQuery
_integer_ Number of characters in the input text field required to send AJAX query, default 0.

## model
_CModel_ Data model associated with this widget.

## name
_string_ Widget name. This must be set if **model** is not set.

## nextBegin
_string_ HTML string of the beginning of the 'next' link on the results list, default ''.<br>
Bootstrap sets to ```'<small>'```.

## nextClass
_string_ CSS class of the 'next' link on the results list in addition to 'ajaxDropDownNext'.<br>
Bootstrap adds 'pull-right btn'.

## nextEnd
_string_ HTML string of the ending of the 'next' link on the results list, default ''.<br>
Bootstrap sets to ```' <span class="glyphicon glyphicon-chevron-right"></span></small>'```.

## nextStyle
_string_ Additional CSS style of the 'next' link on the results list.<br>
Bootstrap sets to 'clear:none;'.

## noRecordsClass
_string_ CSS class of the result element displayed when AJAX returns no matching records in addition to 'dropdown-header'.

## noRecordsStyle
_string_ Additional CSS style of the result element displayed when AJAX returns no matching records.

## onRemove
_string_ JavaScript expression to be called when a result is removed from the list.<br>
Available js variables:
- _id_ - ID of the removed result,
- _selection_ - list of all selected results (after removing).

## onSelect
_string_ JavaScript expression to be called when a result is selected from the list.<br>
Available js variables:
- _id_  - ID of the selected result,
- _label_ - label of the selected result,
- _selection_ - list of all selected results (after adding).

## pagerBegin
_string_ HTML string of the beginning of the actual page / total pages indicator, default ''.<br>
Bootstrap sets to ```'<span class="badge pull-right">'```.

## pagerEnd
_string_ HTML string of the ending of the actual page / total pages indicator, default ''.<br>
Bootstrap sets to ```'</span>'```.

## previousBegin
_string_ HTML string of the beginning of the 'previous' link on the results list, default ''.<br>
Bootstrap sets to ```'<small><span class="glyphicon glyphicon-chevron-left"></span> '```.

## previousClass
_string_ CSS class of the 'previous' link on the results list in addition to 'ajaxDropDownPrev'.<br>
Bootstrap adds 'pull-left btn'.

## previousEnd
_string_ HTML string of the ending of the 'previous' link on the results list, default ''.<br>
Bootstrap sets to ```'</small>'```.

## previousStyle
_string_ Additional CSS style of the 'previous' link on the results list.<br>
Bootstrap sets to 'clear:none;'.

## progressBar
_string_ HTML string of the loading results indicator, default ''.<br>
Bootstrap sets to ```'<div class="progress" style="width:90%;margin:0 auto"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:100%">{LOADING}</div></div>'```.<br>
_{LOADING}_ tag used here is replaced with translated 'Loading' string.

## recordClass
_string_ CSS class of the result value element on the results list in addition to 'ajaxDropDownPages'.

## recordStyle
_string_ Additional CSS class of the result value element on the results list.

## removeClass
_string_ CSS class of the link removing value from preselected list in addition to 'ajaxDropDownRemove'.<br>
Bootstrap adds 'text-danger pull-right'.

## removeLabel
_string_ HTML label of the link removing value from preselected list, default 'x'.<br>
Bootstrap sets to ```'<span class="glyphicon glyphicon-remove"></span>'```.

## removeSingleClass
_string_ CSS class of the button removing the selection on singleMode in addition to 'ajaxDropDownSingleRemove'.<br>
Bootstrap adds 'btn dropdown-toggle btn-default'.

## removeSingleLabel
_string_ HTML label of the button removing the selection on singleMode, default 'x'.<br>
Bootstrap sets ```'<span class="glyphicon glyphicon-remove text-danger"></span>'```.

## removeSingleStyle
_string_ Additional CSS style of the button removing the selection in singleMode, default 'display:none;'

## removeStyle
_string_ Additional CSS style of the link removing value from preselected list.

## resultClass
_string_ CSS class of the preselected data element.<br>
Bootstrap adds 'list-group-item'.

## resultStyle
_string_ Additional CSS style of the preselected data element.

## resultsClass
_string_ CSS class of the dropdown menu with AJAX records in addition to 'ajaxDropDownMenu'.<br>
Bootstrap adds 'dropdown-menu'.

## resultsStyle
_string_ Additional CSS style of the dropdown menu with AJAX records.<br>
Bootstrap sets to 'min-width:250px;'.

## selectedClass
_string_ CSS class of the div container for the preselected data in addition to 'ajaxDropDownResults'.<br>
Bootstrap adds 'list-group'.

## selectedStyle
_string_ Assitional CSS style of the div container for the preselected data.

## singleMode
_boolean_ Wheter to set widget in mode that allows only one selected value or more, default false.

## singleModeBottom
_boolean_ Wheter to display singleMode result underneath the widget, default false.

## source;
_mixed_ URL of the AJAX source of records. It can be string or array.

## switchClass
_string_ CSS class of the result value element holding the 'next' and 'previous' links.

## switchStyle
_string_ Additional CSS style of the result value element holding the 'next' and 'previous' links.

## translateCategory
_string_ Name of the translate category, default 'app'.

## triggerEvent
_string_ Event name to trigger/display the dropdown list.<br>
Bootstrap sets 'show.bs.dropdown'.

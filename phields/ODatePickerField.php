<?php

/**
 * ODatePickerField 
 * 
 * @uses OJuiField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class ODatePickerField extends OJuiField {

    public $options = array(
        'dateFormat'=>'dd/mm/yy',
    );

    public function element() {
        $this->form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'options'=>$this->options,
        ));
    }
}

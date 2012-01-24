<?php

/**
 * ODropDownListField 
 * 
 * @uses OItemsField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class ODropDownListField extends OItemsField {

    /*element {{{*/
    /**
     * Renders the field's dropdown list element. 
     * 
     * @access public
     * @return void
     */
    public function element() {
        echo $this->form->dropDownList($this->model, $this->attribute,
                $this->items, $this->htmlOptions);
    }
    /*}}}*/

}

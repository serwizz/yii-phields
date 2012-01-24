<?php

/**
 * OCheckBoxListField
 *
 * @uses OItemsField
 * @package
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com>
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OCheckBoxListField extends OItemsField {

    /*element {{{*/
    /**
     * Renders the field's checkbox list.
     *
     * @access public
     * @return void
     */
    public function element() {
        echo $this->form->checkBoxList($this->model, $this->attribute,
                $this->items, $this->htmlOptions);
    }
    /*}}}*/

}

<?php

/**
 * OFileField 
 * 
 * @uses OField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OFileField extends OField {

    /*element {{{*/
    /**
     * Renders the field's file selector element. 
     * 
     * @access public
     * @return void
     */
    public function element() {
        echo $this->form->fileField($this->model, $this->attribute,
                $this->htmlOptions);
    }
    /*}}}*/

}

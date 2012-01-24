<?php

/**
 * OTextAreaField
 *
 * @uses OField
 * @package
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com>
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OTextAreaField extends OField {

    /*element {{{*/
    /**
     * Renders the field's textarea element.
     *
     * @access public
     * @return void
     */
    public function element() {
        echo $this->form->textArea($this->model, $this->attribute,
                $this->htmlOptions);
    }
    /*}}}*/

}

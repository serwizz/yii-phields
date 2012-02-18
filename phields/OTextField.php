<?php

/**
 * OTextField
 *
 * @uses OField
 * @package
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com>
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OTextField extends OField {

    /*element {{{*/
    /**
     * Renders the field's text field element.
     *
     * @access public
     * @return void
     */
    public function element() {
        $type = (strstr($this->attribute, 'password'))
            ? 'passwordField'
            : 'textField';
        echo $this->form->$type($this->model, $this->attribute,
                $this->htmlOptions);
    }
    /*}}}*/

}

<?php

/**
 * OCheckBoxField 
 * 
 * @uses OField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OCheckBoxField extends OField {

    /*run {{{*/
    /**
     * Runs the field. Renders the field's element before it's label, instead of
     * default rendering order. 
     * 
     * @access public
     * @return void
     */
    public function run() {
        $this->begin();
        $this->element();
        $this->label();
        $this->error();
        $this->end();
    }
    /*}}}*/

    /*element {{{*/
    /**
     * Renders the field's checkbox element. 
     * 
     * @access public
     * @return void
     */
    public function element() {
        echo $this->form->checkBox($this->model, $this->attribute,
                $this->htmlOptions);
    }
    /*}}}*/

}

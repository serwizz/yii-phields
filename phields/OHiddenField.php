<?php

/**
 * OHiddenField 
 * 
 * @uses OField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OHiddenField extends OField {

    /*decorate {{{*/
    /**
     * decorate 
     * 
     * @var mixed
     * @access public
     */
    public $decorate = false;
    /*}}}*/


    /*element {{{*/
    /**
     * element 
     * 
     * @access public
     * @return void
     */
    public function element() {
        echo $this->form->hiddenField($this->model,
                $this->attribute);
    }
    /*}}}*/

}

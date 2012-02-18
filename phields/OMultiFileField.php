<?php

/**
 * OMultiFileField 
 * 
 * @uses OJuiField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OMultiFileField extends OJuiField {

    /*element {{{*/
    /**
     * element 
     * 
     * @access public
     * @return void
     */
    public function element() {
        $this->form->widget('CMultiFileUpload', array(
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'htmlOptions'=>$this->htmlOptions,
            'options'=>$this->options,
        ));
    }
    /*}}}*/

}

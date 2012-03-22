<?php

/**
 * OAutoCompleteField 
 * 
 * @uses OJuiField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OAutoCompleteField extends OJuiField {

    /*fieldSuffix {{{*/
    /**
     * fieldSuffix 
     * 
     * @var string
     * @access public
     */
    public $fieldSuffix = '_code';
    /*}}}*/

    /*source {{{*/
    /**
     * source 
     * 
     * @var array
     * @access public
     */
    public $source = array();
    /*}}}*/

    /*sourceUrl {{{*/
    /**
     * sourceUrl 
     * 
     * @var mixed
     * @access public
     */
    public $sourceUrl = null;
    /*}}}*/

    
    /*element {{{*/
    /**
     * element 
     * 
     * @access public
     * @return void
     */
    public function element() {
        $this->form->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'source'=>$this->source,
            'options'=>$this->options,
            'htmlOptions'=>$this->htmlOptions,
        ));
        echo $this->form->hiddenField($this->model, $this->attribute.$this->fieldSuffix);
    }
    /*}}}*/

}

<?php

/**
 * OField 
 * 
 * @uses CComponent
 * @uses IField
 * @abstract
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
abstract class OField extends CComponent implements IField {

    /*labelHtmlOptions {{{*/
    /**
     * labelHtmlOptions 
     * 
     * @var array
     * @access public
     */
    public $labelHtmlOptions = array(
    );
    /*}}}*/

    /*htmlOptions {{{*/
    /**
     * htmlOptions 
     * 
     * @var array
     * @access public
     */
    public $htmlOptions = array(
    );
    /*}}}*/

    /*owner {{{*/
    /**
     * owner 
     * 
     * @var mixed
     * @access public
     */
    public $owner = null;
    /*}}}*/

    /*rowHtmlOptions {{{*/
    /**
     * rowHtmlOptions 
     * 
     * @var array
     * @access public
     */
    public $rowHtmlOptions = array(
        'class'=>'row',
    );
    /*}}}*/

    /*attribute {{{*/
    /**
     * attribute 
     * 
     * @var string
     * @access public
     */
    public $attribute = '';
    /*}}}*/

    /*class {{{*/
    /**
     * class 
     * 
     * @var string
     * @access public
     */
    public $class = '';
    /*}}}*/

    /*init {{{*/
    /**
     * init 
     * 
     * @access public
     * @return void
     */
    public function init() {
    }
    /*}}}*/

    /*run {{{*/
    /**
     * run 
     * 
     * @access public
     * @return void
     */
    public function run() {
        $this->begin();
        $this->label();
        $this->element();
        $this->error();
        $this->end();
    }
    /*}}}*/

    /*begin {{{*/
    /**
     * begin 
     * 
     * @access public
     * @return void
     */
    public function begin() {
        echo CHtml::openTag('div', $this->rowHtmlOptions);
    }
    /*}}}*/

    /*end {{{*/
    /**
     * end 
     * 
     * @access public
     * @return void
     */
    public function end() {
        echo CHtml::closeTag('div');
    }
    /*}}}*/

    /*label {{{*/
    /**
     * label 
     * 
     * @access public
     * @return void
     */
    public function label() {
        echo $this->form->labelEx($this->model, $this->attribute,
                $this->labelHtmlOptions);
    }
    /*}}}*/

    /*getForm {{{*/
    /**
     * getForm 
     * 
     * @access public
     * @return void
     */
    public function getForm() {
        return $this->owner->form;
    }
    /*}}}*/

    /*__construct {{{*/
    /**
     * __construct 
     * 
     * @param mixed $owner 
     * @access public
     * @return void
     */
    public function __construct($owner) {
        $this->owner = $owner;
    }
    /*}}}*/

    /*getModel {{{*/
    /**
     * getModel 
     * 
     * @access public
     * @return void
     */
    public function getModel() {
        return $this->owner->model;
    }
    /*}}}*/

    /*error {{{*/
    /**
     * error 
     * 
     * @access public
     * @return void
     */
    public function error() {
        echo $this->form->error($this->model, $this->attribute);
    }
    /*}}}*/

}

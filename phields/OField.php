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

    /*attribute {{{*/
    /**
     * The field's attribute name.
     *
     * @var string
     * @access public
     */
    public $attribute = '';
    /*}}}*/

    /*captionAfter {{{*/
    /**
     * captionAfter
     *
     * @var string
     * @access public
     */
    public $captionAfter = '';
    /*}}}*/

    /*class {{{*/
    /**
     * The field's class name.
     *
     * @var string
     * @access public
     */
    public $class = '';
    /*}}}*/

    /*decorate {{{*/
    /**
     * decorate
     *
     * @var mixed
     * @access public
     */
    public $decorate = true;
    /*}}}*/

    /*headerHtmlOptions {{{*/
    /**
     * headerHtmlOptions
     *
     * @var array
     * @access public
     */
    public $headerHtmlOptions = array(
    );
    /*}}}*/

    /*htmlOptions {{{*/
    /**
     * HTML options of the field's elemen.
     *
     * @var array
     * @access public
     */
    public $htmlOptions = array(
    );
    /*}}}*/

    /*label {{{*/
    /**
     * label
     *
     * @var string
     * @access public
     */
    public $label = '';
    /*}}}*/

    /*labelHtmlOptions {{{*/
    /**
     * HTML options of the field's label.
     *
     * @var array
     * @access public
     */
    public $labelHtmlOptions = array(
    );
    /*}}}*/

    /*owner {{{*/
    /**
     * The field's owner instance.
     *
     * @var mixed
     * @access public
     */
    public $owner = null;
    /*}}}*/

    /*rowHtmlOptions {{{*/
    /**
     * HTML options of the field's container.
     *
     * @var array
     * @access public
     */
    public $rowHtmlOptions = array(
        'class'=>'row',
    );
    /*}}}*/

    /*separator {{{*/
    /**
     * separator 
     * 
     * @var string
     * @access public
     */
    public $separator = "\n";
    /*}}}*/


    /*__construct {{{*/
    /**
     * The field's constructor.
     *
     * @param mixed $owner
     * @access public
     * @return void
     */
    public function __construct($owner) {
        $this->owner = $owner;
    }
    /*}}}*/

    /*begin {{{*/
    /**
     * Opens the field's container.
     *
     * @access public
     * @return void
     */
    public function begin() {
        echo CHtml::openTag('div', $this->rowHtmlOptions);
        echo $this->separator;
    }
    /*}}}*/

    /*_captionAfter {{{*/
    /**
     * _captionAfter
     *
     * @access protected
     * @return void
     */
    protected function _captionAfter() {
        echo CHtml::tag('span', array('class'=>'caption after'),
                $this->captionAfter, true);
    }
    /*}}}*/

    /*end {{{*/
    /**
     * Closes the field's container.
     *
     * @access public
     * @return void
     */
    public function end() {
        echo CHtml::closeTag('div');
        echo $this->separator;
    }
    /*}}}*/

    /*error {{{*/
    /**
     * Renders the field's validation error (if any).
     *
     * @access public
     * @return void
     */
    public function error() {
        echo $this->form->error($this->model, $this->attribute);
    }
    /*}}}*/

    /*getForm {{{*/
    /**
     * Return the field's owner CActiveForm instance.
     *
     * @access public
     * @return void
     */
    public function getForm() {
        return $this->owner->form;
    }
    /*}}}*/

    /*getModel {{{*/
    /**
     * Returns the field's owner model instance.
     *
     * @access public
     * @return void
     */
    public function getModel() {
        return $this->owner->model;
    }
    /*}}}*/

    /*init {{{*/
    /**
     * Initiates the field.
     *
     * @access public
     * @return void
     */
    public function init() {
        /*rowHtmlOptions {{{*/
        $class = (!empty($this->rowHtmlOptions['class']))
            ? $this->rowHtmlOptions['class']
            : 'row';
        $class .= ' '.$this->class;
        $this->rowHtmlOptions['class'] = $class;
        /*}}}*/
    }
    /*}}}*/

    /*label {{{*/
    /**
     * Renders the field's label.
     *
     * @access public
     * @return void
     */
    public function label() {
        if (!empty($this->label)) {
            echo CHtml::label($this->label, get_class($this).'_'.$this->attribute);
        } else {
            echo $this->form->labelEx($this->model, $this->attribute,
                $this->labelHtmlOptions);
        }
    }
    /*}}}*/

    /*run {{{*/
    /**
     * Runs the field.
     *
     * @access public
     * @return void
     */
    public function run() {
        if ($this->decorate) {
            $this->begin();
            $this->label();
            $this->element();
            /*captionAfter {{{*/
            if ($this->captionAfter != '') {
                $this->_captionAfter();
            }
            /*}}}*/
            $this->error();
            $this->end();
        } else {
            $this->element();
        }
    }
    /*}}}*/

}

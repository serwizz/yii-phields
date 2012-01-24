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

    /*class {{{*/
    /**
     * The field's class name.
     *
     * @var string
     * @access public
     */
    public $class = '';
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
        echo $this->form->labelEx($this->model, $this->attribute,
                $this->labelHtmlOptions);
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
        $this->begin();
        $this->label();
        $this->element();
        $this->error();
        $this->end();
    }
    /*}}}*/

}

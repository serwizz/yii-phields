<?php

/**
 * OPhieldset 
 * 
 * @uses CComponent
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OPhieldset extends CComponent {

    /*owner {{{*/
    /**
     * owner 
     * 
     * @var mixed
     * @access public
     */
    public $owner = null;
    /*}}}*/

    /*defaultFieldClass {{{*/
    /**
     * defaultFieldClass 
     * 
     * @var string
     * @access public
     */
    public $defaultFieldClass = 'Text';
    /*}}}*/

    /*htmlOptions {{{*/
    /**
     * htmlOptions 
     * 
     * @var array
     * @access public
     */
    public $htmlOptions = array(
        'class'=>'fieldset',
    );
    /*}}}*/

    /*fields {{{*/
    /**
     * fields 
     * 
     * @var array
     * @access public
     */
    public $fields = array(
    );
    /*}}}*/

    /*init {{{*/
    /**
     * init 
     * 
     * @access public
     * @return void
     */
    public function init() {
        foreach ($this->fields as $k=>$v) {
            if (!is_array($v)) {
                $this->fields[$k] = array(
                    'attribute'=>$v,
                );
            }
            if (empty($this->fields[$k]['class'])) {
                $this->fields[$k]['class'] = $this->defaultFieldClass;
            }
        }
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
        $this->fields();
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
        echo CHtml::openTag('div', $this->htmlOptions);
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

    /*fields {{{*/
    /**
     * fields 
     * 
     * @access public
     * @return void
     */
    public function fields() {
        foreach ($this->fields as $k=>$v) {
            $this->field($v);
        }
    }
    /*}}}*/

    /*field {{{*/
    /**
     * field 
     * 
     * @param mixed $options 
     * @access public
     * @return void
     */
    public function field($options) {
        $field = $this->createField($options);
        $field->run();
    }
    /*}}}*/

    /*createField {{{*/
    /**
     * createField 
     * 
     * @param mixed $options 
     * @access public
     * @return void
     */
    public function createField($options) {
        $class = 'O'.$options['class'].'Field';
        $field = new $class($this);
        foreach ($options as $k=>$v) {
            $field->$k = $v;
        }
        $field->init();
        return $field;

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

}

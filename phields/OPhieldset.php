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

    /*defaultFieldClass {{{*/
    /**
     * Class name for the fieldsets' fields with no class name given directly.
     *
     * @var string
     * @access public
     */
    public $defaultFieldClass = 'Text';
    /*}}}*/

    /*fields {{{*/
    /**
     * The fieldset's fields.
     *
     * @var array
     * @access public
     */
    public $fields = array(
    );
    /*}}}*/

    /*htmlOptions {{{*/
    /**
     * HTML options of the fieldset.
     *
     * @var array
     * @access public
     */
    public $htmlOptions = array(
        'class'=>'fieldset',
    );
    /*}}}*/

    /*owner {{{*/
    /**
     * Instance of the fieldset's owner.
     *
     * @var mixed
     * @access public
     */
    public $owner = null;
    /*}}}*/


    /*__construct {{{*/
    /**
     * The fieldset's constructor.
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
     * Opens the fieldset container.
     *
     * @access public
     * @return void
     */
    public function begin() {
        echo CHtml::openTag('div', $this->htmlOptions);
    }
    /*}}}*/

    /*createField {{{*/
    /**
     * Creates a field with the given options.
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

    /*end {{{*/
    /**
     * Closes the fieldset's container.
     *
     * @access public
     * @return void
     */
    public function end() {
        echo CHtml::closeTag('div');
    }
    /*}}}*/

    /*field {{{*/
    /**
     * Creates and renders the fieldset's field with given options.
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

    /*fields {{{*/
    /**
     * Renders all of the fieldset's fields.
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

    /*getForm {{{*/
    /**
     * Returns the fieldset's owner's CActiveForm widget instance.
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
     * Returns the fieldset's owner's model instance.
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
     * Initiates the fieldset.
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
            /*class {{{*/
            if (empty($this->fields[$k]['class'])) {
                $attribute = $this->fields[$k]['attribute'];
                $behaviors = array_values($this->model->behaviors());
                if (in_array('OPropzHolderBehavior', $behaviors)) { 
                    try {
                        $class = $this->model->getPropzType($attribute);
                    } catch (Exception $ex) {
                        $class = $this->defaultFieldClass;
                    }
                }
                $this->fields[$k]['class'] = (!empty($class))
                    ? $class
                    : $this->defaultFieldClass;
            }
            /*}}}*/
        }
    }
    /*}}}*/

    /*run {{{*/
    /**
     * Runs the fieldset.
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

}

<?php

/**
 * OItemsField
 *
 * @uses OField
 * @abstract
 * @package
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com>
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
abstract class OItemsField extends OField {

    /*items {{{*/
    /**
     * Items of the field's element.
     *
     * @var array
     * @access public
     */
    public $items = array(
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
        if (empty($this->items)) {
            /*propzHolder {{{*/
            if (in_array('OPropzHolderBehavior', array_values($this->model->behaviors()))) {
                $this->items = CHtml::listData($this->model->getPropzItems($this->attribute),
                        'position', 'value');
            }
            /*}}}*/
        }
        return parent::init();
    }
    /*}}}*/

}

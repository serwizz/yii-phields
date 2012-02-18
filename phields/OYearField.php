<?php

/**
 * OYearField 
 * 
 * @uses ODropDownListField
 * @package 
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com> 
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OYearField extends ODropDownListField {

    /*min {{{*/
    /**
     * min 
     * 
     * @var float
     * @access public
     */
    public $min = 1900;
    /*}}}*/

    /*max {{{*/
    /**
     * max 
     * 
     * @var float
     * @access public
     */
    public $max = 2000;
    /*}}}*/


    /*init {{{*/
    /**
     * init 
     * 
     * @access public
     * @return void
     */
    public function init() {
        $items = range($this->min, $this->max);
        foreach ($items as $k=>$v) {
            $this->items[$v] = $v;
        }
        return parent::init();
    }
    /*}}}*/

}

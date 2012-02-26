<?php

/**
 * OPopupField
 *
 * @uses OField
 * @package
 * @version $id$
 * @copyright Tako Neko
 * @author Tako Neko <oct8cat@gmail.com>
 * @license GNU GPL v3.0 {@link http://www.gnu.org/copyleft/gpl.html}
 */
class OPopupField extends OField {

    /*element {{{*/
    /**
     * @access public
     * @return void
     */
    public function element() {
        echo CHtml::ajaxLink('выбрать метро',
            Yii::app()->createUrl('metro/map', array('cityId'=>'77')),
            array(
                'type'=>'POST',
                'success'=>'function(data,status){
                    $("#metro_popup").html(data);
                    $("#metro_popup").center();
                    var ids = [];
                    if($("#metro_choose").html() != ""){
                        $("#metro_choose").find("div").each(function(i){
                            $("#metro_popup #"+$(this).attr("class")).addClass("selected");
                        });
                        $("#stantions .st_list").html($("#metro_choose").html());
                    }
                    //$("#metro_popup .m").bind("click", $("metro_popup .m").selectStantion);
                    $("#metro_popup .m").click(function(){$(this).selectStantion("'.get_class($this->model).'")});
                    $("#metro_popup").showBlack();
                    $("#metro_popup").fadeIn();
                }'
            ),
            array('class'=>'pseudo')
        );
        echo CHtml::openTag('div', array('id'=>'metro_choose'));
        if (!empty($this->model->metroId)) {
            foreach ($this->model->metroId as $k=>$v) {
                $id = str_replace('m', '', $v);
                echo CHtml::openTag('div', array('class'=>$v));
                echo CHtml::tag('span', array(), Metro::model()->cache(3600)->findByPk($id)->title, true);
                echo "\n";
                echo CHtml::link('×', 'javascript:void()', array('onClick'=>'$(this).deleteStantion()'));
                echo CHtml::hiddenField(get_class($this->model).'[metroId]['.$v.']', $v);
                echo CHtml::closeTag('div');
            }
        }
        echo CHtml::closeTag('div');
        
    }
    /*}}}*/

}

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
                                            $("#metro_popup .m").bind("click", $("metro_popup .m").selectStantion);
                                            $("#metro_popup").showBlack();
                                            $("#metro_popup").fadeIn();
                                        }'
                                    ),
                                    array('class'=>'pseudo')
        );
    }
    /*}}}*/

}

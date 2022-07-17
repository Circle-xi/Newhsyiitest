<?php
class Type extends BaseModel
{

    public function tableName()
    {
        return '{{type}}';
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    /**   * 模型关联规则  */
    public function relations() {
        return array();
    }

   /*** 模型验证规则*/
    public function rules() {
      return $this->attributeRule();
    }

    /** * 属性标签 */
    public function attributeLabels() {
        return $this->getAttributeSet();
    }

    public function attributeSets() {
        return array(
            'id' =>  'id',
            'code' => '编码',
            'type' =>  '投诉类型',
           
        );
    }


   public function keySelect(){
        return array('1','type','id:code');

   }
  
   
    
}
   /* public function downSearch($title,$filedname){
     return BaseLib::model()->searchBy($title,$filedname,$this->gData(),'type');
    }

}
*/

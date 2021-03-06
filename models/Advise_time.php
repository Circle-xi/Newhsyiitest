<?php
class Advise_time extends BaseModel {
    public function tableName()
    {
        return '{{advise_time}}'; // TODO: Change the autogenerated stub
    }
    /*** Returns the static model of the specified AR class. */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    /**  * 模型关联规则  */
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
        'id' => 'id',
        'code' => '次数编码:k',
        'time' => '人大次数:k',
        'comment' => '备注',
        );

     //x2_scourse,id,code,value,subjectsetting,subpic,id,x2_scourse;id;code;value;subjectsetting;subpic;id;
    }
    
//   public function picLabels() {
//        return 'file';//图片或文件
//    }
//   public  function pathLabels(){
//       return 'articles';//文件存放路径
//   }
  
   /* 用于列表查询使用，三个参数分别是  1 条件 2 是排序 三是或取值，格式 变量[：变量]*/
    public function keySelect(){
        return array('1','code','time');
    }
}
   
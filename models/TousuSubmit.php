<?php
class TousuSubmit extends BaseModel {
    public function tableName()
    {
        return '{{tousu_submit}}'; // TODO: Change the autogenerated stub
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
        'code' => '编码',//:k是不能为空的意思
        'submit_time'=>'提交时间',
        'shenhe_time'=>'审核时间',
        'fankui_time'=>'反馈时间',
        'phone' => '手机号码',
        'type' => '投诉类别',
        'content'=>'投诉内容',
        'subpic' => '上传图片',
        'niming'=>'是否匿名',
        'huifang'=>'是否回访',
        'time'=>'操作时间',
        'is_tijiao'=>'是否处于提交状态',
        'is_judge'=>'是否处于审核状态',
        'is_shouli'=>'是否处于受理的状态',
        'workState' => '工作状态',
        );

     //x2_scourse,id,code,phone,type,subpic,id,x2_scourse;id;code;value;subjectsetting;subpic;id;
    }
    

   public function picLabels() {
        return 'subpic';//图片或文件
    }  
   public  function pathLabels(){
       return 'tousuSubmit';//文件存放路径
   }
  
   /* 用于列表查询使用，三个参数分别是  1 条件 2 是排序 三是或取值，格式 变量[：变量]*/
    public function keySelect(){
        return array('1','type','id:phone');
    }
    
    

}
   
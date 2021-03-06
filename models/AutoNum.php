<?php
class AutoNum extends BaseModel {
    public function tableName()
    {
        return '{{autonumber}}'; // TODO: Change the autogenerated stub
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
       
        'auto_num' => '内部id',
        'date'=>'日期',
        'data'=>'序号',
       
        );
       

     //x2_scourse,id,code,value,subjectsetting,subpic,id,x2_scourse;id;code;value;subjectsetting;subpic;id;
    }
    
   /*public function picLabels() {
        return 'subpic';//图片或文件
    }  
   public  function pathLabels(){tem
   }
  
   /* 用于列表查询使用，三个参数分别是  1 条件 2 是排序 三是或取值，格式 变量[：变量]*/
    public function keySelect(){
        return array('1','code','value');
    }
    public function getnumber(){
        $d1=date('Y-m-d');
        $temp=$this->find("date='".$d1."'");
        if(empty($temp)){
            $temp=new AutoNum ;
            $temp->date=$d1;
            $temp->data=0;
         }
         $temp->data=$temp->data+1;
         $temp->save();
         //put_msg( $temp->attributes);
              //put_msg('0000'.$temp->data.'='.substr('0000'.$temp->data,-4, 4));
         return str_replace('-','',''.date('Y-m-d')).substr('0000'.$temp->data,-4, 4);//最大四位
    }
}
   
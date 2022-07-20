<?php
class Advise extends BaseModel {
    public function tableName()
    {
        return '{{advise}}'; // TODO: Change the autogenerated stub
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
        'code' => '编码',
        'session' => '届',
        'time' => '次',
        'title' => '标题',
        'type' => '类型',
        'proposer' => '建议人',
        'submit_time' => '提交时间',
        'advise_content' => '内容',
        'undertaker' => '承办单位',
        'reply_content' => '答复内容',
        'is_submit' => '是否在建议提交页面',
        'is_judge' => '是否在建议审核页面',
        'is_assign' => '是否在建议指派页面',
        'is_deal'=>'是否在跟进处理界面',
        'is_finish'=>'是否在处理完成界面',
        'is_reply' => '是否在建议答复页面',
        'is_niming'=>'是否匿名',
        'is_huifang'=>'是否回访',//类似回复的时候给你打电话/发邮件之类？
        'judge_time'=>'审核时间',
        'prefinish_time'=>'预计完成时间',
        'finish_time'=>'完成时间',
        'deal_situation'=>'处理情况',
        'is_confirm'=>'是否确认答复',
        'is_accept'=>'是否受理',
        'ok_judge'=>'审核完成',
        'is_passjudge'=>'是否通过审核',
        'ok_assign'=>'是否指派完成',
        'submit_status' => '状态',//待提交
        'okjudge_status' => '状态',//已审核
        'penjudge_status' => '状态',//未审核
        'passjudge_status' => '状态',//审核通过
        'failjudge_status' => '状态',//审核不通过
        'okassign_status'=> '状态',//已指派
        'penassign_status' => '状态',//未指派
        'pendeal_status' => '状态',//未跟进处理
        'okdeal_status' => '状态',//已跟进处理
        'penfinish_status'=>'状态',//未处理完成
        'okfinish_status'=>'状态',//已处理完成
        'okreply_status' =>'状态',//已答复
        'oksubmit_status'=>'状态',//已提交
        'update_time'=>'更新时间',//更新时间
        );

     //x2_scourse,id,code,value,subjectsetting,subpic,id,x2_scourse;id;code;value;subjectsetting;subpic;id;
    }
    
  public function picLabels() {
       return 'subpic';//图片或文件  
        }
//   public  function pathLabels(){
//       return 'articles';//文件存放路径
//   }
  
   /* 用于列表查询使用，三个参数分别是  1 条件 2 是排序 三是或取值，格式 变量[：变量]*/
    public function keySelect(){
        return array('1','code','title');
    }
}
   
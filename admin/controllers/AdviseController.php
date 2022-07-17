<?php
class AdviseController extends BaseController {

   protected $model = '';
   public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
    }
  public function actionDelete($id) {
      parent::_clear($id,'','id');
    }
    
  public function actionCreate() {   

      //$PNUM="code" . date("YmdHis").rand(1000,9999);
      
       $this-> viewUpdate(0);
   } 

   public function actionUpdate($id) {
        $this-> viewUpdate($id);
    }/*曾老师保留部份，---结束*/
  
  public function viewUpdate($id=0) {
        $modelName = $this->model;
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
           $data = array();
           if($id==0) $model->code=AutoNum::model()->getnumber();//提交前生成编号
           $data['model'] = $model;
           $this->render('update', $data);

        } else {

            $submitType = $_POST['submitType'];
           date_default_timezone_set('PRC'); //设置时区为中国
           $model->submit_time = date('Y-m-d H:i:s', time());//获取当前时间
                $model->ok_judge = 0;
                $model->is_assign = 0;
                $model->is_deal = 0;
                $model->is_finish = 0;
                $model->is_reply = 0;
            if($submitType == 'baocun'){
                $model->is_submit = 1;//还显示在这
                $model->is_judge = 0;
                $model->submit_status = '待提交';
            }
            else{
                $model->is_submit = 0;
                $model->is_judge = 1;//显示在审核页面了
                /*$model->is_assign = 0;
                $model->is_deal = 0;
                $model->is_finish = 0;
                $model->is_reply = 0;*/
                $model->oksubmit_status = '已提交';
                $model->penjudge_status = '待审核';
            }

           $this-> saveData($model,$_POST[$modelName]);
        }
    }/*曾老师保留部份，---结束*/
     
    /*public function actionUpdateJudge0($id=0) {
        $modelName = $this->model;
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
           $data = array();
           $data['model'] = $model;
           $this->render('updateJudge0', $data);
        } else {
           $this-> saveData($model,$_POST[$modelName]);
        }
    }/*曾老师保留部份，---结束*/

    public function actionUpdateJudge() {//$id=0
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;

        $model=Advise::model()->find('is_judge=1');
        
        if(isset($model))
        {
          $id=Advise::model()->find('is_judge=1')->id;
          $model = $this->loadModel($id, $modelName);


          $Advise=Advise::model()->find('id='.$id);
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);

        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('updateJudge', $data);
        } else {

            $submitType = $_POST['submitType'];
            date_default_timezone_set('PRC');
            $model->judge_time = date('Y-m-d H:i:s', time());
                 $model->is_submit = 0;
                 $model->is_deal = 0;
                $model->is_finish = 0;
                $model->is_reply = 0;
            if($submitType == 'baocun'){//如果按了保存
               
                $model->is_judge = 0;//
                $model->ok_judge = 1;//还显示在审核页面
                $model->is_passjudge = 0;//审核不通过
                $model->is_assign = 0;
                $model->okjudge_status = '审核不通过';
                $model->failjudge_status = '审核不通过';
            }
            else{
                //$model->is_submit = 0;
                $model->is_judge = 0;
                $model->ok_judge = 1;
                $model->is_passjudge = 1;//审核通过
                $model->is_assign = 1;//显示在指派界面
                $model->okjudge_status = '审核通过';
                $model->passjudge_status = '审核通过';
                $model->penassign_status = '待指派';
            }
            $this-> saveData($model,$_POST[$modelName]);
          }
        }
     else
      {
        $msg="已经没有可以继续审核的建议";
        echo $msg;
      }
    }


    public function actionUpdateAssign($id=0) {
        $modelName = $this->model;
        put_msg($_POST);
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('updateAssign', $data);
        } else {

            $submitType = $_POST['submitType'];
//            $model->submitTime = date('Y-m-d H:i:s', time());
                $model->is_submit = 0;
                $model->is_judge = 0;
                //$model->ok_judge = 1;
                $model->is_finish = 0;
                $model->is_reply = 0;
            if($submitType == 'baocun'){
                $model->is_assign = 1;//显示在指派页面,3
                $model->is_deal = 0;
                $model->penassign_status = '待指派';
            }
            else{
                $model->is_assign = 0;
                $model->is_deal = 1;//显示在跟进页面,4
                $model->ok_assign = 1;
                $model->okassign_status = '已指派';
                $model->pendeal_status = '待跟进';
            }

            $this-> saveData($model,$_POST[$modelName]);
        }
    }

     public function actionUpdateDeal($id=0) {
        $modelName = $this->model;
       put_msg('LINE 140A');
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('updateDeal', $data);
        } else {

            $submitType = $_POST['submitType'];
//            $model->submitTime = date('Y-m-d H:i:s', time());
                $model->is_submit = 0;
                $model->is_judge = 0;
                //$model->ok_judge = 1;
                $model->is_assign = 0;
                $model->is_reply = 0;             
            if($submitType == 'baocun'){
                $model->is_deal = 1;//显示在跟进页面,4，待跟进
                $model->is_finish = 0;
                $model->pendeal_status = '待跟进';
            }
            else{
                $model->is_deal = 0;
                $model->is_finish = 1;//显示在完成页面,5
                $model->is_deal = 2;//已跟进  
                $model->okdeal_status = '已跟进';
                $model->penfinish_status = '待处理完成';
            }

            $this-> saveData($model,$_POST[$modelName]);
        }
    }

    public function actionUpdateFinish($id=0) {
        $modelName = $this->model;
        put_msg($_POST);
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('updateFinish', $data);
        } else {

            $submitType = $_POST['submitType'];
            date_default_timezone_set('PRC');
            $model->finish_time = date('Y-m-d H:i:s', time());
                $model->is_submit = 0;
                $model->is_judge = 0;
                //$model->ok_judge = 1;
                $model->is_assign = 0;
                $model->is_deal = 2;  

            if($submitType == 'baocun'){
                $model->is_finish = 1;//显示在完成页面,5
                $model->is_reply = 0;
                $model->penfinish_status = '待处理完成';
            }
            else{
                $model->is_finish = 2;
                $model->is_reply = 1;//显示在答复页面,6
                $model->okfinish_status = '处理完成';
                $model->okreply_status = '已答复';
            }

            $this-> saveData($model,$_POST[$modelName]);
        }
    }

    public function actionUpdateReply($id=0) {
        $modelName = $this->model;
        put_msg($_POST);
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('updateReply', $data);
        } else {

           /* $submitType = $_POST['submitType'];
  //        $model->submitTime = date('Y-m-d H:i:s', time());
                $model->is_submit = 0;
                $model->is_judge = 0;
                //$model->ok_judge = 1;
                $model->is_assign = 0;
                $model->is_deal = 0;
                $model->is_finish = 0;           
            if($submitType == 'baocun'){ 
                $model->is_reply = 1;//显示在答复页面
                $model->status = '未确认';
            }
            else{
                $model->is_reply = 1;//显示在答复页面
                $model->status = '已确认';
            }
*/
            $this-> saveData($model,$_POST[$modelName]);
        }
    }


   function saveData($model,$post) {
       $model->attributes =$post;
       show_status($model->save(false),'保存成功', get_cookie('_currentUrl_'),'保存失败');  //标记一下
    }
    //待提交
    public function actionIndex( $keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_submit=1');
        $criteria->condition=get_like('is_submit=1','code,type,title',$keywords,'');//把上面那行注释掉就可以实现查询功能，is_deal是条件，这里的code、type、title是作为查询的关键字
        $criteria->order="code";//areaCode,areaName

//        $criteria->condition=get_where($criteria->condition,($time!=""),'time=',time,'"');
        $data = array();
//        parent::_list($model, $criteria, 'index', $data);
        parent::display($this->model, $criteria, 'index', $data);
    }
    //已提交
    public function actionIndexOkSubmit( $keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_submit=1');
        $criteria->condition=get_like('is_submit=0','code,type,title',$keywords,'');
        $criteria->order="code";//areaCode,areaName
        $data = array();
        parent::display($this->model, $criteria, 'indexOkSubmit', $data);
    }
    //待审核
    public function actionIndexPenJudge($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_judge=1');
        $criteria->condition=get_like('is_judge=1','code,type,title',$keywords,'');//is_judge=1表示未审核的
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexPenJudge', $data);
    }
    //审核完成
    public function actionIndexOKJudge($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('ok_judge=1');
        $criteria->condition=get_like('ok_judge=1','code,type,title',$keywords,'');//is_assign=1
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexOKJudge', $data);
    }
    //审核页面
    public function actionIndexJudge($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_judge=1');
        $criteria->condition=get_like('is_judge=1','code,type,title',$keywords,'');

        /*$nowtime = date('Y-m-d', time());
        $criteria->condition=get_where($criteria->condition,1,'judge_time=', $nowtime,'"');*/
        
        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudge', $data);
    }
    //审核通过页面
    public function actionIndexJudgePass($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_passjudge=1');
        //$model->status='审核通过';
        $criteria->condition=get_like('is_passjudge=1','code,type,title',$keywords,'');//is_assign=1
        //date_default_timezone_set('PRC');
        //$nowtime = date('Y-m-d', time());
         //$criteria->condition=get_where($criteria->condition,1,'judge_time=', $nowtime,'"'); 
        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudgePass', $data);
    }
    //审核不通过页面
    public function actionIndexJudgeFail($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_passjudge=0');
        $criteria->condition=get_like('is_passjudge=0','code,type,title',$keywords,'');//is_assign=1
        //date_default_timezone_set('PRC');
        //$nowtime = date('Y-m-d', time());
       // $criteria->condition=get_where($criteria->condition,1,'judge_time=', $nowtime,'"');
        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudgeFail', $data);
    }
    //待指派
    public function actionIndexPenAssign($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_assign=1');
        $criteria->condition=get_like('is_assign=1','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexPenAssign', $data);
    }
    //指派页面
    public function actionIndexAssign($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_assign=1');
        $criteria->condition=get_like('is_assign=1','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexAssign', $data);
    }
    //指派完成
    public function actionIndexOkAssign($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_assign=1');
        $criteria->condition=get_like('ok_assign=1','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexOkAssign', $data);
    }
    //待跟进
    public function actionIndexPenDeal($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_deal=1');
        $criteria->condition=get_like('is_deal=1','code,type,title',$keywords,'');//把上面那行注释掉就可以实现查询功能，is_deal是条件，这里的code、type、title是作为查询的关键字
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexPenDeal', $data);
    }
    //已跟进
    public function actionIndexOkDeal($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_deal=1');
        $criteria->condition=get_like('is_deal=2','code,type,title',$keywords,'');//把上面那行注释掉就可以实现查询功能，is_deal是条件，这里的code、type、title是作为查询的关键字
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexOkDeal', $data);
    }
    //跟进界面
    public function actionIndexDeal($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_deal=1');
        $criteria->condition=get_like('is_deal=1','code,type,title',$keywords,'');//把上面那行注释掉就可以实现查询功能，is_deal是条件，这里的code、type、title是作为查询的关键字
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexDeal', $data);
    }
    //待处理完成页面
    public function actionIndexPenFinish($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_finish=1');
        $criteria->condition=get_like('is_finish=1','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexPenFinish', $data);
    }
    //已处理完成页面
    public function actionIndexOkFinish($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_finish=1');
        $criteria->condition=get_like('is_finish=2','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexOkFinish', $data);
    }
    //处理
    public function actionIndexFinish($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_finish=1');
        $criteria->condition=get_like('is_finish=1','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexFinish', $data);
    }

    //答复页面
    public function actionIndexReply($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        //$criteria->addCondition('is_reply=1');
        $criteria->condition=get_like('is_reply=1','code,type,title',$keywords,'');
        $criteria->order="code";
        $data = array();
        parent::_list($model, $criteria, 'indexReply', $data);
    }

    //提交预览
    public function actionPreview($id = '')
    {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('preview', $data);
    }

    //审核预览
    public function actionPreviewJudge($id = '')
    {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('previewJudge', $data);
    }
    //指派预览
    public function actionPreviewAssign($id = '')
    {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('previewAssign', $data);
    }
    //跟进预览
    public function actionPreviewDeal($id = '')
    {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('previewDeal', $data);
    }
    //完成情况预览
    public function actionPreviewFinish($id = '')
    {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('previewFinish', $data);
    }
    //答复预览
    public function actionPreviewReply($id = '')
    {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('previewReply', $data);
    }
}

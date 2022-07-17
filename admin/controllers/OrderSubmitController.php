<?php
class OrderSubmitController extends BaseController {

   protected $model = '';
   public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
    }
  public function actionDelete($id) {
      parent::_clear($id,'','id');
    }
    
  public function actionCreate() {   
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
           $data['model'] = $model;
           $this->render('update', $data);
        } else {
           
           $submitType = $_POST['submitType'];
          $model->submitTime = date('Y-m-d H:i:s', time());
          if($submitType == 'baocun'){
            $model->is_write = 0;
            $model->is_judge = 0;
            $model->workState = '审核未通过';
          }
          else{
            $model->is_order = 0;
            $model->is_judge = 1;
            $model->workState = '审核通过';
          }


           $this-> saveData($model,$_POST[$modelName]);
        }
    }/*曾老师保留部份，---结束*/
  
    



   function saveData($model,$post) {
       $model->attributes =$post;
       show_status($model->save(),'保存成功', get_cookie('_currentUrl_'),'保存失败');  
    }

    public function actionIndex($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_write=1');
        $criteria->condition=get_like('is_write=1','',$keywords,'');
        $criteria->order="id";//areaCode,areaName
        $data = array();
        parent::_list($model, $criteria, 'index', $data);
    }

    public function actionIndexJudge($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_judge=1');
        $criteria->condition=get_like('is_judge=1','code,type,submit_time,phone,content,subpic,niming,huifang,time,workstate',$keywords,'');
        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudge', $data);
    }



}

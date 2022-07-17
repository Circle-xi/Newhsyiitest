<?php
class proposalController extends BaseController {

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
        // $model->suggestion = "/";

  if (!Yii::app()->request->isPostRequest) {
   $data = array();
   $data['model'] = $model;
   $this->render('update', $data);
 } else {

  $submitType = $_POST['submitType'];
  $model->last_modified_time = date('Y-m-d H:i:s', time());
  $model->submit_time = date('Y-m-d H:i:s', time());
  if($submitType == 'baocun'){
    $model->is_order = 1;
    $model->is_judge = 3;  //3表示未提交
    
    $model->is_search = 0;
    $model->is_allocation = 0;
    $model->is_progress = 0;
    $model->workstate = '未提交';
  }
  else{
    $model->is_order = 0;
    $model->is_judge = 2;  //2表示未审核，但未知T还是F
    
    $model->is_search = 0;
    $model->is_allocation = 0;
    $model->is_progress = 0;
    $model->workstate = '已提交未审核';
  }
  $this-> saveData($model,$_POST[$modelName]);
}
}/*曾老师保留部份，---结束*/

// public function actionUpdateJudge($id=0) {
//         $modelName = $this->model;
//         $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
//         if (!Yii::app()->request->isPostRequest) {
//            $data = array();
//            $data['model'] = $model;
//            $this->render('updateJudge', $data);
//         } else {
//           $submitType = $_POST['submitType'];
//           $model->judge_time = date('Y-m-d H:i:s', time()+8*60*60);
//           if($submitType == 'baocun'){
//             $model->is_order = 0;
//             $model->is_judge = 0;
//             $model->is_search = 1;
//             $model->is_allocation = 0;
//             $model->is_progress = 0;
//             $model->workstate = '审核未通过，不予立项';
//           }
//           else{
//             $model->is_order = 0;
//             $model->is_judge = 0;
//             $model->is_search = 1;
//             $model->is_allocation = 1;
//             $model->is_progress = 0;
//             $model->workstate = '审核通过，准予立项';
//           }
//           $this-> saveData($model,$_POST[$modelName]);
//         }
//     }

public function actionUpdateAllocation($id=0) {
  $modelName = $this->model;
  $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
  if (!Yii::app()->request->isPostRequest) {
   $data = array();
   $data['model'] = $model;
   $this->render('updateAllocation', $data);
 } else {
  $submitType = $_POST['submitType'];
  $model->judge_time = date('Y-m-d H:i:s', time());
  if($submitType == 'baocun'){
    $model->is_order = 0;
    $model->is_judge = 0;
    $model->is_search = 1;
    $model->is_allocation = 0;
    $model->is_progress = 1;
    $model->workstate = '议案已交办';
  }
  else{

  }
  $this-> saveData($model,$_POST[$modelName]);
}
}

public function actionUpdateProgress($id=0) {
  $modelName = $this->model;
  $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
  if (!Yii::app()->request->isPostRequest) {
   $data = array();
   $data['model'] = $model;
   $this->render('updateProgress', $data);
 } else {
          // $submitType = $_POST['submitType'];
          // $model->judge_time = date('Y-m-d H:i:s', time()+8*60*60);
  if($submitType == 'baocun'){
    $model->is_order = 0;
    $model->is_judge = 0;
    $model->is_search = 1;
    $model->is_allocation = 0;
    $model->is_progress = 1;
    $model->workstate = '议案已交办';
  }
  else{

  }
  $this-> saveData($model,$_POST[$modelName]);
}
}


      //仿照动作对应到display
    //   public function actionDisplay($id=0) {
    //     $modelName = $this->model;
    //     $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
    //     if (!Yii::app()->request->isPostRequest) {
    //        $data = array();
    //        $data['model'] = $model;
    //        $this->render('display', $data);
    //     } else {
    //        $this-> saveData($model,$_POST[$modelName]);
    //     }
    // }





function saveData($model,$post) {
 $model->attributes =$post;
 show_status($model->save(false),'保存成功', get_cookie('_currentUrl_'),'保存失败');  
}

// public function actionIndex( $keywords = '') {
//         set_cookie('_currentUrl_', Yii::app()->request->url);
//         $modelName = $this->model;
//         $model = $modelName::model();
//         $criteria = new CDbCriteria;
//         $criteria->addCondition('is_order=1');
//         $criteria->condition=get_like('is_order=1','',$keywords,'');
//         $criteria->order="id";//areaCode,areaName

//         $data = array();
//         parent::display($this->model, $criteria, 'index', $data);
//     }

public function actionIndex( $type = '', $keywords = '') {
  $criteria = new CDbCriteria;
  $criteria->addCondition('is_order=1');
        // $criteria->condition=get_like('is_order=1','',$keywords,'');
        // $criteria->condition=get_like('is_order=1','code,type,workstate,content,proposl_type',$keywords);//get_where
  $criteria->condition = get_like('1', 'proposal_type', $type);
  $criteria->condition=get_like('is_order=1','code,type,workstate,content',$keywords);
        $criteria->order="code";//areaCode,areaName
        $data = array();
        parent::display($this->model, $criteria, 'index', $data);
      }

      public function actionPreview1($id = '')
      {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('preview1', $data);
      }

      public function actionPreview2($id = '')
      {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('preview2', $data);
      }

      public function actionPreview3($id = '')
      {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('preview3', $data);
      }

      public function actionPreview4($id = '')
      {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        $data['model'] = $model;
        $this->render('preview4', $data);
      }

      public function actionIndexJudge($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_judge=1' AND 'is_judge=0');
        $criteria->condition=get_like('is_judge=1' AND 'is_judge=0','code,type,workstate,content',$keywords);

 $nowtime = date('Y-m-d', time());
 $criteria->condition=get_where($criteria->condition,1,'judge_time=', $nowtime,'"');

        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudge', $data);
      }

//审核通过的界面
      public function actionIndexJudgeT($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_judge=1');
        $criteria->condition=get_like('is_judge=1','code,type,workstate,content',$keywords);
        
 $nowtime = date('Y-m-d', time());
 $criteria->condition=get_where($criteria->condition,1,'judge_time=', $nowtime,'"');


        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudgeT', $data);
      }

//审核不通过的界面
      public function actionIndexJudgeF($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_judge=0');
        $criteria->condition=get_like('is_judge=0','code,type,workstate,content',$keywords);
        
 $nowtime = date('Y-m-d', time());
 $criteria->condition=get_where($criteria->condition,1,'judge_time=', $nowtime,'"');


        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexJudgeF', $data);
      }

            public function actionIndexUnJudge($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_judge=2');
        $criteria->condition=get_like('is_judge=2','code,type,workstate,content',$keywords);

        $criteria->order="id";
        $data = array();
        parent::_list($model, $criteria, 'indexUnJudge', $data);
      }


      public function actionIndexSearch($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_search=1');
        $criteria->condition=get_like('is_search=1',$keywords,'');
        $criteria->order="id";//areaCode,areaName
        $data = array();
        parent::_list($model, $criteria, 'indexSearch', $data);
      }

      public function actionIndexAllocation($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_allocation=1');
        $criteria->condition=get_like('is_allocation=1',$keywords,'');
        $criteria->order="id";//areaCode,areaName
        $data = array();
        parent::_list($model, $criteria, 'indexAllocation', $data);
      }

      public function actionIndexProgress($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_progress=1');
        $criteria->condition=get_like('is_progress=1',$keywords,'');
        $criteria->order="id";//areaCode,areaName
        $data = array();
        parent::_list($model, $criteria, 'indexProgress', $data);
      }

public function actionUpdateJudge($id=0) {
        $modelName = $this->model;
        $model = ($id==0) ? new $modelName('create') : $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
           $data = array();
           $data['model'] = $model;
           $this->render('updateJudge', $data);
        } else {
          $submitType = $_POST['submitType'];
          $model->judge_time = date('Y-m-d H:i:s', time());
          if($submitType == 'baocun'){
            $model->is_order = 0;
            $model->is_judge = 0;
            $model->is_search = 1;
            $model->is_allocation = 0;
            $model->is_progress = 0;
            $model->workstate = '审核未通过，不予立项';
          }
          else{
           $model->is_order = 0;
            $model->is_judge = 1;
            $model->is_search = 1;
            $model->is_allocation = 1;
            $model->is_progress = 0;
            $model->workstate = '审核通过，准予立项';
          }
          $this-> saveData($model,$_POST[$modelName]);
        }
    }
      public function actionUpdateContinueJudge() {

        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model=proposal::model()->find('is_judge=2');
        
        if(isset($model))
        {
          $id=proposal::model()->find('is_judge=2')->id;
          $model = $this->loadModel($id, $modelName);


          $proposal=proposal::model()->find('id='.$id);
          if (!Yii::app()->request->isPostRequest) {
           $data = array();
           $data['model'] = $model;
            
           $this->render('updateJudge', $data);

         } else { 
          $model->judge_time = date('Y-m-d H:i:s', time());
          $submitType = $_POST['submitType'];
          if($submitType == 'baocun'){
            $model->is_order = 0;
            $model->is_judge = 0;
            // $model->is_judge_show = 0;
            $model->is_search = 1;
            $model->is_allocation = 0;
            $model->is_progress = 0;
            $model->workstate = '审核未通过，不予立项';
          }
          else{
            $model->is_order = 0;
            $model->is_judge = 1;
            // $model->is_judge_show = 1;
            $model->is_search = 1;
            $model->is_allocation = 1;
            $model->is_progress = 0;
            $model->workstate = '审核通过，准予立项';
          }
          $this-> saveData($model,$_POST[$modelName]);
          
        }
      }
      else
      {
        $msg="已经没有可以继续审核的议案";
        echo $msg;
      }
    }


    //已上线页面
// public function actionIndexShowing($keywords = '',$type = '') {
//     set_cookie('_currentUrl_', Yii::app()->request->url);
//     $modelName = $this->model;
//     $model = $modelName::model();
//     $criteria = new CDbCriteria;

//     $nowTime = date('Y-m-d H:i:s', time()+8*60*60);
//     $criteria->addCondition('is_wait=1 AND is_showing=1');
//     $criteria->condition=get_where($criteria->condition,1,'up_time<=',$nowTime,'"');
//     $criteria->condition=get_where($criteria->condition,1,'down_time>=',$nowTime,'"');
//     $criteria->condition = get_like($criteria->condition, 'type', $type);
//     $criteria->condition=get_like($criteria->condition,'title',$keywords,'');
//     $criteria->order="judge_time";
//     $data = array();
//     parent::_list($model, $criteria, 'indexShowing', $data);
// }
// 
// //已审核页面

}

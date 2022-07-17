<?php
$config = require(ROOT_PATH . "/include/config.php");
$params = array_merge($config['params'], array('administrator' => array('admin'),));
$st="";

    $params['roleItem'] = array(
    /*array(
     '意向入驻管理',
        array(
            'award_index41' => array('添加入驻', 'MerchantIntention/index'),
            'award_index42' => array('课程名稱', 'course/index'),
       ),
      ),
     /*array( 
     '商家认证管理',
        array(
            'award_index41' => array('添加认证', 'MerchantCertified/index'),
            'award_index42' => array('商家审核', 'MerchantAudit/index'),
            'award_index43' => array('审核未通过列表', 'MerchantAudit/unaudit'),
       ),
      ),
    array(
     '账号管理',
        array(
            'award_index41' => array('商家认证', 'MerchantCertified/index'),
       ),
      )*/
     /*array(
     '公众投诉',
        array(
            'award_index43' => array('提交投诉', 'PersonTijiao/index'),
            'award_index44' => array('审核情况', 'PersonShenhe/index'),
            'award_index45' => array('反馈情况', 'PersonFankui/index'),
       ),
      ), 
     array(
     '人大管理部门',
        array(
            'award_index46' => array('接收受理', 'RendaReceive/index'),
            'award_index47' => array('指派跟进', 'RendaAssign/index'),
            'award_index48' => array('工作监督意见', 'RendaJiandu/index'),
       ),
      ), 
     array(
     '职能部门',
        array(
            'award_index49' => array('跟进处理', 'BumenDeal/index'),
       ),
      ), 
     /*array(
     'Text',
        array(
            'award_index50' => array('提交', 'TousuSubmit/index'),
            'award_index51' => array('审核', 'TousuSubmit/indexJudge'),
            'award_index52' => array('接收受理', 'TousuSubmit/indexShouli'),

       ),
      ), */
     array(
     '社情民意',
        array(
            'award_index53' => array('建议提交', 'Advise/index'),
            'award_index54' => array('已提交', 'Advise/indexOkSubmit'),
             'award_index55' => array('答复情况', 'Advise/indexReply'),
       ),
      ), 
     array(
     '人大管理部门',
        array(
           // 'award_index66' => array('建议总览', 'Advise/indexJudge0'),
            'award_index56' => array('待审核', 'Advise/indexPenJudge'),
            'award_index57' => array('已审核', 'Advise/indexOKJudge'),
            'award_index58' => array('开始审核', 'Advise/indexJudge'),
            'award_index59' => array('审核通过', 'Advise/indexJudgePass'),
            'award_index60' => array('审核不通过', 'Advise/indexJudgeFail'),
            // 'award_index58' => array('社情民意答复', 'Advise/indexReply'),
            
       ),
      ), 
     array(
     '人大管理部门',
        array(
            'award_index61' => array('待指派', 'Advise/indexPenAssign'),
            'award_index62' => array('指派处理', 'Advise/indexAssign'),
            'award_index63' => array('指派完成', 'Advise/indexOkAssign'),
            
       ),
      ), 
     array(
     '职能部门',
        array(
            'award_index69' => array('待跟进', 'Advise/indexPenDeal'),
            'award_index70' => array('跟进处理', 'Advise/indexDeal'),
            'award_index64' => array('已跟进', 'Advise/indexOkDeal'),
            'award_index71' => array('待处理', 'Advise/indexPenFinish'),
            'award_index72' => array('已处理完成', 'Advise/indexOkFinish'),
            'award_index65' => array('处理工作', 'Advise/indexFinish'),
            
       ),
      ),
     array(
     '系统维护',
        array(
            'award_index66' => array('建议类型', 'Advise_type/index'),
            'award_index67' => array('进度状态', 'Advise_status/index'),
            'award_index68' => array('承办部门', 'ApartmentType/index'),

       ),
      ), 
    /*array(
        '议案',
       array(
            'award_index46' => array('议案提交', 'proposal/index'),
            'award_index47' => array('议案审核', 'proposal/indexJudge'),
            'award_index53' => array('议案审核通过的', 'proposal/indexJudgeT'),
            'award_index51' => array('议案审核不通过的', 'proposal/indexJudgeF'),
            'award_index52' => array('待审议案', 'proposal/indexUnJudge'),
            'award_index49' => array('议案交办', 'proposal/indexAllocation'),
            'award_index50' => array('议案处理跟进', 'proposal/indexProgress'),
            'award_index48' => array('议案汇总', 'proposal/indexSearch'),
       ),
     ),*/
  );

$main = array(
    'basePath' => ROOT_PATH . '/admin',
    'runtimePath' => ROOT_PATH . '/runtime/admin',
    'name' => '',
    'defaultController' => 'index',
    'components' => array(
        'db' => $config['components']['db'],
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info,error, warning'
                ),
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'trace'
                ),
            ),
        ),
    ),
    'params' => $params,
);

return array_merge($config, $main);
?>

<ul class="sidebar-menu">            
<li class="treeview">               
    <a href="#">                    
        <i class="fa fa-gears"></i> <span>權限控制</span>                    
        <i class="fa fa-angle-left pull-right"></i>               
    </a>               
    <ul class="treeview-menu">                   
        <li class="treeview">                        
            <a href="/admin">管理員</a>                        
            <ul class="treeview-menu">                            
                <li><a href="/user"><i class="fa fa-circle-o"></i> 後臺用戶</a></li>                            
                <li class="treeview">                                
                    <a href="/admin/role"> <i class="fa fa-circle-o"></i> 權限 <i class="fa fa-angle-left pull-right"></i>
                    </a>                                
                    <ul class="treeview-menu">                                    
                        <li><a href="/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>
                        <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 權限</a></li>
                        <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>
                        <li><a href="/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>
                        <li><a href="/admin/menu"><i class="fa fa-circle-o"></i> 菜單</a></li>
                    </ul>                           
                </li>                        
            </ul>                    
        </li>                
    </ul>            
    </li>        
</ul>
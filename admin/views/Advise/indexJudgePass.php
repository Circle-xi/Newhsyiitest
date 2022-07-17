<?php
   $title=array('','审核通过','刷新');
   $schcmd='建议类型=PC:list(Advise_type),关键字=keywords';//session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
   $coumnName='code,type,title,advise_content,judge_time,passjudge_status';//session,time,
   $hw='';//0:5%,1:5%,2:5%,3:5%,4:10%,5:30%,6:5%,6:20%,6:5%';//每列的宽度
   $index=0;//是否显示序号 0 不显示  1 显示//html_entity_decode
   $idName='id';//关键字的属性名称//
   //cmd=内部名称：动作：图片：标题
   $cmd='';//,题目:PisaExamsData/index::题目';//操作的命令
   $data=array($index,$idName,$coumnName,$hw,$cmd);
   hsYii_indexShow($this,$model, $title,$schcmd,$data,$arclist,$pages); 
?>

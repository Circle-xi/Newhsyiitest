
<?php 
   $title=array('当前界面：投诉提交','公众投诉提交管理','添加,刷新,删除,批删除');
   $schcmd='关键字=keyword';
   $coumnName='code,type,content,subpic:pic,niming,huifang,phone,submit_time,workState';
   $hw='';//0:5%,1:5%,2:5%,3:5%,4:10%,5:30%,6:5%,6:20%,6:5%';//每列的宽度
   $index=0;//是否显示序号 0 不显示  1 显示//html_entity_decode
   $idName='id';//关键字的属性名称//
   //cmd=内部名称：动作：图片：标题
   $cmd='编辑:update,删除,提交:';//,题目:PisaExamsData/index::题目';//操作的命令
   $data=array($index,$idName,$coumnName,$hw,$cmd);
   hsYii_indexShow($this,$model, $title,$schcmd,$data,$arclist,$pages); 
?>

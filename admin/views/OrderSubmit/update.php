 <?php  
  $title='投诉提交';
  $inputCmd='1:3=code:1:1;type:list(Type);submit_time:1:1,phone:1:1;content;subpic:pic;niming:YN,huifang:YN;time;workstate;';
  $comstr='保存:baocun,提交工单:OrderSubmit/indexJudge';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>


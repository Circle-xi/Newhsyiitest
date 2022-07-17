 
 <?php  
  $title='公众投诉提交';
  $inputCmd='code:1:1,phone:1:1;type:1:3:list(Type);content:1:3;subpic:pic:1:3;niming:YN,huifang:YN;';
  $comstr='保存:baocun,提交工单:TousuSubmit/indexJudge';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
  
 ?>
 

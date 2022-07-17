
 <?php  
  $title='公众投诉审核';
  $inputCmd='1:3=code:1:1,phone:1:1;type:list(Type);content:1:3;subpic:pic:1:3;niming:YN,huifang:YN;';
  $comstr='保存:baocun,审核通过:TousuSubmit/indexShouli';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 
?>

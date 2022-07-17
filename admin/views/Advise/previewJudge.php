 <?php  
  $title='受理审核';
  $inputCmd='1:3=code:label;submit_time:label;type:label;title:label;advise_content:label';
  $comstr='取消';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);

  // type:1:1::list(party)
 ?>
 

 <?php  
  $title='指派跟进';
  $inputCmd='1:3=code:label;submit_time:label:1:1,judge_time:label:1:1;undertaker:label:1:1,prefinish_time:label:1:1;type:label;title:label;advise_content:label';
  $comstr='取消';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);

  // type:1:1::list(party)
 ?>
 

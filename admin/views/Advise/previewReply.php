 <?php  
  $title='答复详情';
  $inputCmd='1:3=code:label;type:label;title:label;advise_content:label;submit_time:label:1:1,finish_time:label:1:1;undertaker:label;reply_content:label';
  $comstr='取消';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);

  // type:1:1::list(party)
 ?>

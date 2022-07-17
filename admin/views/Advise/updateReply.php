 <?php  
  $title='答复';
  $inputCmd='1:3=code:label:1:1,status:label:1:1;type:label;title:label;advise_content:label;submit_time:label:1:1,finish_time:label:1:1;undertaker:label;reply_content:label;is_confirm:YN;';//session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
  $comstr='保存:baocun';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>
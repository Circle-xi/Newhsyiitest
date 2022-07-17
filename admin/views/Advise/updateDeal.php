 <?php  
  $title='跟进处理';
  $inputCmd='1:3=code:label;submit_time:label:1:1,judge_time:label:1:1;undertaker:label:1:1,prefinish_time:label:1:1;type:label;title:label;advise_content:label;deal_situation:html';
  //session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
  $comstr='保存:baocun,确定跟进处理:indexFinish';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>


 <?php  
  $title='处理情况';
  $inputCmd='1:3=code:label;submit_time:label:1:1,judge_time:label:1:1;undertaker:label;prefinish_time:label;type:label;title:label;advise_content:label;答复:title:4:1;reply_content:html;';
  //session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
  $comstr='保存:baocun,确定完成:Advise/indexReply';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>


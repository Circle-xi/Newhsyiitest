 <?php  
  $title='社情民意提交';
  $inputCmd='1:3=code;title;type:list(Advise_type);advise_content:html';//session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
  $comstr='保存:baocun,提交建议:Advise/indexJudge';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>
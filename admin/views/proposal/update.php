 <?php  
  $title='课程名称';
  $inputCmd='type:list(proposal_type):1:5;title:1:5;content:html:1:5;author:1:1,author_contact:1:3;image:pic:1:5;remark:1:5;';
  $comstr='保存议案草稿:baocun,提交议案:proposal/indexJudge';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);

  // type:1:1::list(party)
 ?>

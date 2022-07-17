 <?php  
  $title='议案交办';
  $inputCmd='type:label:1:2,submit_time:label:1:2;title:label:1:5;content:label:1:5;author:label:1:1,author_contact:label:1:3;countersignature1:label:1:1,countersignature2:label:1:1,countersignature3:label:1:1;countersignature4:label:1:1,countersignature5:label:1:1,countersignature6:label:1:1;image:label:1:5;remark:label:1:5;suggestion:label:1:5;company_name:1:5;company_header:1:2,company_contact:1:2;supervision_company:1:2,supervision_contact:1:2;allocation_remark:1:5;';
  $comstr='确认交办:baocun';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);

  // type:1:1::list(party)
 ?>

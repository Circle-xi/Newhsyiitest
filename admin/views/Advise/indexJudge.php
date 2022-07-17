<?php
   $title=array('人大管理部门','建议审核','刷新,开始审核:updateJudge',);
   $schcmd='建议类型=PC:list(Advise_type),建议状态=PC:list(Advise_status),关键字=keywords';//session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
   $coumnName='code,type,title,advise_content,submit_time,judge_time,penjudge_status';//session,time,
   $hw='';//0:5%,1:5%,2:5%,3:5%,4:10%,5:30%,6:5%,6:20%,6:5%';//每列的宽度
   $index=0;//是否显示序号 0 不显示  1 显示//html_entity_decode
   $idName='id';//关键字的属性名称//
   //cmd=内部名称：动作：图片：标题
   $cmd='详细信息:Advise/previewJudge::详细信息';//编辑:updateJudge,
   //,题目:PisaExamsData/index::题目';//操作的命令
   $data=array($index,$idName,$coumnName,$hw,$cmd);
   hsYii_indexShow($this,$model, $title,$schcmd,$data,$arclist,$pages); 
?>
<script>
    function previewJudge(id) {
        $.dialog.open('<?php echo $this->createUrl("Advise/previewJudge"); ?>&id=' + id, {
            id: 'order',
            lock: true,
            opacity: 0.3,
            title: '预览',
            width: '70%',
            height: '100%',
            close: function() {we.reload();}
        });
    }
</script> 
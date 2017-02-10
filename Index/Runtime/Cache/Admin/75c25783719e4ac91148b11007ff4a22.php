<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章回收站</title>
    <link rel="stylesheet" href="/england/Public/Admin/Css/public.css" type="text/css">
</head>
<body>
<table class="table">
    <tr>
        <th>标题</th>
        <th>作者</th>
        <th>所属分类</th>
        <th>发布时间</th>
        <th>操作</th>
    </tr>
    <!--循环开始-->
    <?php if(is_array($articles)): foreach($articles as $key=>$article): ?><tr>
            <td><?php echo ($article["title"]); ?></td>
            <td><?php echo ($article["author"]); ?></td>
            <td><?php echo ($article["category"]); ?></td>
            <td><?php echo ($article["time"]); ?></td>
            <td><button value="<?php echo ($article["aid"]); ?>" onclick="return sc(this)">回收</button><button>彻底删除</button></td>
        </tr><?php endforeach; endif; ?>
    <!--循环结束-->
</table>
<?php echo ($page); ?>

<script>
    function sc(obj) {
        if(confirm("确定要回收？")){
            window.location.href = "<?php echo U('article/sc');?>" + "?id=" + obj.value;
        }
    }
</script>
</body>
</html>
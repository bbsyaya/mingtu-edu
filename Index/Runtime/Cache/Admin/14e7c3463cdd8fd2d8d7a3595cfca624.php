<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
    <link rel="stylesheet" href="/england/Public/Admin/Css/public.css" type="text/css">
</head>
<body>
<table class="table">
    <tr>
        <th>标题</th>
        <th>作者</th>
        <th>发布时间</th>
        <th>是否显示在主页</th>
        <th>操作</th>
    </tr>
    <!--循环开始-->
    <?php if(is_array($articles)): foreach($articles as $key=>$article): ?><tr>
            <td><?php echo ($article["title"]); ?></td>
            <td><?php echo ($article["author"]); ?></td>
            <td><?php echo ($article["time"]); ?></td>
            <?php if($article["home"] == 0): ?><td>否</td>
                <?php else: ?><td>是</td><?php endif; ?>
            <td>
                <button value="<?php echo ($article["aid"]); ?>" onclick="return xg(this)">修改</button>
                <button value="<?php echo ($article["aid"]); ?>" onclick="return sc(this)">删除</button>
            </td>
        </tr><?php endforeach; endif; ?>
    <!--循环结束-->
</table>
<?php echo ($page); ?>
</body>
<script>
    function sc(obj) {
        if (confirm("确定要删除？")) {
            window.location.href = "<?php echo U('article/sc');?>" + "?id=" + obj.value;
        }
    }
    function xg(obj) {
        window.location.href = "<?php echo U('article/article');?>" + "?id=" + obj.value;
    }
</script>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>img</title>
    <link rel="stylesheet" href="/england/Public/Admin/Css/public.css" type="text/css">
</head>
<body>

<table class="table">
    <tr>
        <th>图片名称</th>
        <th>时间</th>
        <th>点击跳转URL</th>
        <th>类型</th>
        <th>所属</th>
        <th>输出的字</th>
        <th>操作</th>
    </tr>
    <!--循环开始-->
    <?php if(is_array($images)): foreach($images as $key=>$image): ?><tr>
            <td><?php echo ($image["name"]); ?></td>
            <td><?php echo ($image["datetime"]); ?></td>
            <td><?php echo ($image["url"]); ?></td>
            <?php if($image["type"] == 0): ?><td>滚图</td>
                <?php else: ?>
                <td>友情链接</td><?php endif; ?>
            <?php if($image["en"] == 0): ?><td>中文版</td>
                <?php else: ?>
                <td>英文版</td><?php endif; ?>
            <td><?php echo ($image["information"]); ?></td>
            <td><button value="<?php echo ($image["id"]); ?>" onclick="return xg(this)">修改</button>
                <button value="<?php echo ($image["id"]); ?>" onclick="return sc(this)">删除</button></td>
        </tr><?php endforeach; endif; ?>
    <!--循环结束-->
</table>

<script>
    function sc(obj) {
        if (confirm("确定要删除？")) {
            window.location.href = "<?php echo U('img/sc');?>" + "?id=" + obj.value;
        }
    }
    function xg(obj) {
        window.location.href = "<?php echo U('img/index');?>" + "?id=" + obj.value;
    }
</script>
</body>
</html>
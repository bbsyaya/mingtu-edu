<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言列表</title>
    <link rel="stylesheet" href="/england/Public/Admin/Css/public.css" type="text/css">
</head>
<body>
<h4 style="font-size: 30px">留言板</h4>
<table class="table">
    <tr>
        <th>姓名</th>
        <th>邮箱</th>
        <th>微信或者QQ</th>
        <th>意向</th>
        <th>推荐人或者机构</th>
        <th>资讯内容</th>
    </tr>
    <!--循环开始-->
    <?php if(is_array($messages)): foreach($messages as $key=>$message): ?><tr>
            <td><?php echo ($message["name"]); ?></td>
            <td><?php echo ($message["email"]); ?></td>
            <td><?php echo ($message["wq"]); ?></td>
            <td><?php echo ($message["idea"]); ?></td>
            <td><?php echo ($message["who"]); ?></td>
            <td><?php echo ($message["message"]); ?></td>
        </tr><?php endforeach; endif; ?>
    <!--循环结束-->
</table>
<?php echo ($page); ?>
</body>
</html>
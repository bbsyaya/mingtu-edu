<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
</head>
<body>
<form action="<?php echo U('home/home_add');?>" method="post">

    <input type="hidden" name="type" value="-1">
    <table class="table">
        <tr>
            <th style="text-align: center">
                首页以及联系方式设置
            </th>
        </tr>
        <tr>
            <th style="text-align: center">
                <label for="name">名称:</label>
                <input id="name" type="text" class="name" name="name" value="<?php echo ($home["name"]); ?>">
            </th>
        </tr>
        <tr>
            <td align="center">
                <label for="introduction">网站简介（显示在滚图下边的蓝色区域）：</label>
                <br>
                <textarea style="width: 300px;height: 100px" id="introduction" name="introduction"><?php echo ($home["introduction"]); ?></textarea>
            </td>
        </tr>
        <tr>
            <td align="center">
                <label for="category">首页最下边一行内容所属的分类：</label>
                <select name="category" id="category">
                    <?php if(is_array($categories)): foreach($categories as $key=>$category): if($category["id"] == $home['category']): ?><option value="<?php echo ($category["id"]); ?>" selected><?php echo ($category["categoryname"]); ?></option>
                            <?php else: ?>
                        <option value="<?php echo ($category["id"]); ?>"><?php echo ($category["categoryname"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center">
                <label for="information">右侧的联系方式（格式是这样的否则会保存失败 qq-132132+微信-rfer+地址-afasf）：</label>
                <br>
                <textarea style="width: 300px;height: 100px" id="information" name="information"><?php echo ($home["information"]); ?></textarea>
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" value="保存">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
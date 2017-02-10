<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <link rel="stylesheet" href="/england/Public/Admin/Css/public.css" type="text/css">
</head>
<body>
<table>
    <tr>
        <th>分类名称</th>
        <th>分类类型</th>
        <th>排序</th>
        <th>url</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($categories)): foreach($categories as $key=>$category): ?><tr>
            <td><input type="text" id="name_<?php echo ($category["id"]); ?>" value="<?php echo ($category["categoryname"]); ?>"></td>
            <td>
                <?php if($category["type"] == 0): ?>一级中文菜单 <input type="hidden" id="type_<?php echo ($category["id"]); ?>" value="<?php echo ($category["type"]); ?>">
                    <?php else: if($category["type"] == -1): ?>一级英文菜单 <input type="hidden" id="type_<?php echo ($category["id"]); ?>" value="<?php echo ($category["type"]); ?>">
                    <?php else: ?>
                    <select name="type" id="type_<?php echo ($category["id"]); ?>">
                        <?php if(is_array($categoriesAll)): foreach($categoriesAll as $key=>$categoryAll): if($category["type"] == $categoryAll['id']): ?><option value="<?php echo ($categoryAll["id"]); ?>" selected><?php echo ($categoryAll["categoryname"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($categoryAll["id"]); ?>"><?php echo ($categoryAll["categoryname"]); ?></option><?php endif; endforeach; endif; ?>
                    </select><?php endif; endif; ?>
            </td>
            <td><input type="text" name="ord" value="<?php echo ($category["ord"]); ?>" id="ord_<?php echo ($category["id"]); ?>"></td>
            <td><input type="text" name="url" value="<?php echo ($category["url"]); ?>" id="url_<?php echo ($category["id"]); ?>"></td>
            <td>
                <button value="<?php echo ($category["id"]); ?>" onclick="return bc(this)">保存</button>
                <button value="<?php echo ($category["id"]); ?>" onclick="return sc(this)">删除</button>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<script>
    function bc(obj) {
        if (confirm("确认提交?")) {
            var type = document.getElementById("type_" + obj.value.toString()).value;
            var ord = document.getElementById("ord_" + obj.value.toString()).value;
            var url = document.getElementById("url_" + obj.value.toString()).value;
            var name = document.getElementById("name_" + obj.value.toString()).value;
            window.location.href =
                    "<?php echo U('category/update');?>"
                    + "?id="
                    + obj.value
                    + "&type="
                    + type
                    + "&ord="
                    + ord
                    + "&url="
                    + url
                    + "&name="
                    + name;
        }
    }
    function sc(obj) {
        if (confirm("确认删除?,同时将删除其下所属的子菜单以及文章，请慎重！！！")) {
            window.location.href =
                    "<?php echo U('category/sc');?>"
                    + "?id="
                    + obj.value;
        }
    }
</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/england/Public/js/jquery.min.js"></script>
</head>
<body>
<h4>添加或修改图片设置(请先上传图片)</h4>
<div>
    <label for="imgurl">图片链接(点击上传后)</label>
    <input type="hidden" name="imgurl" id="imgurl" value="<?php echo ($image["imgurl"]); ?>"><br>
    预览图：
    <img src="<?php echo ($image["imgurl"]); ?>" alt="" style="width: 300px;height: 300px;">
    <form action="<?php echo U('img/upload');?>" enctype="multipart/form-data" method="post">
        <input type="file" name="photo"/>
        <input id="imgsub" type="submit" value="上传">
    </form>
    <input type="hidden" id="id" name="id" value="<?php echo ($image["id"]); ?>">
    <label for="name">名称:</label>
    <input type="text" name="name" value="<?php echo ($image["name"]); ?>" id="name"><br>
    <label for="url">跳转链接:</label>
    <input type="text" name="url" id="url" value="<?php echo ($image["url"]); ?>"><br>

    <label for="datetime">时间：（用来排序的）</label>
    <input name="datetime" type="text" value="<?php echo ($image["datetime"]); ?>" style="padding-left:5px;" id="datetime"
           onclick="SetDate(this,'yyyy-MM-dd hh:mm:ss')" readonly="readonly"/><br>
    <label for="type">类型:</label>
    <select name="type" id="type">
        <option value="0" selected>滚图</option>
        <option value="1">友情链接</option>
    </select><br>
    <label for="en">属于:</label>
    <select name="en" id="en">
        <option value="0" selected>中文版</option>
        <option value="1">英文版</option>
    </select><br>
    <label for="information">图片信息(用来在图片上显示字等)</label><br>
    <textarea name="information" id="information" cols="30" rows="10"></textarea><br>

    <div id="btns">
        <table>
            <tr>
                <td>
                    <button class="btn" onclick="return tj();">
                        保存
                    </button>
                </td>
            </tr>

        </table>
    </div>
</div>
<script>
    function tj() {
        var id = $("#id").val();
        var name = $("#name").val();
        var datetime = $("#datetime").val();
        var type = $("#type").val();
        var information = $("#information").val();
        var url = $("#url").val();
        var imgurl = $("#imgurl").val();
        var en = $("#en").val();
        if (!(id && name && datetime && type && information && imgurl && en)) {
            alert('请把内容补充完整');
            return false;
        }
        $.post("<?php echo U('img/tj');?>", {
            'id': id,
            'name': name,
            'datetime': datetime,
            'type': type,
            'url': url,
            'imgurl': imgurl,
            'information': information,
            'en': en
        }, function (data) {
            alert(data.message);
            flag = data.status;
            if (en = 0) {
                window.location.href = "<?php echo U('EHome/img');?>";
            } else {
                window.location.href = "<?php echo U('Home/img');?>";
            }
        }, 'json');
    }
</script>
<script src="/england/Public/Admin/js/calendar.js" type="text/javascript" language="javascript"></script>
</body>
</html>
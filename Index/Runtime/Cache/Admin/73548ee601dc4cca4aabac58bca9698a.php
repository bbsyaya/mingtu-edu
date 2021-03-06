<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>添加文章</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/england/Public/bjq/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/england/Public/bjq/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/england/Public/bjq/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/england/Public/bjq/umeditor.min.js"></script>
    <script type="text/javascript" src="/england/Public/bjq/lang/zh-cn/zh-cn.js"></script>
    <style type="text/css">
        h1 {
            font-family: "微软雅黑";
            font-weight: normal;
        }

        .btn {
            display: inline-block;
            *display: inline;
            padding: 4px 12px;
            margin-bottom: 0;
            *margin-left: .3em;
            font-size: 14px;
            line-height: 20px;
            color: #333333;
            text-align: center;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            vertical-align: middle;
            cursor: pointer;
            background-color: #f5f5f5;
            *background-color: #e6e6e6;
            background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
            background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            border: 1px solid #cccccc;
            *border: 0;
            border-color: #e6e6e6 #e6e6e6 #bfbfbf;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            border-bottom-color: #b3b3b3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            *zoom: 1;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn:hover,
        .btn:focus,
        .btn:active,
        .btn.active,
        .btn.disabled,
        .btn[disabled] {
            color: #333333;
            background-color: #e6e6e6;
            *background-color: #d9d9d9;
        }

        .btn:active,
        .btn.active {
            background-color: #cccccc \9;
        }

        .btn:first-child {
            *margin-left: 0;
        }

        .btn:hover,
        .btn:focus {
            color: #333333;
            text-decoration: none;
            background-position: 0 -15px;
            -webkit-transition: background-position 0.1s linear;
            -moz-transition: background-position 0.1s linear;
            -o-transition: background-position 0.1s linear;
            transition: background-position 0.1s linear;
        }

        .btn:focus {
            outline: thin dotted #333;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .btn.active,
        .btn:active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn.disabled,
        .btn[disabled] {
            cursor: default;
            background-image: none;
            opacity: 0.65;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
<h1>添加或者修改文章</h1>
<div>
    <input id="aid" name="id" type="hidden" value="<?php echo ($article["aid"]); ?>">
    <label for="title">标题:</label>
    <input type="text" id="title" name="title" value="<?php echo ($article["title"]); ?>">
    <br>
    <label for="abstract">摘要:</label>
    <button onclick="tqzy()">提取摘要</button>
    <br>
    <textarea style="width: 400px; height: 50px;" id="abstract" name="abstract"><?php echo ($article["abstract"]); ?></textarea>
    <br>
    <label for="home">是否首页显示:</label>
    <select name="home" id="home">
        <?php if($article["home"] == 1): ?><option value="1" selected>是</option>
            <option value="0">否</option>
            <?php else: ?>
            <option value="1">是</option>
            <option value="0" selected>否</option><?php endif; ?>
    </select>
    <br>
    <label for="category">所属分类:</label>
    <select name="category" id="category">
        <option value=""> &nbsp;</option>
        <?php if(is_array($categories)): foreach($categories as $key=>$category): if($category["id"] == $article['category']): ?><option value="<?php echo ($category["id"]); ?>" selected><?php echo ($category["categoryname"]); ?></option>
                <?php else: ?>
                <option value="<?php echo ($category["id"]); ?>"><?php echo ($category["categoryname"]); ?></option><?php endif; endforeach; endif; ?>
    </select>
    <br>
    <label for="datetime">日期:</label>
    <input name="datetime" type="text" value="<?php echo ($article["time"]); ?>" style="padding-left:5px;" id="datetime"
           onclick="SetDate(this,'yyyy-MM-dd hh:mm:ss')" readonly="readonly"/><br>
    <select name="cover" id="cover" onchange="tp()">
        <option value="<?php echo DEFAULT_HOME.'/Public/default.jpg';?>" selected>
            默认
        </option>
    </select>
    <button onclick="tqimg()">获取文章内图片选择并作为封面</button>
    <br>
    <img id="covertp" style="width: 200px; height: 200px;" src="<?php echo ($article["cover"]); ?>" alt="">
</div>
<!--style给定宽度可以影响编辑器的最终宽度-->
<script type="text/plain" id="myEditor" style="width:1000px;height:240px;">
</script>


<div class="clear"></div>
<div id="btns">
    <table>
        <tr>
            <td>
                <button class="btn" onclick="tj()">
                    保存
                </button>
            </td>
        </tr>

    </table>
</div>
<div>
    <h3 id="focush2"></h3>
</div>
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('blur', function () {
        $('#focush2').html('编辑器失去焦点了')
    });
    um.addListener('focus', function () {
        $('#focush2').html('')
    });
    //按钮的操作
    function insertHtml() {
        var value = prompt('插入html代码', '');
        um.execCommand('insertHtml', value)
    }
    function isFocus() {
        alert(um.isFocus())
    }
    function doBlur() {
        um.blur()
    }
    function createEditor() {
        enableBtn();
        um = UM.getEditor('myEditor');
    }
    function getAllHtml() {
        alert(UM.getEditor('myEditor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push(UM.getEditor('myEditor').getContent());
        return arr.join();
    }
    function setContent(isAppendTo) {
        var arr = [];
        UM.getEditor('myEditor').setContent(isAppendTo);
    }
    function getPlainTxt() {
        var arr = [];
        arr.push(UM.getEditor('myEditor').getPlainTxt());
        return arr.join();
    }
</script>
<!--<script src="/england/Public/js/jquery.min.js"></script>-->
<script>
    var flag = 0;
    function tj() {
        var information = getContent();
        var id = document.getElementById('aid').value;
        var title = document.getElementById('title').value;
        var datetime = document.getElementById('datetime').value;
        var cover = document.getElementById('cover').value;
        var category = document.getElementById('category').value;
        var abstract = document.getElementById('abstract').value;
        var home = document.getElementById('home').value;
        var postUrl = "<?php echo U('article/update');?>";
        if (!(title && datetime && cover && category && abstract && home)) {
            alert('请把信息填写完整');
            return;
        }
        $.post(postUrl, {
            'id': id,
            'title': title,
            'time': datetime,
            'cover': cover,
            'category': category,
            'abstract': abstract,
            'information': information,
            'home': home
        }, function (data) {
            alert(data.message);
            flag = data.status;
            window.location.href = "<?php echo U('article/index');?>"
        });
    }
    window.onbeforeunload = function () {
        if(flag == 0)
            return "您的文章尚未保存！";
    };
    function tqzy() {
        tzy = getPlainTxt();
        tzy = tzy.replace(/<img[^>]+>/g, '');
        tzy = tzy.substr(0, 256);
        document.getElementById('abstract').value = tzy;
    }
    function tqimg() {
        var imgs = document.getElementById('myEditor').getElementsByTagName('img');
        var s = document.getElementById('cover');
        for (i = 0; i < imgs.length; i++) {
            s.options.add(new Option('图片' + (i + 1), imgs[i].src));
        }
    }
    function tp() {
        tpsrc = document.getElementById('cover').value;
        document.getElementById('covertp').src = tpsrc;
    }

    setContent('<?php echo ($article["information"]); ?>');

</script>
<script src="/england/Public/Admin/js/calendar.js" type="text/javascript" language="javascript"></script>
</body>
</html>
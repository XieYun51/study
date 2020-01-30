<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/28
 * Time: 11:51
 */


include  "../../../includes/db.info.php";
include  "../../../includes/db.inc.php";

$res = select_db("off_comment","*","id='{$_GET['id']}'");
$dat = mysqli_fetch_array($res);


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../../../layui/css/layui.css" />
    <script type="text/javascript" src="../../../layui/layui.js">
    </script>
    <style type="text/css">
        button a,button a:hover{
            color: white;
        }


        td,th{
            text-align: center !important;
        }
        input{
            outline: none !important;
            border: none !important;
            height: 100%;
            width: 100%;
            text-align: center;
            background: none !important;
        }

        @media(min-width:1000px ) {
            table{
                width: 80% !important;
            }
        }

        caption{
            position: relative;
            top: -5px;
        }
        caption:hover{
            cursor: pointer;
        }

    </style>

</head>
<body>

<center>
    <form class="layui-form" method="post" action="dealModifyComm.php">
        <table class="layui-table">
            <caption>
                教学评价内容编辑
            </caption>

            <tr>
                <td>优秀</td>
                <td>
                    <input type="text" name="A"  value="<?php echo $dat['com_A'];?>" class="layui-input-inline">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                </td>
                <td>良好</td>
                <td>
                    <input type="text" name="B"  value="<?php echo $dat['com_B'];?>" class="layui-input-inline">
                </td>
                <td>中等</td>
                <td>
                    <input type="text" name="C"  value="<?php echo $dat['com_C'];?>" class="layui-input-inline">

                </td>
                <td>及格</td>
                <td>
                    <input type="text" name="D"  value="<?php echo $dat['com_D'];?>" class="layui-input-inline">

                </td>
                <td>差等</td>
                <td>
                    <input type="text" name="E"  value="<?php echo $dat['com_E'];?>" class="layui-input-inline">

                </td>
            </tr>
            <tr>
                <td>分组</td>
                <td>
                    <input type="text" name="group"  value="<?php echo $dat['com_group'];?>" class="layui-input-inline">

                </td>
                <td colspan="2">评价内容及说明</td>
                <td colspan="6">
                    <input type="text" name="explain"  value="<?php echo $dat['com_explain'];?>" class="layui-input-inline">
                </td>

            </tr>

            <tr>
                <td colspan="10">
                    <button  class="layui-btn layui-btn-danger layui-btn-sm" onclick="return confirm('确认修改评价信息')" lay-submit>提交</button>
                </td>
            </tr>


        </table>
    </form>
</center>
<script type="text/javascript">
    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.jquery;

    });

</script>
</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/28
 * Time: 16:06
 */




include  "../../../includes/db.info.php";
include  "../../../includes/db.inc.php";

$res = select_db("off_student","*","stu_num='{$_GET['num']}'");
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
        select,input,textarea{
            outline: none !important;
            border: none !important;
            height: 100%;
            width: 100%;
            text-align: center;
            background: none !important;
        }
        textarea{
            resize: none !important;
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
    <form class="layui-form" method="post" action="dealModifyAssist.php">
        <table class="layui-table">
            <caption>
                学生详细信息编辑查看
            </caption>

            <tr>
                <td>学号</td>
                <td>
                    <?php echo $_GET['num'];?>
                    <input type="hidden" name="modCode" value="<?php echo $_GET['num'];?>">
                </td>
                <td>姓名</td>
                <td>
                    <input type="text" name="name"  value="<?php echo $dat['stu_name'];?>" class="layui-input-inline">
                </td>
                <td>性别</td>
                <td>
                    <input type="text" name="sex"  value="<?php echo $dat['stu_sex'];?>" class="layui-input-inline">

                </td>
            </tr>
            <tr>

                <td>民族</td>
                <td>
                    <input type="text" name="nation"  value="<?php echo $dat['stu_nation'];?>" class="layui-input-inline">
                </td>
                <td>身份证号</td>
                <td>
                    <input type="text" name="card"  value="<?php echo $dat['stu_cardNum'];?>" class="layui-input-inline">
                </td>
                <td>学生状态</td>
                <td>
                    <input type="text" name="state"  value="<?php echo $dat['stu_state'];?>" class="layui-input-inline">
                </td>
            </tr>
            <tr>

                <td>班级号</td>
                <td>
                    <input type="text" name="class"  value="<?php echo $dat['stu_class'];?>" class="layui-input-inline">
                </td>
                <td>所属系部</td>
                <td>
                    <input type="text" name="depart"  value="<?php echo $dat['stu_depart'];?>" class="layui-input-inline">
                </td>
                <td>专业</td>
                <td>
                    <input type="text" name="major"  value="<?php echo $dat['stu_major'];?>" class="layui-input-inline">
                </td>


            </tr>
            <tr>
                <td>所在年级</td>
                <td>
                    <input type="text" name="year"  value="<?php echo $dat['stu_beYear'];?>" class="layui-input-inline">
                </td>
                <td>家庭住址</td>
                <td colspan="3">
                    <input type="text" name="home"  value="<?php echo $dat['stu_home'];?>" class="layui-input-inline">
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <button  class="layui-btn layui-btn-danger layui-btn-sm" onclick="return confirm('确认修改学生信息')" lay-submit>提交</button>
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


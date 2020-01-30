<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/28
 * Time: 11:51
 */


include  "../../../includes/db.info.php";
include  "../../../includes/db.inc.php";

$res = select_db("off_assist","*","ass_code='{$_GET['code']}'");
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
                辅导员详细信息编辑
            </caption>

            <tr>
                <td>编号</td>
                <td>
                    <input type="text" name="code"  value="<?php echo $_GET['code'];?>" class="layui-input-inline">
                    <input type="hidden" name="modCode" value="<?php echo $_GET['code'];?>">
                </td>
                <td>姓名</td>
                <td>
                    <input type="text" name="name"  value="<?php echo $dat['ass_name'];?>" class="layui-input-inline">
                </td>
                <td>性别</td>
                <td>
                    <input type="text" name="sex"  value="<?php echo $dat['ass_sex'];?>" class="layui-input-inline">

                </td>
            </tr>
            <tr>
                <td>国家</td>
                <td>
                    <input type="text" name="country"  value="<?php echo $dat['ass_country'];?>" class="layui-input-inline">

                </td>
                <td>籍贯</td>
                <td>
                    <input type="text" name="place"  value="<?php echo $dat['ass_place'];?>" class="layui-input-inline">
                </td>
                <td>民族</td>
                <td>
                    <input type="text" name="nation"  value="<?php echo $dat['ass_nation'];?>" class="layui-input-inline">
                </td>
            </tr>
            <tr>
                <td>身份证号</td>
                <td>
                    <input type="text" name="card"  value="<?php echo $dat['ass_cardNum'];?>" class="layui-input-inline">
                </td>
                <td>最高学历</td>
                <td>
                    <input type="text" name="highEdu"  value="<?php echo $dat['ass_highEdu'];?>" class="layui-input-inline">
                </td>
                <td>学位</td>
                <td>
                    <input type="text" name="eduDegre"  value="<?php echo $dat['ass_eduDegre'];?>" class="layui-input-inline">
                </td>
            </tr>
            <tr>
                <td>管理班级</td>
                <td colspan="5">
                    <?php

                    $data = select_db("off_spareCla","spa_claCode","spa_assCode='{$_GET['code']}'");
                    $ass = mysqli_fetch_array($data);
                    ?>
                    <textarea   class="layui-textarea" name="class">
                        <?php echo $ass['spa_claCode'];?>
                    </textarea>


                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <button  class="layui-btn layui-btn-danger layui-btn-sm" onclick="return confirm('确认修改导员信息')" lay-submit>提交</button>
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


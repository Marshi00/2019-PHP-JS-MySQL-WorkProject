<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['catName']) && $_POST['catName'] != '' &&
    isset($_POST['img']) && $_POST['img'] != ''

    ) {
        $result = $db::RealString($_POST);
        $catName = $result['catName'];
        $id = $result['id'];
        $img = $result['img'];


        $r = $db::Query("SELECT * FROM category where catName='$catName' AND catId!='$id'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "دسته بندی تکراری است");
            echo json_encode($call);
            return;
        }
        $nameImage = $db::generateRandomString();

        $db::saveImageBase64($img,'../upload/cat/',$nameImage);

        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $upcat = $db::Query("update category set catName='$catName',catAdminId='$idAdmin',catImg='$nameImage' where catId='$id'");
        if($upcat){
            $call =array("error" => false);
            echo json_encode($call);
            return;
        }

    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}

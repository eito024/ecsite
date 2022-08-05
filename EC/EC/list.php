<?php
require_once('functions.php');

$pdo = connectDB();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得
    $sql = 'SELECT * FROM shuppin_hyo ORDER BY expiration DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll();

} else {
    // 出品情報格納
    if (!empty($_FILES['image']['name'])) {
    
    /*　＠変数定義の場所
    
    $productname = 
    */
        $sql = 'INSERT INTO shuppin_hyo()
                VALUES ( now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':product_name', $productname, PDO::PARAM_STR);
        $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindValue(':registered_date', $registerd, PDO::PARAM_INT);
        $stmt->bindValue(':place', $place, PDO::PARAM_STR);
        $stmt->bindValue(':expiration', $expiration, PDO::PARAM_STR);
        $stmt->bindValue(':seller', $seller, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':reception_day', $reception, PDO::PARAM_STR);
        $stmt->bindValue(':stock', $size, PDO::PARAM_INT);
        
        $stmt->execute();
    }
    header('Location:list.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <title>出品情報登録</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>出品情報登録</h1>
            </div>
        </header>
    </div>

    <hr>
    
    <div class="container">



        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>画像を選択</label>
                <form>
                    <input type="file" accept='image/*' onchange="previewImage(this);">
                    </form>
              <!--   <div class="preview" style="max-width:200px;"></div> -->
              <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
                
            </div>
        <form action="" method="get" class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label for="name"><span class="label label-danger"></span> 商品名</label>
                    <input type="text" id="productname" name="productname" value = <?= $productname?>class="form-control" placeholder="野菜名" autofocus required>
                </div>
                <div class="form-group">
                    <label for="email"><span class="label label-danger"></span> 単価</label>
                    <input type="number" id="price" name="price" value = <?= $price?> class="form-control" placeholder="値段を入力" required>
                </div>
                <div class="form-group">
                    <label for="email"><span class="label label-danger"></span> 消費期限</label>
                    <input type="date" id="expiration" name="expiration" value = <?= $expiration?> class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="tel"><span class="label label-danger"></span> 内容</label>
                    <input type="text" id="content" name="content" value = <?= $content?> class="form-control" placeholder="" required>
                </div>
                <!-- <div class="form-group">
                    <label><span class="label label-danger"></span> 送料</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="" value="1" required>込み
                        </label>
                    
                        <label class="radio-inline">
                            <input type="radio" name="" value="2" required>落札者負担
                        </label>
                    
                        <label class="radio-inline">
                            <input type="radio" name="" value="9" required>その他
                        </label>
                    </div>
                </div> -->
              
                
                <div class="form-group">
                    <label for="job">ジャンル<span class="label label-success"></span></label>
                    <select id="job" name="job" class="form-control">
                       <option value="">選択してください</option>
                        <option value="foliage">葉物</option>
                        <option value="grain">穀物</option>
                        <option value="fruit">果物</option>
                        <option value="rootvegetable">根菜</option>
                        <option value="other">その他</option>
                    </select>
                </div>
      <!--           <div class="form-group">
                    <label><span class="label label-success"></span></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="">
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="">
                       </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="">
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="">
                        </label>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary">送信する</button>
            </div>
        </form>
    </div>

    <hr>

    <div class="container">
        <footer>
        </footer>
    </div>
</body>
</html>




<script>
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
    
</script>
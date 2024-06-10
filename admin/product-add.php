<?php include 'header.php';?>
<?php include 'aside.php';?>
<?php 
$cats = $conn->query("SELECT id, name FROM category Order By name ASC");
$err_msg = '';
//. upload file
$file_name = '';
if (!empty($_FILES['image']['name'])) {
  $file = $_FILES['image'];
  $file_name = $file['name'];
  $tmp_name = $file['tmp_name'];

  move_uploaded_file($tmp_name, '../uploads/'. $file_name);
}
// lấy dữ liệu các trường khác như binh thường
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $category_id = $_POST['category_id'];
  $price = $_POST['price'];
  $sale_price = $_POST['sale_price'];
  $content = $_POST['content'];
  $image = $file_name;
  $query = $conn->query("INSERT INTO product SET name = '$name', price='$price', sale_price = '$sale_price', category_id = '$category_id', image = '$image', content = '$content'");
  if ($query) {
    header('location: product.php');
  } else {
    $err_msg =  $conn->error();
  }
}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thêm mới sản phẩm</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">

        <div class="box-body">
          <?php if ($err_msg) : ?>
            
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $err_msg;?>
            </div>
            

          <?php endif;?>
          <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="">Danh mục</label>
              
              <select name="category_id"  class="form-control">
                <option value="">Chọn danh mục</option>
                <?php foreach($cats as $cat) :?>
                <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                <?php endforeach;?>
              </select>
              
            </div>
            <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="">Giá sản phẩm</label>
              <input type="number" class="form-control" name="price" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="">Giá KM</label>
              <input type="number" class="form-control" name="sale_price" placeholder="Tên danh mục">
            </div>
            
            <div class="form-group">
              <label for="">Ảnh sản phẩm</label>
              <input type="file" class="form-control" name="image" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="">Nội dung mô tả sản phẩm</label>
              
              <textarea name="content" class="form-control" rows="3"></textarea>
              
            </div>
            

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            <a href="category.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Quay lại</a>
          </form>
          
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'footer.php'; ?>
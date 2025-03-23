<?php require_once('../../../controllers/product.controller.php');
$productController = new ProductController();
$id = $_GET['id'];
$product = $productController->getProductById($id);
?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Sửa sản phẩm</h1>
    <form action="../../../edit-product" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>" >
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    value="<?php echo $product['title']; ?>" placeholder="Tên sản phẩm" name="title">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <textarea name="description" placeholder="Mô tả" id="editor"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    value="<?php echo $product['price']; ?>" placeholder="Giá" name="price">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <h4>File</h4>
                <div class="fileName"><?php echo $product['file_path']; ?></div>
                <input type="file" class="form-control" name="filePdf" id="filePdf"
                    accept=".pdf"
                    style="width: 150px; margin-top: 20px;"
                   >
            </div>

            <div class="col-sm-6 mb-3 mb-2">
                <h4>Hình ảnh</h4>
                <img src="<?php echo $product['thumbnail']; ?>"
                    style="width:200px" class="card-img-top"
                    alt="User Image" id="preview">
                <input type="file" class="form-control" name="image" id="image" style="width: 150px;margin-top: 20px;" >
            </div>

        </div>
        <button class="btn btn-primary">Lưu</button>
    </form>
</div>
<script>
    const preview = document.getElementById('preview');
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.style.display = 'block';
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
    document.getElementById('filePdf').addEventListener('change', function() {
        var file = this.files[0];
        if (file && file.type !== 'application/pdf') {
            alert('Chỉ được upload file PDF!');
            this.value = '';
        }
        const fileName = document.querySelector('.fileName');
        fileName.textContent = file.name;
    });
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'undo',
                    'redo'
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?php include '../components/footer.php'; ?>
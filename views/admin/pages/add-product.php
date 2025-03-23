<?php
require_once('../../../controllers/product.controller.php');
$productController = new ProductController();
?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm </h1>
    <form action="../../../add-product" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Tên sản phẩm" name="title">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <textarea name="description" placeholder="Mô tả" id="editor"></textarea>
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Giá" name="price">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <h4>File</h4>
                <div class="fileName"></div>
                <input type="file" class="form-control" name="filePdf" id="filePdf"
                    accept=".pdf"
                    style="width: 150px; margin-top: 20px;"
                    required>
            </div>

            <div class="col-sm-6 mb-3 mb-2">
                <h4>Hình ảnh</h4>
                <img src="" style="width:200px" class="card-img-top" alt="User Image" id="preview">
                <input type="file" class="form-control" name="image" id="image" style="width: 150px;margin-top: 20px;" required>
            </div>

        </div>
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
<script>
    const preview = document.getElementById('preview');
    preview.style.display = 'none';
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
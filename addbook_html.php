<?php require_once('partial/header.php'); ?>

<div class="container p-4">
    <form action="addbook.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group row d-flex justify-content-between">
            <a href="http://localhost/online-library/?page=bookinfo" class="fa fa-arrow-left col-sm-2 btn btn-secondary ml-3"> Go Back</a>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label font-weight-bold">Author</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="author" placeholder="Author" name="author">
            </div>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label font-weight-bold" >Title</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" value="" placeholder="Title" name="title">
            </div>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label font-weight-bold">Description</label>
            <div class="col-sm-8">
                <textarea type="text" class="form-control" id="description" placeholder="Description" name="des"></textarea>
            </div>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label font-weight-bold">Image</label>
            <div class="col-sm-8">
                <input type="file" id="image" class="form-control" name="file_image">
            </div>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label font-weight-bold">Book PDF</label>
            <div class="col-sm-8">
                <input type="file" id="pdf" class="form-control" name="file_pdf">
            </div>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label font-weight-bold">Category</label>
            <div class="col-sm-8">
                <select class="form-control" name="category">
                    <option value="1">Novel Book</option>
                    <option value="2">General Knowledge</option>
                    <option value="3">Motivation Book</option>
                    <option value="4">Funnies Book</option>
                    <option value="5">Other Book</option>
                </select>
            </div>
        </div>
        <hr class="bg-white mt-4">
        <div class="form-group row d-flex justify-content-end">
            <button type="submit" name="upload" class="btn btn-primary w-25 mr-3">Add +</button>
        </div>
    </form>
</div>

</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
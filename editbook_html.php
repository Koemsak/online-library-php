<?php 
require_once('partial/header.php'); 
?>

<div class="container p-4">
    <?php 
        require_once('database/database.php');
        $id = $_GET['id'];
        $books = selectOneBook($id);
        
        foreach($books as $book): 
    ?>
        <form action="editbook.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$book['book_id']?>">
            <div class="form-group row d-flex justify-content-between">
                <a href="http://localhost/online-library/?page=bookinfo" class="fa fa-arrow-left col-sm-2 btn btn-secondary ml-3"> Go Back</a>
            </div>
            <hr class="bg-white mt-4">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Author</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="author" placeholder="Author" name="author" value="<?=$book['book_author']?>">
                </div>
            </div>
            <hr class="bg-white mt-4">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold" >Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?=$book['title']?>">
                </div>
            </div>
            <hr class="bg-white mt-4">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Description</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="description" placeholder="Description" name="des"><?=$book['description']?></textarea>
                </div>
            </div>
            <hr class="bg-white mt-4">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Category</label>
                <div class="col-sm-8">
                    <select class="form-control" name="category">
                        <?php if($book['category_id'] == 1): ?>
                            <option value="1" selected>Novel Book</option>
                            <option value="2">General Knowledge</option>
                            <option value="3">Motivation Book</option>
                            <option value="4">Funnies Book</option>
                            <option value="5">Other Book</option>
                        <?php elseif($book['category_id'] == 2): ?>
                            <option value="1">Novel Book</option>
                            <option value="2" selected>General Knowledge</option>
                            <option value="3">Motivation Book</option>
                            <option value="4">Funnies Book</option>
                            <option value="5">Other Book</option>
                        <?php elseif($book['category_id'] == 3): ?>
                            <option value="1">Novel Book</option>
                            <option value="2">General Knowledge</option>
                            <option value="3" selected>Motivation Book</option>
                            <option value="4">Funnies Book</option>
                            <option value="5">Other Book</option>
                        <?php elseif($book['category_id'] == 4): ?>
                            <option value="1">Novel Book</option>
                            <option value="2">General Knowledge</option>
                            <option value="3">Motivation Book</option>
                            <option value="4" selected>Funnies Book</option>
                            <option value="5">Other Book</option>
                        <?php elseif($book['category_id'] == 5): ?>
                            <option value="1">Novel Book</option>
                            <option value="2">General Knowledge</option>
                            <option value="3">Motivation Book</option>
                            <option value="4">Funnies Book</option>
                            <option value="5" selected>Other Book</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <hr class="bg-white mt-4">
            <div class="form-group row d-flex justify-content-end">
                <button type="submit" name="upload" class="btn btn-success w-25 mr-3">Update</button>
            </div>
        </form>
    <?php endforeach; ?>
</div>

</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
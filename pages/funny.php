
<?php 
    require_once("database/database.php");
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $books = getSearchFunny($_POST);
    } else {
        $books = getAllFunnyBook();
    }
?>
<div class="container border rounded p-4 mb-2 mt-2">
    <div class="row">
        <!-- <div class="sort-by d-flex justify-content-between col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="d-flex flex-column">
                <h4 class="text-white mr-4 d-flex align-item-center font-weight-light">SORT BY </h4>
                <select class="form-control" name="sort">
                    <option value="default">Select Default</option>
                    <option value="old">Old Post</option>
                    <option value="title">Title Post</option>
                </select>
            </div>
        </div> -->
        <form action="" method="post" class="col-lg-6 col-md-8 col-sm-8 col-12">
            <h4 class="text-white mr-4 d-flex align-item-center font-weight-light">SEARCH </h4>
            <div class="d-flex justify-content-between">
                <input type="search" class="form-control" placeholder="Search" name="word">
                <button type="submit" class="btn btn-success fa fa-search"></button>
            </div>
        </form>
    </div>
</div>
<div class="container border rounded p-4 mb-2 mt-2">
    <h1 class="font-weight-light text-center p-4 text-white">Full of Funnies Books</h1>
    <div class="row">
        <?php foreach($books as $book): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-3">
                <div class="card" style="background: none;">
                    <a href="mypdf/<?=$book['book_pdf']?>" target="_blank"><img class="card-img" src="images/book/<?= $book['book_img']?>" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title text-light"><?= $book['title']?></h5>
                        <p class="card-subtitle mb-2 text-light font-weight-light"><?= $book['date']?></p>
                        <div class="text-right">
                            <a href="detial.php?id=<?=$book['book_id']?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

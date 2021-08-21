<?php 
    require_once("database/database.php");
    $books = getAllBook();

    $number = countAllBook();
?>

<div class="container-fluid p-4">
    <?php if($_SESSION['username'] == "Admin" or $_SESSION['username'] == "admin"): ?>
    <a href="addbook_html.php" class="text-decoration-none btn btn-primary">Add new book</a>
    <?php endif; ?>
    <div class="card mt-4 mb-4" style="background: none;">
        <?php foreach($number as $num) : ?>
        <div class="card-body text-center text-white">
            <h3 class="font-weight-light">Number of Books: <?= $num['COUNT(book_id)'] ?></h3>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="table-responsive-xl">
        <table class="table mt-4 table-success">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Book Image</th>
                <th scope="col">Book PDF</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <?php if($_SESSION['username'] == "Admin" or $_SESSION['username'] == "admin"): ?>
                <th scope="col" colspan="2" class="text-center">Action</th>
                <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                    <tr>
                        <td><?= $book['book_id']?></td>
                        <td><?= $book['book_author']?></td>
                        <td><?= $book['title']?></td>
                        <td><?= $book['date']?></td>
                        <td><?= $book['book_img']?></td>
                        <td><?= $book['book_pdf']?></td>
                        <td><?= $book['description']?></td>
                        <td><?= $book['categoryName']?></td>
                        <?php if($_SESSION['username'] == "Admin" or $_SESSION['username'] == "admin"): ?>
                        <td>
                            <a href="editbook_html.php?id=<?=$book['book_id']?>" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="deletebook.php?id=<?=$book['book_id']?>" class="btn btn-danger">Delete</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php

// -------------------------- || CONNECT DATABASE FUNCTION || -------------------------//
function db() {
    return new mysqli('localhost', 'root', '', 'online-librabry');
}

// -------------------------- || ADD BOOK FUNCTION || -------------------------//
function addBook($value) {

    $author = $value['author'];
    $title = $value['title'];
    $description = $value['des'];

    $imageName = $_FILES['file_image']['name'];
    $imageSize = $_FILES['file_image']['size'];
    $imageType = $_FILES['file_image']['type'];
    $img_tmp_name = $_FILES['file_image']['tmp_name'];
    $image_dir = "images/book/";

    move_uploaded_file($img_tmp_name, $image_dir.$imageName);

    $pdfName = $_FILES['file_pdf']['name'];
    $pdfType = $_FILES['file_pdf']['type'];
    $pdfSize = $_FILES['file_pdf']['size'];
    $pdf_tmp_name = $_FILES['file_pdf']['tmp_name'];
    $pdf_dir = "mypdf/";
   

    move_uploaded_file($pdf_tmp_name, $pdf_dir.$pdfName);


    $category = $value['category'];

    return db()->query("INSERT INTO books (title, description, book_img, book_pdf, book_author, category_id, user_id) 
                        VALUES('$title', '$description', '$imageName', '$pdfName', '$author', '$category', 1)");

}

// -------------------------- || GET ALL BOOK DATA FUNCTION || -------------------------//

function getAllBook() {
    return db()->query("SELECT * FROM books INNER JOIN categories ON books.category_id = categories.category_id INNER JOIN users USING(user_id) ORDER BY books.book_id DESC");
}

// -------------------------- || COUNT ALL BOOK DATA FUNCTION || -------------------------//

function countAllBook() {
    return db()->query("SELECT COUNT(book_id) FROM books");
}

// -------------------------- || GET SEARCH​ ALL DATA FUNCTION || -------------------------//

function getSearchBook($value) {
    $key = $value['word'];
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id AND books.title LIKE '%$key%' ORDER BY books.book_id DESC ");
}

// -------------------------- || GET SEARCH​ GENERAL DATA FUNCTION || -------------------------//

function getSearchGeneral($value) {
    $key = $value['word'];
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 2 AND books.title LIKE '%$key%' ORDER BY books.book_id DESC ");
}

// -------------------------- || GET SEARCH​ NOVEL DATA FUNCTION || -------------------------//

function getSearchNovel($value) {
    $key = $value['word'];
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 1 AND books.title LIKE '%$key%' ORDER BY books.book_id DESC ");
}

// -------------------------- || GET SEARCH​ FUNNY DATA FUNCTION || -------------------------//

function getSearchFunny($value) {
    $key = $value['word'];
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 4 AND books.title LIKE '%$key%' ORDER BY books.book_id DESC ");
}

// -------------------------- || GET SEARCH​ OTHER DATA FUNCTION || -------------------------//

function getSearchOther($value) {
    $key = $value['word'];
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 5 AND books.title LIKE '%$key%' ORDER BY books.book_id DESC ");
}
// -------------------------- || GET SEARCH​ MOTIVATION DATA FUNCTION || -------------------------//

function getSearchMotivation($value) {
    $key = $value['word'];
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 3 AND books.title LIKE '%$key%' ORDER BY books.book_id DESC ");
}


// -------------------------- || GET ALL BOOKS BY CATEGORY FUNCTION || -------------------------//
function getAllGeneralBook() {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 2 ORDER BY books.book_id DESC ");
}
function getAllMotivationBook() {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 3 ORDER BY books.book_id DESC ");
}
function getAllFunnyBook() {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 4 ORDER BY books.book_id DESC ");
}
function getAllOtherBook() {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 5 ORDER BY books.book_id DESC ");
}
function getAllNovelBook() {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.category_id = 1 ORDER BY books.book_id DESC ");
}

function getOneBook($id) {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE book_id = $id");
}


// -------------------------- || GET DATA BY ID FUNCTION || -------------------------/
function selectOneBook($id) {
    return db()->query("SELECT books.book_id, books.title, books.description, books.date, books.book_img, books.book_pdf, books.book_author, categories.category_id, categories.categoryName AS categoryName FROM books INNER JOIN categories ON books.category_id = categories.category_id WHERE books.book_id = $id");
}

// -------------------------- || UPDATE BOOK INFORMATION FUNCTION || -------------------------/
function UpdateBook($value) {
    $author = $value['author'];
    $title = $value['title'];
    $description = $value['des'];
    $category = $value['category'];
    $id = $value['id'];

    return db()->query("UPDATE books SET books.book_author='$author', books.title='$title', books.description='$description', books.category_id='$category' WHERE book_id = $id");
}

// -------------------------- || DELETE BOOK BY ID FUNCTION || -------------------------/
function deleteBookByID($id) {
    db()->query("DELETE FROM books WHERE book_id = $id");
}

// -------------------------- || DELETE USER BY ID FUNCTION || -------------------------/
function deleteUserByID($id) {
    db()->query("DELETE FROM users WHERE user_id = $id");
}


// -------------------------- || CREATE USER FUNCTION || -------------------------//

function createUser($value) {
    $username = $value['username'];
    $email = $value['email'];
    $password = $value['password'];


    $passEnc = password_hash($password, PASSWORD_DEFAULT);
    $role = "User";

    $profileName = $_FILES['profile']['name'];
    $profileSize = $_FILES['profile']['size'];
    $profileType = $_FILES['profile']['type'];
    $profile_tmp_name = $_FILES['profile']['tmp_name'];


    $extension = pathinfo($profileName, PATHINFO_EXTENSION);
    $extensionLocal = strtolower($extension);

    $allowExtension = array('jpg', 'jpeg', 'png');

    $isValidEmail = true;
    $users = selectAllUser();
    foreach($users as $user) {
        if($email === $user['email'] or $username === $user['username']) {
            $isValidEmail = false;
        }
    }

    if($isValidEmail and in_array($extensionLocal, $allowExtension)) {
        $newImageName = uniqid('post-', true) . '.' . $extensionLocal;
        $profile_dir = "images/user/". $profileName;

        move_uploaded_file($profile_tmp_name, $profile_dir);
        return db()->query("INSERT INTO users (username, profile, email, password, role) VALUES('$username', '$profileName', '$email', '$passEnc', '$role')");
    } 
}

// -------------------------- || SELECT ALL USER FUNCTION || -------------------------//

function selectAllUser() {
    return db()->query("SELECT * FROM users ORDER BY user_id ASC");
}



// -------------------------- || LOGIN USER FUNCTION || -------------------------//

function verifyUser($value) {

    $db = new mysqli('localhost', 'root', '', 'online-librabry');   
    $username = $value['username'];
    $password = $value['password'];

    $allUser = $db->query("SELECT password, username FROM users where username = '$username'");
    $isValid = false;
    foreach($allUser as $user) {
        if(password_verify($password, $user['password']) and $user['username'] === $username) {
            $isValid = true; 
        }
    }
    return $isValid;
}

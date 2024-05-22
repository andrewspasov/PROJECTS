<?php

session_start();

require_once __DIR__ . '/autoload-classes.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$option = new Option();
$options = $option->getOptions();


$validator = new FormValidator();

?>

<!DOCTYPE html>
<html>

<head>
    <title>FORM</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-img">
        <div class="container pt-5">
            <h1 class="text-center pb-5">You are one step away from your webpage</h1>

            <div class="row">
                <form class="d-flex" action="create-website.php" method="POST">
                    <div class="row">
                    <div class="col-4 g-light p-3">
                        <div class="bg-light p-3">
                            <div class="form-group pb-2">
                                <label for="url">Cover image URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['url'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['url']; ?></p>
                                    <?php unset($_SESSION['errors']['url']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="title">Main Title of Page</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div class="form-group pb-2">
                                <label for="subtitle">Subtitle of Page</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                            </div>


                            <div class="form-group pb-2">
                                <label for="info">Something about you</label>
                                <textarea class="form-control" id="info" rows="3" name="info" required></textarea>
                            </div>

                            <div class="form-group pb-2">
                                <label for="phone">Your telephone number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
                                <?php if (isset($_SESSION['errors']['phone'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['phone']; ?></p>
                                    <?php unset($_SESSION['errors']['phone']); ?>
                                <?php endif; ?>
                            </div>


                            <div class="form-group pb-2">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                        </div>
                        <div class="form-group mt-5 bg-light p-3">
                            <label for="select-option">Do you provide services or products?</label>
                            <select id="select-option" class="form-control" name="select-option" required>
                                <option selected disabled value="">Open this select menu</option>
                                <?php foreach ($options as $op) { ?>

                                    <option value="<?= $op['id'] ?>"><?= $op['type'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="bg-light p-3 mt-3">
                            <p>Provide url for an image and description of your service/product</p>
                            <div class="form-group pb-2">
                                <label for="img-url">Image URL</label>
                                <input type="text" class="form-control" id="img-url" name="img-url" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['url-1'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['url-1']; ?></p>
                                    <?php unset($_SESSION['errors']['url-1']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="desc">Description of service/product</label>
                                <textarea class="form-control" id="desc" rows="3" name="desc" required></textarea>
                            </div>
                            <div class="form-group pb-2">
                                <label for="img-url-2">Image URL</label>
                                <input type="text" class="form-control" id="img-url-2" name="img-url-2" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['url-2'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['url-2']; ?></p>
                                    <?php unset($_SESSION['errors']['url-2']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="desc-2">Description of service/product</label>
                                <textarea class="form-control" id="desc-2" rows="3" name="desc-2" required></textarea>
                            </div>
                            <div class="form-group pb-2">
                                <label for="img-url-3">Image URL</label>
                                <input type="text" class="form-control" id="img-url-3" name="img-url-3" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['url-3'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['url-3']; ?></p>
                                    <?php unset($_SESSION['errors']['url-3']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="desc-3">Description of service/product</label>
                                <textarea class="form-control" id="desc-3" rows="3" name="desc-3" required></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light p-3 mt-3">
                            <div class="form-group pb-2">
                                <label for="desc-4">Provide a description of your company,
                                    something people should be aware of before
                                    they contact you:</label>
                                <textarea class="form-control" id="desc-4" rows="3" name="desc-4" required></textarea>
                            </div>
                            <div class="form-group pb-2">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['linkedin'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['linkedin']; ?></p>
                                    <?php unset($_SESSION['errors']['linkedin']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['fb'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['fb']; ?></p>
                                    <?php unset($_SESSION['errors']['fb']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="twitter">Twitter+</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['twitter'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['twitter']; ?></p>
                                    <?php unset($_SESSION['errors']['twitter']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group pb-2">
                                <label for="google">Google+</label>
                                <input type="text" class="form-control" id="google" name="google" value="<?php echo isset($input) ? htmlspecialchars($input) : ''; ?>" required>
                                <?php if (isset($_SESSION['errors']['google'])) : ?>
                                    <p class="text-danger"><?php echo $_SESSION['errors']['google']; ?></p>
                                    <?php unset($_SESSION['errors']['google']); ?>
                                <?php endif; ?>
                                

                            </div>
                        </div>
                    </div>
                    <div class="offset-2 col-8"><button class="btn btn-secondary btn-lg btn-block mt-5 mb-5" type="submit">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
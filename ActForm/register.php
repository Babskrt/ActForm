<?php
require_once "includes/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
<form action="includes/register.inc.php" method="post">
        <div>
            <input type="text" name="firstname" placeholder="Firstname" <?= isset($_SESSION['errors']['firstname']) ? 'style="border: 1px solid red"' : '' ?> value="<?= isset($_SESSION['inputs']) ? $_SESSION['inputs']['firstname'] : '' ?>" /><br />
            <?= isset($_SESSION['errors']['firstname']) ? $_SESSION['errors']['firstname'] : '' ?>
        </div>
        <div>
            <input type="text" name="lastname" placeholder="Lastname" <?= isset($_SESSION['errors']['lastname']) ? 'style="border: 1px solid red"' : '' ?> value="<?= isset($_SESSION['inputs']) ? $_SESSION['inputs']['lastname'] : '' ?>" /><br />
        <?= isset($_SESSION['errors']['lastname']) ? $_SESSION['errors']['lastname'] : '' ?>
        </div>
        <div>
            <input type="text" name="id" placeholder="Id" <?= isset($_SESSION['errors']['id']) ? 'style="border: 1px solid red"' : '' ?> value="<?= isset($_SESSION['inputs']) ? $_SESSION['inputs']['id'] : '' ?>" /><br />
        <?= isset($_SESSION['errors']['id']) ? $_SESSION['errors']['id'] : '' ?>
        </div>
    <button>Save</button><button>Back</button><button>Next</button><button>Delete</button>
    </form>

    <?php
    unset($_SESSION['errors']);
    ?>
</body>
</html>
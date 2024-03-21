<?php
include_once(__DIR__ . "/classes/Student.php"); // DIR makes sure that the path is always relative to the current file

if (!empty($_POST)) {
    try {
        $student1 = new Student();
        $student1->setFirstname($_POST['firstname']);
        $student1->setLastname($_POST['lastname']);
        $student1->save();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

// GET all from database
$allCards = Student::getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMD membership</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php if (isset($error)) : ?>
        <div class="text-red-600"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="bg-slate-100 p-1">
        <form action="" method="post">
            <div class="p-2">
                <label for="firstname" class="text-slate-700">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="border-solid border-slate-20 border-2 rounded" />
            </div>

            <div class="p-2">
                <label for="lastname" class="text-slate-700">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="border-solid border-slate-20 border-2 rounded" />
            </div>

            <div class="p-2">
                <input class="cursor-pointer p-2 rounded text-white font-bold bg-green-600" type="submit" value="Add student" />
            </div>
        </form>
    </div>

    <div class="flex flex-row flex-wrap gap-1 p-2">
        <?php foreach ($allCards as $card) : ?>
            <article class="drop-shadow rounded flex-0 basis-80 bg-red-500">
                <div class="bg-white p-2">
                    <img class="w-20" src="https://www.thomasmore.be/sites/www.thomasmore.be/files/tm_standaardlogo_rgb.png" alt="" />
                </div>

                <div class="bg-cyan-600">
                    <h3 class="text-sm p-2"><?php echo $card['firstname'] . " " . $card['lastname']; ?></h3>
                </div>

                <div class="p-2 flex flex-row">
                    <div class="flex-1">
                        <h3 class="font-bold uppercase">Student</h3>
                        <h3 class="text-sm">
                            <?php echo date("Y")  . " —  " . date("Y") + 1; ?>
                        </h3>
                    </div>
                    <div class="self-end">
                        <img class="w-20" src="https://i.postimg.cc/W1RsmjPK/uifaces.jpg" alt="" />
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</body>

</html>
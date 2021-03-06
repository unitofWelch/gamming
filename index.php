<?php
    include 'db.php';
?>

<html lang=en>
<link href=styles.css rel=stylesheet />

    <head>
        <title>Gamming</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <form method="POST" id="form">
                        <div class="form-group" style="margin-top: 2em">

                            <input id="pt_source" type="file" name="pt_source" class="inputfile">
                            <label for="pt_source">Choose a plain text file</label>
                        </div>
                        <div class="form-group">
                            <input id="g_source" type="file" name="g_source" class="inputfile">
                            <label for="g_source">Choose a gamma file</label>
                        </div>
                        <div class="form-group">
                            <label for="repeat-password">Method</label> <br>
                            <input type="radio" name="actform" value="encrypt" checked="checked" /><label>&nbspEncryption</label> <br>
                            <input type="radio" name="actform" value="decrypt" /><label>&nbspDecryption</label>
                        </div>
                        <div class="wrapper" style="font-size:1.5em; margin-top: 1em; margin-bottom: 2em">
                            <button id="proceed" name="proceed" class="bouncy">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="alt">ID</th>
                        <th class="alt">Plaintext</th>
                        <th class="alt">Gamma</th>
                        <th class="alt">Action</th>
                        <th class="alt">Result</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $users = getIDsList();
                    ?>

                    <?php if(!empty($users)): ?>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <th scope="row"><?= $user['id'] ?></th>
                                <th><?= $user['plaintext'] ?></th>
                                <th><?= $user['gamma'] ?></th>
                                <th><?= $user['action'] ?></th>
                                <th><?= $user['result'] ?></th>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="ajx.js"></script>
</html>
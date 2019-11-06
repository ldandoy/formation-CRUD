<?php

    function logger($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    function js()
    {
        echo '<script src="js/jquery-3.3.1.slim.min.js"></script>';
        echo '<script src="js/popper.min.js"></script>';
        echo '<script src="js/bootstrap.min.js"></script>';
        echo '<script src="js/all.min.js"></script>';
    }

    function css()
    {
        echo '<link rel="stylesheet" href="css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="css/all.min.css">';
    }

    function alert()
    {
        if (isset($_GET['msg']) && isset($_GET['msg_type'])) {
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-<?php echo $_GET['msg_type']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_GET['msg']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
    }
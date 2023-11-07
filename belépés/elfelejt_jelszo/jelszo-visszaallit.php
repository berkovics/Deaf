<?php
/*Molnár Csenge Anna*/
session_start();

$page_title ="Password Reset Form";
include('includes/header.php');
include('elfejt.html');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status'];?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h5>Elfejtetted Jelszó</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="jelszo-visszaallit-code.php" method="POST">
                            <div class="form-group mb-3">
                                <label >Email cím</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset:link" class="btn btn-primary">Jelszó-visszaállítási link küldése</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
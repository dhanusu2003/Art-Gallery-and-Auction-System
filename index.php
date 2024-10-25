<?php include('includes/header.php');?>
<?php session_start();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_SESSION['status'])&& $_SESSION['status']!=""){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey</strong><?php echo $_SESSION['status'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
                <?php
                unset($_SESSION['status']);
            }
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
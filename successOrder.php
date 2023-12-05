<?php require_once  'header.php'; ?>
<?php
use App\classes\Session;
use App\classes\Customer;
use App\classes\Order;
$cmrId = Session::get('CustomerId');
#Session::init();
?>
<?php
if(!isset($_SESSION['login'])){
    header('location:login.php');
    die();
}
?>

    <style>
        .error{
            color: red;
            font-size: 16px;
        }
        .success{
            color: green;
            font-size: 16px;
        }
    </style>
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== --><?php
                require_once  'sidebar.php';
                ?>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Pagamento com Successo</li>
                    </ul>
                    <div style="text-align: center;margin-top: 100px;">
                        <h4 style="color: green;font-size: 32px">Pedido confirmado com sucesso!!</h4>

                        <a href="orderPage.php" class="btn btn-info">Pagina de Pedidos</a>
                    </div>
                </div>
            </div></div>
    </div>
    <!-- MainBody End ============================= -->
    <!-- Footer ================================================================== -->
<?php
require_once  'footer.php';
?>
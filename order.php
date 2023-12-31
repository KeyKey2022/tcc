<?php require_once  'header.php'; ?>
<?php
use App\classes\Session;
use App\classes\Cart;
#Session::init();
?>
<?php
if(!isset($_SESSION['login'])){
    header('location:login.php');
    die();
}
?>
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
                        <li class="active">Peça agora</li>
                    </ul>
                    <table class="table table-bordered">
                        <thead>
                        <div>
                        <tr>
                            <th>Total Produto (Quantidade)</th>
                            <th>Preço Total </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= Session::get('Qty')?> <?= Session::get('Qty') > 1 ? 'Items' : 'Item' ?></td>
                            <td>  <?= Session::get('Total')?> Kz</td>
                        </tr>
<?php
if(Cart::countCartProduct() == 0){ ?>
    <tr>
        <td colspan="2" style="text-align: ">
            <h4 style="text-align: center">
Seu carrinho está vazio! Por favor compre algo!! </h4>
        </td>
    </tr>
    <?php }?>
                        <?php
                        if(Cart::countCartProduct() != 0){ ?>
                        <tr>
                            <td colspan="2" style="text-align: ">
                                <h4 style="text-align: center">Escolha sua opção de pagamento </h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <a href="offlinePayment.php" class="btn btn-info">Offline</a>
                                <a href="" class="btn btn-success">Online</a>
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <a href="product_summary.php" class="btn btn-warning">Voltar ao carrinho</a>

                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div></div>
    </div>
    <!-- MainBody End ============================= -->
    <!-- Footer ================================================================== -->
<?php
require_once  'footer.php';
?>
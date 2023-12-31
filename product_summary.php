<?php require_once 'header.php';
use App\classes\Cart;
use App\classes\Session;
?>
<?php
if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='3'>";
}
?>
    <!-- Update Cart Quantity -->
<?php
if(isset($_POST['update-cart'])){
    $upCrt = Cart::updateCartQuantity($_POST);
    echo "<meta http-equiv='refresh' content='3'>";
}

?>

    <!-- Delete Cart Iteam-->
<?php
if(isset($_GET['cartid'])){
    $cid = base64_decode($_GET['cartid']);
    $dltCart = Cart::deleteCartIteam($cid);
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
<!-- Sidebar ================================================== -->
        <?php require_once 'sidebar.php' ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> CARRINHO DE COMPRAS</li>
    </ul>
	<h3>  CARRINHO DE COMPRAS [ <small><?= Session::get('Qty') ?> Item(s) </small>]<a href="index.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Comprando </a></h3>
        <span><?= isset($upCrt) ? $upCrt : ''?></span>
        <span><?= isset($dltCart) ? $dltCart : ''?></span>
	<hr class="soft"/>
			
	<table class="table table-bordered">
              <thead>
                <tr>
                    <th>SL</th>
                  <th>Produto</th>
                  <th>Descrição</th>
                  <th>Quantidade/Update</th>
				  <th>Preço</th>
                  <th>Total</th>
                  <th>Acção</th>
				</tr>
              </thead>
              <tbody>
<?php
$row = Cart::getCartProduct();
$i =0;
$sum = 0;
$qty = 0;
$gtotal = 0;
while ($cart = mysqli_fetch_assoc($row)) { ?>
                <tr>
                    <td><?= ++$i?></td>
                  <td> <img width="60" src="uploads/products/<?= $cart['image']?>" alt=""/></td>
                  <td><?= $cart['pname']?></td>
				  <td>
					<div class="input-append">
                        <form action="" method="post">
                            <input type="hidden" value="<?= $cart['id']?>" name="cid">
                            <input type="number" name="quantity" value="<?= $cart['quantity']?>"/>
                            <input type="submit" name="update-cart" value="Actualizar"/>
                        </form>
                    </div>
				  </td>
                  <td><?= $cart['price']?></td>
                  <td>  <?= $total = $cart['quantity'] * $cart['price']; ?> Kz</td>
                    <td style="text-align: center;color: red"><a href="?cartid=<?= base64_encode($cart['id'])?>" onclick="return confirm('Voce tem a certeza ?')">X</a></td>
                </tr>
    <?php $sum += $total; $qty += $cart['quantity']; }
?> <?php
if(Cart::countCartProduct() == 0){
    echo "<span class='error' style='text-align: center;
display: block;margin: 15px 0;;'>Carrinho esta vazio ! compre alguma coisa ......</span>";
}else{
    ?>

                <tr>
                  <td colspan="6" style="text-align:right">Preço Total:	</td>
                  <td> $ <?= $sum ?></td>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right">VAR:	</td>
                  <td> (7% <-> ) <?= $vat = $sum * .1;?></td>
                </tr>

				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL  =</strong></td>
                     <td class="label label-important" style="display:block"> <strong>  <?= $gtotal = ( $sum + $vat) ?> Kz</strong></td>
                </tr>
    <?php } ?>
				</tbody>
            </table>
        <hr>
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Comprando </a>
        <?php
        if($qty !=0 ){ ?>
	<a href="order.php" class="btn btn-large pull-right">Conferir <i class="icon-arrow-right"></i></a>
            <?php } ?>
        <?php
        \App\classes\Session::set('Total',$gtotal);
        \App\classes\Session::set('Qty',$qty);
        ?>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php require_once 'footer.php' ?>
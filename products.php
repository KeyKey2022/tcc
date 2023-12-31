<?php require_once 'header.php' ?>
<?php
//pagination
$start = 0;
$limit = 9;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $start = ( $page - 1 ) * $limit;
}
$totalpage = ceil(\App\classes\Product::countAllProduct() / $limit);
if($totalpage < $page)
{
    header("location:products.php");
}
?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php require_once 'sidebar.php' ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Productos</li>
    </ul>
	<h3> Products Name <small class="pull-right"> 40 produtos estão disponiveis </small></h3>	
	<hr class="soft"/>
	<p>Hoje em dia a indústria de lingerie é uma das esferas de negócios de maior sucesso. Estamos sempre em contato com as últimas tendências da moda - é por isso que nossos produtos são tão populares e temos um grande número de clientes fiéis em todo o país.</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Ordenar por </label>
			<select>
              <option>Pridutos A - Z</option>
              <option>Pridutos Z - A</option>
              <option>Stoke Activo</option>
              <option>Preço baixos</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		<div class="row">	  
			<div class="span2">
				<img src="themes/images/products/3.jpg" alt=""/>
			</div>
			<div class="span4">
				<h3>Novo | Disponivel</h3>				
				<hr class="soft"/>
				<h5>Nome do Produto </h5>
				<p>
				Hoje em dia a indústria de lingerie é uma das esferas de negócios de maior sucesso. Estamos sempre em contato com as últimas tendências da moda - é por isso que nossos produtos são tão populares e temos um grande número de clientes fiéis em todo o país..
				</p>
				<a class="btn btn-small pull-right" href="product_details.html">Ver</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> 140.00 Kz</h3>
			<label class="checkbox">
				<input type="checkbox">  
Adiciona produto para comparar
			</label><br/>
			
			  <a href="product_details.html" class="btn btn-large btn-primary"> Add para <i class=" icon-shopping-cart"></i></a>
			  <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
<?php
$t = \App\classes\Product::paginationWiseShow($start,$limit);
while ($tProduct = mysqli_fetch_assoc($t)) { ?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.php?id=<?= $tProduct['id'] ?>"><img src="uploads/products/<?=$tProduct['image']?>" style="height: 160px" alt=""/></a>
				<div class="caption">
				  <h5><?=$tProduct['name']?></h5>
				  <p>
                      <?= \App\classes\Helper::textShorten($tProduct['description'],100)?>
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="product_details.php?id=<?= $tProduct['id'] ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="">Add para <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> <?=$tProduct['price']?>Kz</a></h4>
				</div>
			  </div>
			</li>
    <?php } ?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

        <!-- pagination -->
        <div class="pagination" style="text-align: right;">
            <ul>
                <?php if ($page>1){ ?>
                    <li><a href="products.php?page=<?=$page - 1;?>""> Voltar</a></li>
                <?php } ?>
                <?php
                for($i=1;$i<=$totalpage;$i++){ ?>
                    <li ><a href="products.php?page=<?=$i?>"><?= $i?></a></li>
                <?php } ?>
                <?php if($totalpage > $page) { ?>
                    <li><a href="products.php?page=<?=$page + 1;?>">Proximo</a></li>
                <?php } ?>
            </ul>
        </div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
<?php require_once 'footer.php' ?>
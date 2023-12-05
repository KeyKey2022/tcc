<?php require_once 'header.php'; ?>
<?php
$login = \App\classes\Session::get('login');
if($login == true){
    header('location: order.php');
    die();
}
?>
<?php
use App\classes\Customer;
if(isset($_POST['reg-btn'])){
    $rtnTxt = Customer::addNewCustomer($_POST);
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
<?php
if(isset($_POST['log-btn'])){
    $logRtn = Customer::customerCheck($_POST);
}
?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
        <?php require_once 'siderbar1.php'; ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Cadastro</li>
    </ul>
	<h3> Cadastro</h3>
        <?= isset($rtnTxt) ? $rtnTxt : '' ?>
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
        <style>
            sup{
                color: red;
                font-size: 12px;
            }
        </style>
	<form class="form-horizontal"method="post" action="">
		<h4>Insira os seus dados</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Nome <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder="Nome" name="name">
			</div>
		 </div>
        <div class="control-group">
            <label class="control-label" for="inputFname1">Email <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="inputFname1" placeholder="Email" name="email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputFname1">Provincia <sup>*</sup></label>
            <div class="controls">
                <input type="text"  name="city" placeholder="Provincia">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputFname1">CPostal <sup>*</sup></label>
            <div class="controls">
                <input type="text" name="zip" placeholder="CPostal">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Endesso <sup>*</sup></label>
            <div class="controls">
                <input type="text" name="address" placeholder="Endesso">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Pais <sup>*</sup></label>
            <div class="controls">
                <input type="text" placeholder="Pais" name="country">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Telefone <sup>*</sup></label>
            <div class="controls">
                <input type="text" placeholder="phone" name="phone">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Senha <sup>*</sup></label>
            <div class="controls">
                <input type="text" placeholder="Senha" name="password">
            </div>
        </div>
	<div class="control-group">
			<div class="controls">

				<input class="btn btn-large btn-success" type="submit" value="Cadastrar" name="reg-btn"/>
			</div>
		</div>		
	</form>
        <a href="login.php" class="btn btn-info">Login</a>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php require_once 'footer.php'; ?>
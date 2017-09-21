<?php require('search.php'); ?>

<!doctype html>
<html class="no-js" lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BeerU | Learn About Your Favorite Beer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">

    	<!-- Bootstrap Core -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="/css/application.css">
        
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h1 class="branding"><a href="/">BeerU</a></h1>
					<p>Learn More About Your Favorite Brew</p>
				</div>
			</div>
			<?php if ($showError) : ?>
			<div class="row">
		    	<div class="col-md-offset-4 col-md-4 ">
		    		<p class="text-center alert alert-info"><?=$showErrorMsg?></p>
		    	</div>
		    </div>
			<?php endif ?>
			<?php if ($showDisplay) : ?>
			<div class="row">
		    	<div class="col-md-offset-2 col-md-8 beerDisplay">
		    		<div class="col-md-4">
		    			<img src="<?=$getImage?>" class="img-responsive img-thumbnail center-block">
		    		</div>
		    		<div class="col-md-8">
			    		<h2><?=$getName?></h2>
			    		<p><span class="feature">Category:</span> <?=$getCategory?></p>
			    		<p><span class="feature">Description:</span> <?=$getDescription?></p>
			    		<?php if ($showGlass) : ?>
			    			<p><span class="feature">Best Served In:</span> <?=$getGlass?> Glass</p>
			    		<?php endif ?>
			    		<?php if ($showABV) : ?>
			    		<p><span class="feature">Alcohol By Volume: </span> <?=$getABV?></p>
			    		<?php endif ?>
		    		</div>
		    	</div>
	    	</div>
	    	<?php endif ?>
			<div class="row">
				<div class="col-md-offset-2 col-md-8 panel panel-default beerSearch">
					<div class="panel-body">
						<form method="GET">
						  <div class="form-group">
						    <label for="beerName">Beer Name</label>
						    <input type="text" class="form-control" id="beerName" placeholder="Corona Light" name="beerName" value="<?=$beerName?>">
						  </div>
						  <div class="form-group">
						    <label for="abv">Show Alcohol By Volume</label>
						    <select class="form-control" id="abv" name="abv">
								<option value="yes" <?php if ($option == 'yes') echo 'SELECTED'?>>Yes</option>
								<option value="no" <?php if ($option == 'no') echo 'SELECTED'?>>No</option>
						    </select>
						  </div>
						  <div class="checkbox">
						    <label>
						      <input type="checkbox" <?php if ($showGlass) { echo 'CHECKED'; } ?> name="showGlass" id="showGlass"> Recommend Best Glass to Serve This Beer In
						    </label>
						  </div>
						  <input type="submit" class="btn btn-primary" value="Search">
						</form>
					</div>
		    	</div>
		    </div>
		</div>
	<!-- 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"> </script>-->
    </body>
</html>
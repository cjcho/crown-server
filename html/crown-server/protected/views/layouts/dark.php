<? /* Dark Layout! */ ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"/>	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dark.css"/>

</head>

<body>

	<div id="wrapper">
		<h1>crown servers</h1>
		<?=$content;?>
	</div>

</body>
</html>

<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mainadm.css" media="screen, projection" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
 <div class="wrapper">
        <div class="header">
    <div class="left">
        <a href="/public/manager/" class="logo">admin</a>
        <div class="logout"><a href="/public/manager/index/exit">выход</a></div>
    </div>
    <div class="right">
	<!--<div class="sbp_left">
    Всего ивенторов: <b>102</b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Всего страниц: <b>6</b>
</div>-->
<div class="sbp_right">
   <!-- <div class="currpage">
        <input name="currpage" maxlength="3" value="1">
        <span class="getpage"></span>
    </div>
    <select name="perpage" class="perpage">
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
    </select> -->
    <a class="excel" href="#"><img src="/public/backend/img/excel.png" alt="" /></a>
</div></div>
    <div class="clear"></div>
</div>        <div class="menu">
    <div class="item">
       Управление ивенторами
		<ul>
		<li><a href="index.php?r=cockpit/iventorinfo/admin">Все ивенторы</a></li>
		<li><a href="index.php?r=cockpit/iventorinfo/admin2">Добавленные ивенторы</a></li>
		<li><a href="index.php?r=cockpit/iventorinfo/create">Создать ивентора</a></li>
		</ul>
    </div>
	    <div class="item">
        <a href="index.php?r=cockpit/profile/admin">Управление пользователями</a>
    </div>
	    <div class="item">
        <a href="index.php?r=cockpit/citycategorytext/admin">Категории SEO</a>
    </div>
	
	<div class="item">
        Финансы
		<ul>
		<li><a href="index.php?r=cockpit/settings/admin">Настройки</a></li>
		<li><a href="index.php?r=cockpit/settings/days">Добавить/Забрать дней</a></li>
		</ul>
    </div>
	
	<div class="item">
        Статистика
		<ul>
		<li><a href="index.php?r=cockpit/visits/admin">Посещения</a></li>
		<li><a href="index.php?r=cockpit/references/admin">Переходы</a></li>
		</ul>
    </div>

	<div class="item">
        <a href="index.php?r=cockpit/lettersSent/create">Отправить письмо</a>
    </div>
</div>        <div style="margin-left: 200px; padding-bottom: 30px;">
               	<?php echo $content; ?>
        </div>
        
    </div>
</body>
</html>

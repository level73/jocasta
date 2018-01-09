<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="https://fonts.googleapis.com/css?family=Martel:400,600|Montserrat" rel="stylesheet">
    <!-- Fontawesome -->
    <script src="/assets/fontawesome-all.min.js" defer></script>
    <!-- Third party components -->
    <?php loadVendorScripts('css'); ?>

    <!-- App CSS -->
    <link href="/css/jocasta.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title><?php echo $title . ' | ' . APPNAME; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" id="main-nav">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="/" class="brand">JOCASTA</a>
          </div>
          <div class="col-xs-6 col-sm-9 col-md-10">
            <div class="collapse navbar-collapse" id="main-nav-menu">
              <ul class="nav navbar-nav">
                <li role="presentation" <?php if($pagepath == 'organisation') echo 'class="active"'; ?>><a href="/organisation/all"><i class="fal fa-users"></i> Organizzazioni</a></li>
                <li role="presentation" <?php if($pagepath == 'invoice') echo 'class="active"'; ?>><a href="/invoice/all"><i class="fal fa-file-alt"></i> Fatture</a></li>
                <li role="presentation" <?php if($pagepath == 'expense') echo 'class="active"'; ?>><a href="/expense/all"><i class="fal fa-credit-card"></i> Spese</a></li>
              </ul>
            </div>
          </div>
      </div>
    </nav>
    <?php echo $url; ?>

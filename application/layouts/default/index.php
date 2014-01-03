<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->getHeader(); ?>
        <link href="<?php echo $this->staticUrl('../application/layouts/default/style.css'); ?>" rel="stylesheet">
        <link rel="icon" href="<?php echo $this->staticUrl('img/favicon.ico'); ?>" type="image/x-icon" />
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo $this->url(); ?>" class="navbar-brand"><img class="brand" src="<?php echo $this->staticUrl('img/ilch_logo_brand.png'); ?>"></img></a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="container paddet">
                    <?php echo $this->getHmenu(); ?>
                </div>
                <div class="col-lg-8">
                    <div class="panel panel-default" id="headings">
                        <div class="panel-body">
                            <?php echo $this->getContent(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php
                        echo $this->getMenu
                        (
                            1,
                            '<div class="panel panel-default">
                                 <div class="panel-heading">%s</div>
                                    <div class="panel-body">
                                        %c
                                    </div>
                             </div>'
                        );
                    ?>
                </div>
            </div>
        </div> 
        <div class="container credit">
            <p class="muted credit">© Ilch CMS | <?php echo '<a href="'.$this->url('admin').'">Administrator</a>'; ?></p>
        </div>  
    </body>
</html>

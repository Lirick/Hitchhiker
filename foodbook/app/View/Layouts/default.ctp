<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    //echo $this->Html->css('cake.generic');
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('bootstrap-theme');
    echo $this->Html->css('customize');
    echo $this->Html->css('bootstrap-datetimepicker.min');
     echo $this->Html->css('weather');
    

    echo $this->Html->script('jQuery');
    echo $this->Html->script('bootstrap');
    echo $this->Html->script('moment');
    echo $this->Html->script('bootstrap-datetimepicker.min');
    echo $this->Html->script('jquery.zweatherfeed.min');
    

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="container">
    <?php echo $this->element('navbar'); ?>
    <div id="header"></div>
    
    <div id="content" class="container">
        <?php echo $this->Session->flash(); ?>
    </div>
    
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('loginmodal'); ?>
</div>

<div class="footer">
    © 2014 Foodbook Team All Rights Reserved
</div>
<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Js->writeBuffer(); ?>
</body>
<script>
    $(function () {
        //DOM is ready..    	
    });

    
    function login() {
        var data = $("#UserLoginForm").serialize();

        $.ajax({
            type: "post",		// Request method: post, get
            url: "<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'loginajax')); ?>",
            data: data,			// Form variables
            dataType: "json",	// Expected response type
            success: function (response, status) {
                handleCallback(response, status);
            },
            error: function (response, status) {
                handleError(XMLHttpRequest, textStatus, errorThrown)
            }
        });

        return false;
    }

    function handleCallback(response, status) {
        // Response was a success
        if (response.success) {
            $("#loginModal").modal('hide')
            location.reload();
            // Response contains errors
        } else {
            var errors = [];
            if (typeof(response.data) == ("object" || "array")) {
                $.each(response.data, function (key, value) {
                    var text = isNaN(key) ? key + ": " + value : value;
                    errors.push(text);
                });
            } else {
                errors.push(response.data);
            }

            errors = errors.join("\n");
            $("#logininfobox").html(errors).slideDown();
            $("#logininfobox").css("display","inherit");
        }
        return false;
    }

    /**
     * Handle an AJAX failure
     */
    function handleError(XMLHttpRequest, textStatus, errorThrown) {
        $("#logininfobox").html("An unexpected error has occurred.").slideDown();
    }

    function loadfollowers(id) {
        $.ajax({
            type: "get",		// Request method: post, get
            url: "<?php echo $this->Html->url(array('controller' => 'followers', 'action' => 'view')); ?>/"+id,
            dataType: "html",	// Expected response type
            success: function (response, status) {
                $("#rview").html(response);
            },
            error: function (response, status) {
                //handleError(XMLHttpRequest, textStatus, errorThrown)
            }
        });

        return false;
    }

    function loadendorsers(id) {
        $.ajax({
            type: "get",		// Request method: post, get
            url: "<?php echo $this->Html->url(array('controller' => 'endorsers', 'action' => 'view')); ?>/"+id,
            dataType: "html",	// Expected response type
            success: function (response, status) {
                $("#rview").html(response);
            },
            error: function (response, status) {
                //handleError(XMLHttpRequest, textStatus, errorThrown)
            }
        });

        return false;
    }
</script>
</html>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <?php echo $this->Html->link(
                'Foodbook',
                array('controller' => 'starts','action' => 'index'),
                array('class' => 'navbar-brand', 'style' => 'background-color: #3D84C1; color: white;')
            );?>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link('Events', array('controller' => 'events','action' => 'search'));?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (AuthComponent::user('id')): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding:10px;">
                            <?php echo $this->Html->image("users/" .AuthComponent::user('picture'), array('style' =>'height:30px;padding:0;', 'class' => 'img-responsive img-thumbnail', 'alt' => 'Profile Picture', 'fullBase' => true)); ?>
                            <?= AuthComponent::user('name') ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Host your event', array('controller' => 'events', 'action' => 'create'));?></li>
                            <li class="divider"></li>
                            <li>
                                <?php echo $this->Html->link('My profile', array('controller' => 'users','action' => 'view'));?>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <?php echo $this->Html->link('Logout', array('controller' => 'users','action' => 'logout'));?>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="" data-toggle="modal" data-target="#loginModal">Sign in</a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
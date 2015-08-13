<?php $uid = $this->session->userdata('userid');?>
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url();?>auth">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            UMS
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url();?>lecturer"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>lecturer/lecturer_units"><i class="fa fa-book"></i> <span class="nav-label">My Units</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>messages/read"><i class="fa fa-twitch"></i> <span class="nav-label">Messages</span><span class="label label-info pull-right">62</span></a>
                    </li>
                                       
                </ul>

            </div>
        </nav>
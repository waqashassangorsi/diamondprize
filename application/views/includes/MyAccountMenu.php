<style>
.dashboard_menu {
    box-shadow: 0 0px 4px 0 gray;
}
.nav-tabs {
    border-bottom: 1px solid #dee2e6;
}

.dashboard_menu .active a {
    background-color: #b49449!important;
    color: #fff!important;
}
.dashboard_menu .nav-tabs li.nav-item a i {
    margin-right: 8px;
    vertical-align: middle;
}
.dashboard_menu a{
    
    color: #000;
}
.nav-link{
    padding: 13px 0!important;
    text-align: left!important;
    padding-left: 17px!important;
}

 .active2{
        background-color: #b49449 !important;
         color:#fff !important;
    }

.navdata:hover
{
    background-color: #b49449;
}
.navdata2:hover
{
    color:#fff;
}
</style>

<div class="dashboard_menu">
    <ul class="nav nav-tabs flex-column">
        
             <!--
      <li class="nav-item active">
        <a class="nav-link  "  href="<?php echo base_url('Myaccount'); ?>"><i class="fa fa-th-large" aria-hidden="true"></i>Dashboard</a>
      </li>
      -->
      <li class="nav-item navdata">
        <a class="nav-link navdata2 <?php if($this->uri->segment("2")=="Order"){ echo "active2";} ?> "  href="<?php echo base_url('Myaccount/Order'); ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i>My Tickets</a>
      </li>
       <li class="nav-item navdata">
        <a class="nav-link navdata2 <?php if($this->uri->segment("2")=="winners"){ echo "active2";} ?>"  href="<?php echo base_url('Myaccount/winners'); ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i>My winning prizes</a>
      </li>

      <li class="nav-item navdata">
        <a class="nav-link navdata2 <?php if($this->uri->segment("2")=="Setting"){ echo "active2";} ?>"  href="<?php echo base_url('Myaccount/Setting'); ?>" ><i class="fa fa-sliders" aria-hidden="true"></i>Setting</a>
      </li>
      <li class="nav-item navdata">
        <a class="nav-link navdata2 <?php if($this->uri->segment("2")=="Logout"){ echo "active2";} ?>" href="<?php echo base_url('Myaccount/Logout'); ?>"><i class="fa fa-lock" aria-hidden="true"></i>Logout</a>
      </li>
    </ul>
</div>


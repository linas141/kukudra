<ul class="sidebar-menu" data-widget="tree" id="home">
  <li class="header">Pradinis "Kukudra" puslapis</li>
<li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-mouse-pointer"></i><span> Pradžia</span></a></li>
</ul>
<ul class="sidebar-menu" data-widget="tree" id="searchThis">
  <li class="header">Meniu</li>
  <li><a href="<?php echo $this->Url->build('/admin'); ?>"><i class="fa fa-dashboard"></i><span> Skydelis</span></a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-shopping-cart"></i>
      <span>Rezervacijos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
		<li><a href="<?php echo $this->Url->build('/reservation'); ?>"><i class="fa fa-opencart"></i> Visos rezervacijos</a></li>
		<li><a href="<?php echo $this->Url->build('/reservation/add'); ?>"><i class="fa fa-cart-plus"></i> Pateikti rezervaciją</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-laptop"></i>
      <span>Naudotojai</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
		<li><a href="<?php echo $this->Url->build('/user'); ?>"><i class="fa fa-users"></i> Visi naudotojai</a></li>
      <li><a href="<?php echo $this->Url->build('/user/add'); ?>"><i class="fa fa-user-plus"></i> Sukurti naują naudotoją</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder-open-o"></i>
      <span>Laisvadienių prašymai&nbsp; <small class="label bg-yellow"><?php if($daysOffCount>0){ echo $daysOffCount;}?></small></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/days-off'); ?>"><i class="fa fa-users"></i> Visi prašymai</a></li>
      <li><a href="<?php echo $this->Url->build('/days-off/add'); ?>"><i class="fa fa-user-plus"></i> Pateikti prašymą</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder-open-o"></i>
      <span>Darbo grafikas</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/work-schedule'); ?>"><i class="fa fa-users"></i> Valdyti grafiką</a></li>
      <li><a href="<?php echo $this->Url->build('/work-schedule/add'); ?>"><i class="fa fa-user-plus"></i> Pridėti darbo dieną</a></li>
    </ul>
  </li>
  <li><a href="<?php echo $this->Url->build('/review'); ?>"><i class="fa fa-folder-open"></i><span> Visi atsiliepimai</span></a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-spoon"></i>
      <span>Patiekalai</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/dish'); ?>"><i class="fa fa-globe"></i> Visi patiekalai</a></li>
      <li><a href="<?php echo $this->Url->build('/dish/add'); ?>"><i class="fa fa-folder-o"></i> Pridėti patiekalą</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i>
      <span>Specialūs pasiūlymai</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/special-offers'); ?>"><i class="fa fa-globe"></i> Visi specialūs pasiūlymai</a></li>
      <li><a href="<?php echo $this->Url->build('/special-offers/add'); ?>"><i class="fa fa-folder-o"></i> Pridėti specialų pasiūlymą</a></li>
    </ul>
  </li>
  <br><br>
    <li class="header">Atsijunkite nuo sistemos</li>
	
  <li><a href="<?php echo $this->Url->build('/user/logout'); ?>"><i class="fa fa-sign-out"></i><span>  Atsijungti</span></a></li>

</ul>
 <script>
function searchList() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('searchinput');
  filter = input.value.toLowerCase();
  ul = document.getElementById("searchThis");
  li = ul.getElementsByTagName('li');
  // Loop through all list items, and hide those who don't match the search query
    $("#searchThis li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(filter) > -1)
    });
}
</script>
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Pradinis "Kukudra" puslapis</li>
<li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-mouse-pointer"></i> Pradžia</a></li>
</ul>
<ul class="sidebar-menu" data-widget="tree"  id="searchThis">
  <li class="header">Meniu</li>
  <li><a href="<?php echo $this->Url->build('/darbuotojas'); ?>"><i class="fa fa-dashboard"></i> Skydelis</a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-shopping-cart"></i>
      <span>Rezervacijos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
		<li><a href="<?php echo $this->Url->build('/Reservation'); ?>"><i class="fa fa-opencart"></i> Visos rezervacijos</a></li>
		<li><a href="<?php echo $this->Url->build('/Reservation/add'); ?>"><i class="fa fa-cart-plus"></i> Pateikti rezervaciją</a></li>
    </ul>
  </li>
  <li><a href="<?php echo $this->Url->build('/work-schedule/myschedule'); ?>"><i class="fa fa-folder-open"></i> Darbo grafikas</a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder-open-o"></i>
      <span>Laisvadienių prašymai&nbsp; </span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/Days-off/employeesubmitted'); ?>"><i class="fa fa-users"></i> Mano prašymai</a></li>
      <li><a href="<?php echo $this->Url->build('/Days-off/employeeadd'); ?>"><i class="fa fa-user-plus"></i> Pateikti prašymą</a></li>
    </ul>
  </li>
  <li><a href="<?php echo $this->Url->build('/Review/employees'); ?>"><i class="fa fa-folder-open"></i> Atsiliepimai apie mane</a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-spoon"></i>
      <span>Patiekalai</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/Dish'); ?>"><i class="fa fa-globe"></i> Visi patiekalai</a></li>
      <li><a href="<?php echo $this->Url->build('/Dish/add'); ?>"><i class="fa fa-folder-o"></i> Pridėti patiekalą</a></li>
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
      <li><a href="<?php echo $this->Url->build('/SpecialOffers'); ?>"><i class="fa fa-globe"></i> Visi specialūs pasiūlymai</a></li>
      <li><a href="<?php echo $this->Url->build('/SpecialOffers/add'); ?>"><i class="fa fa-folder-o"></i> Pridėti specialų pasiūlymą</a></li>
    </ul>
  </li>
  <br><li class="header">Sistemos vartotojo vadovas</li>
	
  <li><a href="<?php echo $this->Url->build('#'); ?>"><i class="fa fa-user"></i>  Peržiūrėti vartotojo vadovą</a></li>

  <li class="header">Atsijunkite nuo sistemos</li>
	
  <li><a href="<?php echo $this->Url->build('/user/logout'); ?>"><i class="fa fa-sign-out"></i>  Atsijungti</a></li>

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
<nav class="navbar navbar-light navbar-expand-md fixed-top navbar-fixed-top navigation-clean-button" style="z-index: 99;background-image: url('/assets/img/menu.jpg');">
	<div class="container-fluid"><a class="navbar-brand" href="/"><span class="flash animated">kukudra</span> </a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navcol-1">
			<ul class="nav navbar-nav nav-right">
				<li class="nav-item" role="presentation"><a class="nav-link <?php if ($this->request->getAttribute("here") == '/') {echo ' active';} ?>" href="/">Pradžia</a></li>
				<li class="nav-item" role="presentation"><a class="nav-link <?php if (strpos($this->request->getAttribute("here"), 'rezervacija') !== false) {echo ' active';} ?>" href="/rezervacija">Rezervacijos</a></li>
				<li class="nav-item" role="presentation"><a class="nav-link <?php if (strpos($this->request->getAttribute("here"), 'atsiliepimai') !== false) {echo ' active';} ?>" href="/atsiliepimai">Atsiliepimai</a></li>
				<li class="nav-item" role="presentation"><a class="nav-link <?php if (strpos($this->request->getAttribute("here"), 'galerija') !== false) {echo ' active';} ?>" href="/galerija">Galerija</a></li>
				<li class="dropdown nav-item"><a class="dropdown-toggle nav-link <?php if (strpos($this->request->getAttribute("here"),'/patiekalai')!== false  || strpos($this->request->getAttribute("here"),'pasiulymai')!== false) {echo ' active';} ?>" data-toggle="dropdown" aria-expanded="false" href="#">Meniu</a>
					<div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="/patiekalai" style="color:white;">Meniu</a><a class="dropdown-item" role="presentation" href="/pasiulymai" style="color:white;">Specialūs pasiulymai</a></div>
				</li>
				<li class="nav-item" role="presentation"><a class="nav-link <?php if (strpos($this->request->getAttribute("here"), 'kontaktai')!== false) {echo ' active';} ?>" href="/kontaktai">Kontaktai</a></li>
			</ul>
			<p class="ml-auto navbar-text actions"><?php if($user = $this->request->getSession()->read('Auth.User'))  : ?>
				<?php if($user['role']=='admin') : ?>
					 <a class="btn btn-dark action-button" role="button" href="/admin" data-bs-hover-animate="pulse" style="color:#fffdfd;">Vadovas</a>
				<?php elseif($user['role']=='darbuotojas') : ?>
					 <a class="btn btn-dark action-button" role="button" href="/darbuotojas" data-bs-hover-animate="pulse" style="color:#fffdfd;">Darbuotojo meniu</a>
				<?php endif; ?>
				<a class="btn btn-dark action-button" role="button" href="/profilis" data-bs-hover-animate="pulse" style="color:#fffdfd;">Profilis</a>
				<a class="btn btn-light action-button" role="button" href="/user/logout" data-bs-hover-animate="pulse"
					style="color: #fffdfd;background-color: #1485ee;">Atsijungti</a></p>

			<?php else : ?>				
			<p class="ml-auto navbar-text actions"> <a class="btn btn-dark action-button" role="button" href="/user/login" data-bs-hover-animate="pulse" style="color:#fffdfd;">Prisijungti</a><a class="btn btn-light action-button" role="button" href="/user/register" data-bs-hover-animate="pulse"
					style="color: #fffdfd;background-color: #1485ee;">Registruotis</a></p>
			<?php endif; ?>
		</div>
	</div>
</nav>
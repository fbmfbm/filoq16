@extends('layouts.admin_main')

@section('title', 'Administration Home page')

@section('content')
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-md-12">
				<h3 class="">Tableau de bord</h3>
			</div>
		</div>

		<div class="row">
			@can("edit_user")
			<div class="col-md-3 text-center">
				<article class="fbm-card" >
					<header class="fbm-card-thumb" style="background-color:#AD0088;">
						<a href="#">
							<i class="fa fa-users fa-5x"></i>
						</a>
					</header>
					<div class="fbm-card-body">
						<div class="fbm-card-category"><a href="#">Admin</a></div>
						<h2 class="fbm-card-title"><a href="#">Utilisateurs</a></h2>
						<div class="fbm-card-subtitle">Utilisateurs référencés</div>
						<p class="fbm-card-description">
							Ensemble des utilisateurs référencés sur le site, y compris les utilisateurs désactivés.
						</p>
					</div>
					<footer class="fbm-card-footer">
						<span class="icon icon--time"></span>6 min
						<span class="icon icon--comment"></span><a href="#">39 comments</a>
					</footer>
				</article>


			</div>
			@endcan
			<div class="col-md-3 text-center">
				<article class="fbm-card" >
					<header class="fbm-card-thumb" style="background-color:#A9BF00;">
						<a href="#">
							<i class="fa fa-line-chart fa-5x"></i>
						</a>
					</header>
					<div class="fbm-card-body">
						<div class="fbm-card-category"><a href="#">Admin</a></div>
						<h2 class="fbm-card-title"><a href="#">Thématiques</a></h2>
						<div class="fbm-card-subtitle">Gestion des thématiques</div>
						<p class="fbm-card-description">
							Ensemble des thématiques présentes sur le site.
						</p>
					</div>
					<footer class="fbm-card-footer">
						<span class="icon icon--time"></span>6 min
						<span class="icon icon--comment"></span><a href="#">39 comments</a>
					</footer>
				</article>

			</div>
			<div class="col-md-3 text-center">
				<article class="fbm-card" >
					<header class="fbm-card-thumb" style="background-color:#00BBB4;">
						<a href="#">
							<i class="fa fa-map-o fa-5x"></i>
						</a>
					</header>
					<div class="fbm-card-body">
						<div class="fbm-card-category"><a href="#">Admin</a></div>
						<h2 class="fbm-card-title"><a href="#">Fréquentations</a></h2>
						<div class="fbm-card-subtitle">Statistiques de fréquentation</div>
						<p class="fbm-card-description">
							Ensemble des statistiques de fréquentation du site.
						</p>
					</div>
					<footer class="fbm-card-footer">
						<span class="icon icon--time"></span>6 min
						<span class="icon icon--comment"></span><a href="#">39 comments</a>
					</footer>
				</article>

			</div>
			<div class="col-md-3 text-center">
				<article class="fbm-card" >
					<header class="fbm-card-thumb" style="background-color:#445782;">
						<a href="#">
							<i class="fa fa-database fa-5x"></i>
						</a>
					</header>
					<div class="fbm-card-body">
						<div class="fbm-card-category"><a href="#">Admin</a></div>
						<h2 class="fbm-card-title"><a href="#">Base de données</a></h2>
						<div class="fbm-card-subtitle">Données utilisées</div>
						<p class="fbm-card-description">
							Ensemble des statistiques sur les données exploités dans le site.
						</p>
					</div>
					<footer class="fbm-card-footer">
						<span class="icon icon--time"></span>6 min
						<span class="icon icon--comment"></span><a href="#">39 comments</a>
					</footer>
				</article>

			</div>



		</div>
		<div class="row">
			<div class="col-md-12">
				<hr/>


			</div>
		</div>
	</div>


@endsection
<h2>Site web : Filocom au quartier</h2>
<hr>
Vous avez fait une demande de renouvellement de votre mot de passe sur le site <a href="http://www.drihl-pru.scifmcn.com">Filocom au quartier</a>.
<br>
Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer ce mail.
<br>
Sinon, cliquez ici pour renouveler votre mot de passe : <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
<br>
<hr>
<i>L'administrateur du site</i>

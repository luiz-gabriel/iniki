<!DOCTYPE html>
<html>
<head>
	<title>Denunciar Link</title>
</head>
<body>
	<form method="post">
		<input type="url" name="link" placeholder="Exemplo: https//www.iniki.xyz/fde45">
		{% block link %} {{ content|raw }} {% endblock %}
		<input type="text" name="reason">
		{% block reason %} {{ content|raw }} {% endblock %}
		<button type="submit" name="action">Denunciar</button>
		{% block result %} {{ content|raw }} {% endblock %}
	</form>
</body>
</html>
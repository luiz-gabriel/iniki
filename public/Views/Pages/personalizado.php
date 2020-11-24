<!DOCTYPE html>
<html>
<head>
	<title>Encurtador de link personalizado</title>
</head>
<body>
	<form method="post">
		<input type="url" name="link">
		{% block link %} {{ content|raw }} {% endblock %}
		<input type="text" name="custom_link">
		{% block costumLink %} {{ content|raw }} {% endblock %}
		<button type="submit" name="action">Enviar</button>
		{% block result %} {{ content|raw }} {% endblock %}
	</form>
</body>
</html>
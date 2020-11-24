{% include("header.php") %}
	<form method="post">
		<input type="url" name="url">
		{% block link %} {{ content|raw }} {% endblock %}
		<button type="submit" name="action">Monitorar</button>
		{% block result %} {{ content|raw }} {% endblock %}
	</form>
</body>
</html>
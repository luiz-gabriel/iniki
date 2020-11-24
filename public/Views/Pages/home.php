{% include("header.php") %}
	<form method="POST">
		<input type="url" name="link" required>
		{% block link %} {{ content|raw }} {% endblock %}
		<button type="submit" name="action">Cadastrar</button>
	</form>
</body>
</html>

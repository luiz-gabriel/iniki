{% include("header.php") %}
	<form method="POST">
		<input type="url" name="link" required>
		{% block link %} {{ content|raw }} {% endblock %}
		<button type="submit" name="action">Cadastrar</button>
	</form>

	{% if storage is null %}
			nenhum link cadastrado.
	{% else %}
		{% for key,value in storage%}
			 {{value.link}}:
			 {{value.smallLink}}
		<br>
		<br>
		{% endfor %}
	{%endif%}
	
</body>
</html>

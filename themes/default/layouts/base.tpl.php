<!doctype html>
<html>
	<head>
		<title>{{title}} - {% block pageTitle %}{% endblock %}</title>
		{% block css %}
			<link href="{% viewurl css/main.css %}" rel="stylesheet" />
		{% endblock %}
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<h1>{{title}}</h1>
			</div>
			<div id="pagebody">
				{% block pagebody %}
				{% endblock %}
			</div>
			<div id="footer">
				Copyright 2011 Me. All rights reserved.
				This website is <a href="http://hydrogenphp.com">Hydrogen</a>
				powered.
			</div>
		</div>
	</body>
</html>
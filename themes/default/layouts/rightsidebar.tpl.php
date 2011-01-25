{% extends layouts/base %}

{% block pagebody %}
	<div id="content">
		{% block content %}
		{% endblock %}
	</div>
	<div id="sidebar">
		{% block sidebar %}
			<p>A pretty little sample blog running on Hydrogen.</p>
		{% endblock %}
	</div>
{% endblock %}
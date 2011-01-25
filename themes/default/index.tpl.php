{% extends layouts/rightsidebar %}

{% block pageTitle %}Index{% endblock %}

{% block sidebar %}
	{% parentblock %}
	<p>This blog has all of {{posts|length}} post{{posts|pluralize}}.</p>
{% endblock %}

{% block content %}
	{% for post in posts %}
		<div class="article">
			<a href="{% url index.php/article/view post.id post.title|slugify %}" class="post-title">
				{{post.title}}
			</a>
			<span class="post-info">
				Posted {{post.timestamp}} by {{post.author}}.
			</span>
			<div class="post-content">
				{{post.body}}
			</div>
		</div>
	{% empty %}
		<span class="badnews">There are no posts!</span>
	{% endfor %}
{% endblock %}
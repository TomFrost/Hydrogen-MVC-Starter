{% extends layouts/rightsidebar %}

{% block pageTitle %}{{post.title}}{% endblock %}

{% block sidebar %}
	{% parentblock %}
	<p><a href="{% url / %}">Blog Index</a></p>
{% endblock %}

{% block content %}
	<div class="article">
		<h1 class='post-title'>{{post.title}}</h1>
		<span class="post-info">
			Posted {{post.timestamp}} by {{post.author}}.
		</span>
		<div class="post-content">
			{{post.body}}
		</div>
	</div>
	<div class="comments">
		<h2>Comments</h2>
		{% for comment in comments %}
			<div class="comment">
				<span class="comment-name">{{comment.name}}</span>
				<span class="comment-date">{{comment.timestamp}}</span>
				<div class="comment-content">
					{{comment.post}}
				</div>
			</div>
		{% empty %}
			<span class="badnews">No comments!</span>
		{% endfor %}
	</div>
{% endblock %}
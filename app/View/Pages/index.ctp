<?php foreach($topics as $topic): ?>
	<article class="row">
		<div class="col-sm-3">
			<h3><?php echo $topic['Topic']['created']; ?></h3>
		</div>
		<div class="col-sm-9">
			<h2><?php echo $topic['Topic']['title']; ?></h2>
			<p><?php echo $topic['Topic']['body']; ?></p>
			<p><a href="/detail/<?php echo $topic['Topic']['id']?>">Continue reading</a></p>
					<span class="fa fa-tags"></span>
					<a href=""><span class="label label-danger"><?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id']));  ?></span></a>
		</div>
	</article>
<?php endforeach; ?>

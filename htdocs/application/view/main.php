<p>게시판</p>
	<?php foreach ($this->list as $data): ?>
		<div style="border: 3px solid; margin-bottom: 20px;">
			<p>글번호 : <?php echo $data->idx ?></p>
			<p>글쓴이 : <?php echo $data->writer ?></p>
			<p>제에목 : <a href="/board/view/<?php echo $data->idx ?>"><?php echo $data->subject ?></a></p>
			<p>글내용 : <?php echo $data->content; ?></p>
			<p>작성일 : <?php echo $data->date; ?></p>
			<p>조회수 : <?php echo $data->hit; ?></p>
		</div>
		<?php endforeach ?>
		<?php if(isset($_SESSION['member'])): ?>
		<?php endif ?>
<div>
	<form action="" method="post">
		<input type="hidden" name="action" value="update">
		<input type="hidden" name="midx" value="<?php echo $_SESSION['member']->idx ?>">
		<p>글쓴이 : <?php echo $this->view->writer ?></p>
		<p>글제목 : <input type="text" name="subject" value="<?php echo $this->view->subject; ?>"></p>
		<p>글내용 : <input type="text" name="content" value="<?php echo $this->view->content ?>"></p>
		<button type="submit">글작성</button>
	</form>
</div>
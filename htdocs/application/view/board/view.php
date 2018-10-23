<div>
	<p>글번호 : <?php echo $this->view->idx; ?></p>
	<p>글제목 : <?php echo $this->view->subject; ?></p>
	<p>글내용 : <?php echo $this->view->content; ?></p>
	<p>작성일 : <?php echo $this->view->date; ?></p>
	<p>조회수 : <?php echo $this->view->hit ?></p>
	<?php if(isset($_SESSION['member']) && $this->view->midx == $_SESSION['member']->idx): ?>
			<a href="/board/update/<?php echo $this->view->idx; ?>">수정</a>
			<button onclick="if(confirm('삭제하시겠습니까?')) location.href='/board/delete/<?php echo $this->view->idx; ?>'" class="btn">삭제</button>
		<?php else: ?>
			
		<?php endif ?>
		<a href="<?php echo $this->prev ?>">이전</a>
		<a href="<?php echo $this->next ?>">다음</a>
</div>
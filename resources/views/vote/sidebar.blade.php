<div class="box_wrap">
	<h2 class="box_title">最新投票</h2>
	<div class="vote_new_list">
		<ul>

@foreach($latestPoll as $key => $value)

			<li><a href="{{ $value['url'] }}">{{ $value['title'] }}</a><span class="num">{{ $value['voter_num'] }}</span></li>
			<!--# } #-->
		</ul>
	</div>
</div>
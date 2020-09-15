
<hook-action name="education" args='space'>
				<div class="space_profile">
					<h3>

@if ($space->tome == 2)

						<a href="{{ url('profile/education/run?_tab=education') }}" class="edit">编辑</a>
						<!--# } #-->
						<strong>教育经历</strong>
					</h3>

@foreach($space->spaceUser['education'] AS $education)

					<dl class="cc">
						<dt>{{ $education['degree'] }}</dt>
						<dd><span class="school">{{ $education['school'] }}</span>{{ $education['start_time'] }}</dd>
					</dl>
			<!--# } #-->
				</div>
</hook-action>

<hook-action name="work" args='space'>
				<div class="space_profile">
					<h3>

@if ($space->tome == 2)

						<a href="{{ url('profile/work/run?_tab=work') }}" class="edit">编辑</a>
						<!--# } #-->
						<strong>工作经历</strong>
					</h3>

@foreach($space->spaceUser['work'] AS $work)

					<dl class="cc">
						<dt style="width:auto;" class="mr20">{{ $work['company'] }}</dt>
						<dd style="width:auto;padding-top:3px;" class="f12 gray w">
							于{$work['starty']}年{$work['startm']}月入职&nbsp;至&nbsp;
@if (!$work['endy'])
今
@else
{$work['endy']}年{$work['endm']}月<!--#}#-->
						</dd>
					</dl>
			<!--# } #-->
				</div>
</hook-action>



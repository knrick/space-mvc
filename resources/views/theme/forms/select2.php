<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Basic Demo</h3>
			</div>
			<div class="panel-body">
				<p>Single Select</p>
				<select class="select-basic" style="width: 100%;">
					<optgroup label="Alaskan/Hawaiian Time Zone">
						<option value="AK">Alaska</option>
						<option value="HI">Hawaii</option>
					</optgroup>
					<optgroup label="Pacific Time Zone">
						<option value="CA">California</option>
						<option value="NV">Nevada</option>
						<option value="OR">Oregon</option>
						<option value="WA">Washington</option>
					</optgroup>
					<optgroup label="Mountain Time Zone">
						<option value="AZ">Arizona</option>
						<option value="CO">Colorado</option>
						<option value="ID">Idaho</option>
						<option value="MT">Montana</option>
					</optgroup>
					<optgroup label="Central Time Zone">
						<option value="AL">Alabama</option>
						<option value="AR">Arkansas</option>
						<option value="IL">Illinois</option>
						<option value="IA">Iowa</option>
					</optgroup>
					<optgroup label="Eastern Time Zone">
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
					</optgroup>
				</select>

				<br><br>

				<p>Multiple Select</p>
				<select class="select-multiple-basic" multiple="multiple" style="width: 100%;">
					<optgroup label="Alaskan/Hawaiian Time Zone">
						<option value="AK">Alaska</option>
						<option value="HI">Hawaii</option>
					</optgroup>
					<optgroup label="Pacific Time Zone">
						<option value="CA">California</option>
						<option value="NV">Nevada</option>
						<option value="OR">Oregon</option>
						<option value="WA">Washington</option>
					</optgroup>
					<optgroup label="Mountain Time Zone">
						<option value="AZ">Arizona</option>
						<option value="CO">Colorado</option>
						<option value="ID">Idaho</option>
						<option value="MT">Montana</option>
					</optgroup>
					<optgroup label="Central Time Zone">
						<option value="AL">Alabama</option>
						<option value="AR">Arkansas</option>
						<option value="IL">Illinois</option>
						<option value="IA">Iowa</option>
					</optgroup>
					<optgroup label="Eastern Time Zone">
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
					</optgroup>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Placeholders</h3>
			</div>
			<div class="panel-body">
				<p>With placeholder, single selection</p>
				<select id="select-placeholder-single" style="width: 100%;">
					<option></option>
					<optgroup label="Alaskan/Hawaiian Time Zone">
						<option value="AK">Alaska</option>
						<option value="HI">Hawaii</option>
					</optgroup>
					<optgroup label="Pacific Time Zone">
						<option value="CA">California</option>
						<option value="NV">Nevada</option>
						<option value="OR">Oregon</option>
						<option value="WA">Washington</option>
					</optgroup>
					<optgroup label="Mountain Time Zone">
						<option value="AZ">Arizona</option>
						<option value="CO">Colorado</option>
						<option value="ID">Idaho</option>
						<option value="MT">Montana</option>
					</optgroup>
					<optgroup label="Central Time Zone">
						<option value="AL">Alabama</option>
						<option value="AR">Arkansas</option>
						<option value="IL">Illinois</option>
						<option value="IA">Iowa</option>
					</optgroup>
					<optgroup label="Eastern Time Zone">
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
					</optgroup>
				</select>

				<br><br>

				<p>With placeholder, multiple selection</p>
				<select id="select-placeholder-multiple" multiple="multiple" style="width: 100%;">
					<option></option>
					<optgroup label="Alaskan/Hawaiian Time Zone">
						<option value="AK">Alaska</option>
						<option value="HI">Hawaii</option>
					</optgroup>
					<optgroup label="Pacific Time Zone">
						<option value="CA">California</option>
						<option value="NV">Nevada</option>
						<option value="OR">Oregon</option>
						<option value="WA">Washington</option>
					</optgroup>
					<optgroup label="Mountain Time Zone">
						<option value="AZ">Arizona</option>
						<option value="CO">Colorado</option>
						<option value="ID">Idaho</option>
						<option value="MT">Montana</option>
					</optgroup>
					<optgroup label="Central Time Zone">
						<option value="AL">Alabama</option>
						<option value="AR">Arkansas</option>
						<option value="IL">Illinois</option>
						<option value="IA">Iowa</option>
					</optgroup>
					<optgroup label="Eastern Time Zone">
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
					</optgroup>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Tagging Support</h3>
			</div>
			<div class="panel-body">
				<p>Try typing your own input and hit enter</p>
				<select id="select-tag" multiple="multiple" style="width: 100%;">
					<option>red</option>
					<option selected="selected">green</option>
					<option>blue</option>
					<option>yellow</option>
					<option>magenta</option>
				</select>

				<br><br>

				<p>Try typing your own input followed by space or comma</p>
				<select id="select-tag-token" multiple="multiple" style="width: 100%;">
					<option>red</option>
					<option>green</option>
					<option>blue</option>
					<option selected="selected">yellow</option>
					<option>magenta</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Disabled</h3>
			</div>
			<div class="panel-body">
				<select disabled="disabled" class="select-basic" style="width: 100%;">
					<optgroup label="Alaskan/Hawaiian Time Zone">
						<option value="AK">Alaska</option>
						<option value="HI">Hawaii</option>
					</optgroup>
					<optgroup label="Pacific Time Zone">
						<option value="CA">California</option>
						<option value="NV">Nevada</option>
						<option value="OR">Oregon</option>
						<option value="WA">Washington</option>
					</optgroup>
					<optgroup label="Mountain Time Zone">
						<option value="AZ">Arizona</option>
						<option value="CO">Colorado</option>
						<option value="ID">Idaho</option>
						<option value="MT">Montana</option>
					</optgroup>
					<optgroup label="Central Time Zone">
						<option value="AL">Alabama</option>
						<option value="AR">Arkansas</option>
						<option value="IL">Illinois</option>
						<option value="IA">Iowa</option>
					</optgroup>
					<optgroup label="Eastern Time Zone">
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
					</optgroup>
				</select>

				<br><br>

				<select class="select-multiple-basic" disabled="disabled" multiple="multiple" style="width: 100%;">
					<optgroup label="Alaskan/Hawaiian Time Zone">
						<option value="AK">Alaska</option>
						<option value="HI">Hawaii</option>
					</optgroup>
					<optgroup label="Pacific Time Zone">
						<option value="CA">California</option>
						<option value="NV">Nevada</option>
						<option value="OR">Oregon</option>
						<option value="WA">Washington</option>
					</optgroup>
					<optgroup label="Mountain Time Zone">
						<option value="AZ">Arizona</option>
						<option value="CO">Colorado</option>
						<option value="ID">Idaho</option>
						<option value="MT">Montana</option>
					</optgroup>
					<optgroup label="Central Time Zone">
						<option value="AL">Alabama</option>
						<option value="AR">Arkansas</option>
						<option value="IL">Illinois</option>
						<option value="IA">Iowa</option>
					</optgroup>
					<optgroup label="Eastern Time Zone">
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
					</optgroup>
				</select>

				<br><br>

				<p>Disabled option</p>
				<select class="select-basic">
					<option value="one">First</option>
					<option value="two" disabled="disabled">Second (disabled)</option>
					<option value="three">Third</option>
				</select>
			</div>
		</div>
	</div>
</div>
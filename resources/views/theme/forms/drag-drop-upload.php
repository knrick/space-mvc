<div class="row">
	<div class="col-md-6">
		<h4>Default</h4>
		<input type="file" class="dropify">
	</div>
	<div class="col-md-6">
		<h4>Limit file size, try to upload file larger than 100 KB</h4>
		<input type="file" class="dropify" data-max-file-size="100K">
	</div>
</div>

<div class="margin-bottom-30"></div>

<div class="row">
	<div class="col-md-6">
		<h4>Limit file type, try to upload png or pdf only</h4>
		<input type="file" class="dropify" data-allowed-file-extensions="pdf png">
	</div>
	<div class="col-md-6">
		<h4>With event and default file, try to remove the image</h4>
		<input type="file" id="dropify-event" data-default-file="assets/img/login-bg.jpg">
	</div>
</div>

<div class="margin-bottom-30"></div>

<div class="row">
	<div class="col-md-6">
		<h4>Disabled file upload</h4>
		<input type="file" class="dropify" disabled="disabled">
	</div>
	<div class="col-md-6">
		<h4>Custom messages for default, replace, remove and error</h4>
		<input type="file" class="dropify-fr">
	</div>
</div>
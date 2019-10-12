$(document).ready(function() {

	new Dropzone(
		'#app-content .drop-area', {
			uploadMultiple: false,
			createImageThumbnails: false,
			url: OC.generateUrl('apps/photostorage/drop'),
			parallelUploads: 1,
			paramName: 'data',
			clickable: ['.drop-area', '.drop-area .dz-clickable'],
			init: function() {
				var self = this;
				this.on('drop', function() {

				});
				this.on('complete', function(file) {
					self.removeFile(file);
				});
				this.on('success', function(file, resp) {
					self.removeFile(file);
					$('#app-content #url-drop').val(resp.link);
					$('.url-share').slideDown();
				});
			}
		}
	);

	new Clipboard('#app-content .copyButton');

	$('#app-content .text-area').on('change', function() {
		if (!$.trim($(this).val())) {
			$('.drop-text .hint').show();
		} else {
			$('.drop-text .hint').hide();
		}
	});
}
);

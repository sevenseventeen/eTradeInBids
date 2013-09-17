$(document).ready(function() {
	$('.delete_primary_photo_alert').click(function() {
		alert("This image is currently the primary photo for this vehicle. Please select a new primary image before attempting to delete this image.");
		return false;
	});
});


<label>Third Row Seat</label>				<label class="radio_label" for="third_row_seat_yes">Yes</label>			<input id="third_row_seat_yes" class="radio_button" type="radio" value="Yes" name="third_row_seat" <?php echo set_radio('third_row_seat', 'Yes'); ?>>
											<label class="radio_label" for="third_row_seat_no">No</label>			<input id="third_row_seat_no"  class="radio_button" type="radio" value="No" name="third_row_seat" <?php echo set_radio('third_row_seat', 'No'); ?>>
											<?php echo form_error('third_row_seat'); ?>
											<br class="clear_float">
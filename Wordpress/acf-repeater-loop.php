<!-- basic -->
<?php if(get_field('FIELD_GROUP_NAME')): while(the_repeater_field('FIELD_GROUP_NAME')): ?>
	<a href="<?php the_sub_field('FIELD_NAME'); ?>">
		<?php the_sub_field('FIELD_NAME'); ?>
	</a>
<?php endwhile; endif; ?>



<!-- repeater from options panel -->
<?php if(get_field('FIELD_GROUP_NAME', 'options')): while(has_sub_field('FIELD_GROUP_NAME', 'options')): ?>						
	<li><a href="<?php the_sub_field('FIELD_NAME'); ?>" class="<?php the_sub_field('FIELD_NAME'); ?>" target="_blank"><span class="icon-<?php the_sub_field('FIELD_NAME'); ?>"></span></a></li>
<?php endwhile; endif; ?>




<!-- repeater with nested repeater -->
<?php 
	// check for rows (parent repeater) and loop
	if( have_rows('parent_repeater') ):
	while( have_rows('parent_repeater') ): the_row(); 
?>
	<!-- parent loop content -->
	<h3><?php the_sub_field('title'); ?></h3>
	<!-- parent loop content -->
			
		<?php 
			// check for rows (nested repeater) and loop
			if( have_rows('nested_repeater') ):
			while( have_rows('nested_repeater') ): the_row();
		?>
		
			<!-- nested loop content -->
			<p><?php the_sub_field('name'); ?></p>
			<!-- nested loop content -->
		
		<?php 
			endwhile;
			endif; 
		?>

<?php 
	endwhile;
	endif;
?>


<?php
/**
 * The default template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to foundation_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>

<div id="comments" class="comments-area">
	<!-- Prevents loading the file directly -->
	<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
		<?php die('Please do not load this page directly or I will throw a hissy fit. Thanks and have a great day!'); ?>
	<?php endif; ?>
	

		<?php
			if ( post_password_required() ) : ?>
			<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'jb'); ?></p>
		<?php return; endif;

		if ( have_comments() ) : ?>

			<h3 id="comments-title" class="comments-title">
				<?php
					printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'jb' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>		
			</h3>

			<ol class="commentlist">
				<?php wp_list_comments( array('callback' => 'jb_comment_template') ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<nav id="comment-nav-below" class="navigation" role="navigation">
					<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'jb' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'jb' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'jb' ) ); ?></div>
				</nav>
			<?php endif; // check for comment navigation ?>

			<?php
			/* If there are no comments and comments are closed, let's leave a note.
			 * But we only want the note on posts and pages that had comments in the first place.
			 */
			if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="nocomments"><?php _e( 'Comments are closed.' , 'jb' ); ?></p>
			<?php endif; ?>
	
		<?php endif; // have_comments()?>

	<?php
/*-----------------------------------------------------------------------------------*/
/*	Comment Form
/*-----------------------------------------------------------------------------------*/

jb_comment_form(); ?>

</div>

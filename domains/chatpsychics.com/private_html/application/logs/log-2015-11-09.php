<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-11-09 21:23:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND 
					blog_comments.approved = 1' at line 11 - Invalid query: 
			
				SELECT 
					blog_comments.*,
					members.username
				
				FROM 
					blog_comments 
					
				JOIN members ON members.id = blog_comments.member_id
					
				WHERE 
					blog_comments.blog_id =  AND 
					blog_comments.approved = 1
			
			

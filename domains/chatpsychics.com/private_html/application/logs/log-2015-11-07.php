<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-11-07 14:59:25 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`tst8_main`.`transactions`, CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `billing_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transactions` (`id`, `member_id`, `datetime`, `type`, `payment_type`, `amount`, `summary`, `authorization_code`, `transaction_id`, `paid`, `region`, `settled`, `time_used`, `billing_id`, `currency`) VALUES ('', '183', '2015-11-07 14:55:00', 'payment', 'cc', '150.00', 'Administrator Added Funds', '', '', '0', 'us', 'voided', '0', '', 'USD')
ERROR - 2015-11-07 15:16:38 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`tst8_main`.`transactions`, CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `billing_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transactions` (`id`, `member_id`, `datetime`, `type`, `payment_type`, `amount`, `summary`, `authorization_code`, `transaction_id`, `paid`, `region`, `settled`, `time_used`, `billing_id`, `currency`) VALUES ('', '183', '2015-11-07 15:16:00', 'payment', 'cc', '150', 'Administrator Added Funds', '2949', '392', '1', 'us', 'voided', '0', '', '')
ERROR - 2015-11-07 15:17:12 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`tst8_main`.`transactions`, CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `billing_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `transactions` (`id`, `member_id`, `datetime`, `type`, `payment_type`, `amount`, `summary`, `authorization_code`, `transaction_id`, `paid`, `region`, `settled`, `time_used`, `billing_id`, `currency`) VALUES ('', '183', '2015-11-07 15:16:00', 'earning', 'cc', '150', 'Administrator Added Funds', '', '', '0', 'us', 'voided', '0', '', '')
ERROR - 2015-11-07 15:18:57 --> Severity: Notice --> Undefined variable: page /usr/home/tst8/domains/chatpsychics.com/public_html/application/views/psychics/main.php 37
ERROR - 2015-11-07 15:19:05 --> Severity: Notice --> Use of undefined constant is_manual - assumed 'is_manual' /usr/home/tst8/domains/chatpsychics.com/public_html/application/models/Reader.php 155
ERROR - 2015-11-07 15:19:10 --> Severity: Notice --> Undefined variable: page /usr/home/tst8/domains/chatpsychics.com/public_html/application/views/psychics/main.php 37
ERROR - 2015-11-07 19:57:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND 
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
			
			

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_per_categ`()
select count(category_id) as total_articles, category_name from articles,categories WHERE articles.category_id=categories.id  group by category_id$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_per_user`()
select count(user_id) as total_articles, f_name, l_name from articles, users where articles.user_id = users.id GROUP BY f_name, l_name$$
DELIMITER ;